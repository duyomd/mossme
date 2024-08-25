<?php

namespace App\Models;

use App\Models\BaseModel;
use Config\Database;
use App\Helpers\Utilities;

class SearchModel extends BaseModel
{
  public const DEFAULT_ORDERBYS             = array('title');
  public const DEFAULT_SORTORDERS           = array('ASC');

  public const HEADER_MATCHEDAT_ORDERBYS    = array('found_in');
  public const HEADER_MATCHEDAT_SORTORDERS  = array('ASC');
  
  public const HEADER_LANGUAGE_ORDERBYS     = array('language');
  public const HEADER_LANGUAGE_SORTORDERS   = array('ASC');

  public const HEADER_SERIAL_ORDERBYS       = array('entry_id');
  public const HEADER_SERIAL_SORTORDERS     = array('ASC');

  public const HEADER_TITLE_ORDERBYS        = array('title');
  public const HEADER_TITLE_SORTORDERS      = array('ASC');

  public const HEADER_AUTHOR_ORDERBYS       = array('author');
  public const HEADER_AUTHOR_SORTORDERS     = array('ASC');

  public const HEADER_SECTION_ORDERBYS      = array('section_id');
  public const HEADER_SECTION_SORTORDERS    = array('ASC');

  protected $allowedFields = [
    'id', 'entry_id', 'language', 'title', 'author', 'section_id', 'found_in', 
  ];

