<?php

namespace App\Models;

use App\Models\BaseModel;
use Config\Database;
use App\Entities\Commentary;
use App\Entities\Entry;
use App\Helpers\Utilities;

class CommentaryModel extends BaseModel
{
    public const DEFAULT_ORDERBYS               = array('language', 'author');
    public const DEFAULT_SORTORDERS             = array('DESC', 'ASC');
    
    public const HEADER_ENTRY_ID_ORDERBYS       = array('entry_id');
    public const HEADER_ENTRY_ID_SORTORDERS     = array('ASC');

    public const HEADER_AUTHOR_ORDERBYS         = array('author');
    public const HEADER_AUTHOR_SORTORDERS       = array('ASC');

    public const HEADER_LANGUAGE_ORDERBYS       = array('language');
    public const HEADER_LANGUAGE_SORTORDERS     = array('ASC');

    public const HEADER_STATUS_ORDERBYS         = array('status_name');
    public const HEADER_STATUS_SORTORDERS       = array('ASC');

    public const HEADER_AUTHOR_NOTE_ORDERBYS    = array('author_note');
    public const HEADER_AUTHOR_NOTE_SORTORDERS  = array('ASC');

    public const HEADER_NOTATION_ORDERBYS       = array('notation');
    public const HEADER_NOTATION_SORTORDERS     = array('ASC');

    public const HEADER_CONTENT_ORDERBYS        = array('content');
    public const HEADER_CONTENT_SORTORDERS      = array('ASC');

    protected $table = 'commentary';
    protected $allowedFields = [
        'entry_id', 'author', 'author_note', 'content',
        'notation', 'status', 'language_code',
    ];
    protected $returnType = Commentary::class;

    /**
     * Get table Commentary data
     */
    public function getCommentaries(Entry $entry, $user_language_code = null, $default_cid = null)
    {
        if ($entry == null || !isset($entry->id)) {
            return null;
        }
        
        $commentaries = $this->sortCommentariesByLanguage($entry->id);
        $commentaries = $this->dropdownCommentaries($commentaries, $entry, $user_language_code, $default_cid);
        $commentaries = $this->encodeData($commentaries);

        return $commentaries;
    }

    public function getCommentariesByEntryId($entryId = null, $sort)
    {
        if (!isset($entryId)) return null;

        $sql = 
        'SELECT c.*, l.language AS language,
            CASE WHEN c.status = :status_inactive: THEN "' . lang('App.commentary_label_status_inactive') . '"' .
                ' ELSE "' . lang('App.commentary_label_status_active') . '" END AS status_name ' .
        'FROM commentary c LEFT JOIN language l ON c.language_code = l.code
         WHERE entry_id = :entry_id: ' .
        $this->getOrderBySql($sort) .
        $this->getLimitSql($sort);

        $this->db->transStart();    
        $query = $this->db->query($sql, ['entry_id'         => $entryId,
                                         'status_inactive'  => 0,]);
                                
        $results = $query->getResult();
        $query->freeResult();

        $this->db->transComplete();
        return $this->encodeData($results);
    }

    public function findCommentary($id) 
    {
        return $this->where('id', $id)->first();
    }