  public function getSearchCount($user_language_code, $conditions) 
  {
    $subSql = $this->preSql($conditions);    
    $sql = 
      'SELECT COUNT(*) AS count
      FROM (' . 
        $subSql .          
      ') t
      JOIN entry e ON t.entry_id = e.id
      WHERE t.status = :status: AND e.status = :status:
      AND section_id IN :section_ids:';
      
    $this->db->transStart();    
    $query = $this->db->query($sql, [
                                'user_lang'   => $this->userLanguageCode($user_language_code),
                                'status'      => Utilities::STATUS_ACTIVE,
                                'keyword'     => $conditions->keyword,
                                'section_ids' => $conditions->sectionIds,
                            ]);
    $results = $query->getResult();
    $count = $query->getRow(0);

    $this->db->transComplete();

    return $count->count;    
  }

  public function getSearchResults($user_language_code, $conditions, $sort)
  {
    $subSql = $this->preSql($conditions);    
    $sql = 
      'SELECT found_in, language, t.id, entry_id, author, section_id, 
        CASE WHEN t.title IS NOT NULL THEN t.title ELSE 
              (SELECT tr.title
              FROM translation tr
              WHERE tr.entry_id = t.entry_id AND tr.language_code = t.language_code ORDER BY tr.author LIMIT 1) 
        END AS title
      FROM (' . 
        $subSql .          
      ') t
      JOIN entry e ON t.entry_id = e.id
      JOIN language l ON l.code = t.language_code
      WHERE t.status = :status: AND e.status = :status:
      AND section_id IN :section_ids:' .
      $this->getOrderBySql($sort) .
      $this->getLimitSql($sort);

    $this->db->transStart();    
    $query = $this->db->query($sql, [
                                'user_lang'   => $user_language_code,
                                'status'      => Utilities::STATUS_ACTIVE,
                                'keyword'     => $conditions->keyword,
                                'section_ids' => $conditions->sectionIds,
                            ]);
                            
    $results = $query->getResult();
    $query->freeResult();

    $this->db->transComplete();

    return $this->encodeData($results);
  }

  private function preSql($conditions) {
    $subSql = '';
    if ($conditions->checks->serial) {
      /** This SQL is better, but supported on SQL>=8.0 only *//////////////////////////////////  
      // $subSql =
      // "SELECT * FROM 
      //   (SELECT 'serial' AS found_in, language_code, tra.id, entry_id, title, author, tra.status, 
      //         ROW_NUMBER() OVER(PARTITION BY entry_id 
      //                         ORDER BY CASE WHEN language_code = :user_lang: THEN 1 ELSE 2 END ASC,
      //                                            la.sequence DESC, author ASC) as rn       
      //      FROM translation tra 
      //      JOIN entry en ON tra.entry_id = en.id
      //      JOIN language la ON tra.language_code = la.code
      //      WHERE serials LIKE '%" . $this->db->escapeLikeString($conditions->keyword) . "%' ESCAPE '!') temp
      // WHERE temp.rn = 1";
      ///////////////////////////////////////////////////////////////////////////////////////////

      /** Used for host with lower SQL version (T.T) */ 
      $subSql =
      "SELECT found_in, language_code, id, entry_id, title, author, status 
        FROM (
          SELECT 'serial' AS found_in, language_code, tra.id, entry_id, title, author, tra.status,
              CONCAT(CASE WHEN language_code = :user_lang: THEN 1 ELSE 2 END, LPAD(999 - la.sequence, 3, '0'), IF(author IS NULL, '', author)) AS sort_value
          FROM translation tra 
            JOIN entry en ON tra.entry_id = en.id
            JOIN language la ON tra.language_code = la.code
          WHERE serials LIKE '%" . $this->db->escapeLikeString($conditions->keyword) . "%' ESCAPE '!' 
      ) tmain
      WHERE sort_value = (
        SELECT MIN(CONCAT(CASE WHEN language_code = :user_lang: THEN 1 ELSE 2 END, LPAD(999 - la.sequence, 3, '0'), IF(author IS NULL, '', author)))
        FROM translation tra 
    	    JOIN entry en ON tra.entry_id = en.id
          JOIN language la ON tra.language_code = la.code
        WHERE tra.entry_id = tmain.entry_id AND serials LIKE '%" . $this->db->escapeLikeString($conditions->keyword) . "%' ESCAPE '!' 
      )";
    } else {
      if ($conditions->checks->content) {
        $subSql = 
        "SELECT 'content' AS found_in, language_code, id, entry_id, title, author, status FROM translation WHERE MATCH(title, content, notation) AGAINST (:keyword: IN NATURAL LANGUAGE MODE)";
      }
      if ($conditions->checks->author) {
        if (!empty($subSql)) {
          $subSql = $subSql . " UNION ";
        }
        $subSql = $subSql . "SELECT 'author_content' AS found_in, language_code, id, entry_id, title, author, status FROM translation WHERE MATCH(author, author_note) AGAINST (:keyword: IN NATURAL LANGUAGE MODE)";
        $subSql = $subSql . " UNION " . "SELECT 'author_commentary' AS found_in, language_code, id, entry_id, NULL AS title, author, status FROM commentary WHERE MATCH(author, author_note) AGAINST (:keyword: IN NATURAL LANGUAGE MODE)";
      }
      if ($conditions->checks->commentary) {
        if (!empty($subSql)) {
          $subSql = $subSql . " UNION ";
        }
        $subSql = $subSql . "SELECT 'commentary' AS found_in, language_code, id, entry_id, NULL AS title, author, status FROM commentary WHERE MATCH(content, notation) AGAINST (:keyword: IN NATURAL LANGUAGE MODE)";
      }
    }
    return $subSql;
  }

  private function encodeData($results, $slash = true) {
    if (isset($results)) {
      foreach ($results as $re) {        
        $re->matched_at = lang('App.search_foundin_' . $re->found_in);
        $re->section = lang('App.search_section_' . $re->section_id);        
        if (!isset($re->title) || empty($re->title)) {
          $re->title = lang('App.search_translation_unavailable', [$re->language]);
        }
        // Title href
        $re->title_link = '/article/' . $re->entry_id . 
          '/forward=' . (strpos($re->found_in, 'commentary') === false ? 'translation' : 'commentary') . 
          '/' . $re->id;
        $re->title_hash = (strpos($re->found_in, 'commentary') === false ? 'article' : 'commentary');

        // $re->encodedTitle = Utilities::encodeDataHtml($re->encodedTitle, $slash);
        // $re->encodedAuthor = Utilities::encodeDataHtml($re->author, $slash);
      }
    }
    return $results;
  }
}