    public function insertCommentary($commentary)
    {
        $err = lang('App.msg_insert_fail', [lang('App.commentary_label_id'), $commentary->id]);
        if (!isset($commentary)) return $err;
        try {
            if ($this->where('id', $commentary->id)->first() != null) return $err; // iranai?
            $this->insert($commentary);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function modifyCommentary($commentary)
    {
        $err = lang('App.msg_update_fail', [lang('App.commentary_label_id'), $commentary->id]);
        if (!isset($commentary)) return $err;
        try {
            if ($this->where('id', $commentary->id)->first() == null) return $err;
            $this->update($commentary->id, $commentary);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function deleteCommentary($id) 
    {
        $err = lang('App.msg_delete_fail', [lang('App.commentary_label_id'), $id]);
        if (!isset($id)) return $err;
        try {
            $this->db->table('commentary')->where('id', $id)->delete();
            if ($this->db->affectedRows() <= 0) {
                return $err;
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function getCommentaryCount($entryId): int
    {
        return $this->db->table('commentary')->where('entry_id', $entryId)->countAllResults();
    }

    /******************* Private methods *************************/

    /**
     * Query commentaries list sort by language
     */
    private function sortCommentariesByLanguage($entry_id = false) 
    {
        if ($entry_id === false) {
            return null;
        }

        $this->db->transStart();

        $sql = 'SELECT l.language, c.id, c.entry_id, c.language_code, c.author, c.author_note, c.notation, c.status
                FROM commentary c LEFT JOIN language l ON c.language_code = l.code
                WHERE entry_id = ? AND c.status = ?
                ORDER BY sequence DESC, author ASC';
        $query = $this->db->query($sql, [$entry_id, 1]);
        $commentaries = $query->getResult(Commentary::class);
        $query->freeResult();

        $this->db->transComplete();
        
        return $commentaries;
    }

    /**
     * Create dropdown items
     */
    private function dropdownCommentaries($commentaries, $entry, $user_language_code = null, $default_cid = null)
    {
        $dropdown = array();

        if (isset($commentaries) && count($commentaries) > 0) {
            foreach ($commentaries as $row) {
                if (count($dropdown) == 0) {
                    array_push($dropdown, 
                        (new Commentary())->makePseudo(true, $row->language));
                } else {
                    $current_language = end($dropdown)->language;
                    if ($current_language !== $row->language) {
                        array_push($dropdown, 
                            (new Commentary())->makePseudo(true, $row->language));
                    }
                }
                array_push($dropdown, $row);
            }
        }
        
        return $this->pickDefaultDropdownCommentary($dropdown, $user_language_code, $default_cid);
    }

    private function pickDefaultDropdownCommentary($dropdown, $user_language_code = null, $default_cid = null) 
    {
        if (!isset($dropdown) || count($dropdown) < 2) return $dropdown;
        $user_language_code = $this->userLanguageCode($user_language_code);

        $firstDisplay = false;

        if (!isset($default_cid)) {
            foreach ($dropdown as $row) {
                // if still not selected for init load then compare with user language
                if (!$firstDisplay) {
                    if ($row->language_code === $user_language_code) {
                        $firstDisplay = true;
                        $row->default = true;
                        break;
                    }
                }
            }
        } else {
            foreach ($dropdown as $row) {
                if ($row->id === $default_cid) {
                    $firstDisplay = true;
                    $row->default = true;
                    break;
                }
            }
        }
        
        // if couldnt find matching language then pick the last language in dropdown
        if (!$firstDisplay) {
            $dropdown[1]->default = true;
        }

        // get default commentary's content
        foreach ($dropdown as $row) {
            if ($row->default) {
                $row->content = $this->where('id', $row->id)->first()->content;
            }
        }

        return $dropdown;
    }

    /**
     * If user-specified language is not available then display in other default languages
     */
    private function createLanguageArray(string $user_language_code) {
        $langs = Utilities::DEFAULT_LANGUAGES;
        array_push($langs, $user_language_code);
        return $langs;
    }

    /**
     * encoding string data for js / html
     */
    private function encodeData($commentaries) {
        // if (isset($commentaries)) {
        //     foreach ($commentaries as $comm) {
        //         $comm->encodedContent = Utilities::encodeDataHtml($comm->content);
        //         $comm->encodedAuthor = Utilities::encodeDataHtml($comm->author);
        //         $comm->encodedAuthorNote = Utilities::encodeDataHtml($comm->author_note);
        //         $comm->encodedNotation = Utilities::encodeDataHtml($comm->notation);
        //     }
        // }
        return $commentaries;
    }
}