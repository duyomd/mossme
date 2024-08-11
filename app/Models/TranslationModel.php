<?php

namespace App\Models;

use App\Models\BaseModel;
use Config\Database;
use App\Entities\Translation;
use App\Entities\Entry;
use App\Helpers\Utilities;

class TranslationModel extends BaseModel
{

    private const SHORTENED_CONTENT_LENGTH      = -1; 

    public const DEFAULT_ORDERBYS               = array('language_code', 'author');
    public const DEFAULT_SORTORDERS             = array('DESC', 'ASC');
    
    public const HEADER_ENTRY_ID_ORDERBYS       = array('entry_id');
    public const HEADER_ENTRY_ID_SORTORDERS     = array('ASC');

    public const HEADER_TITLE_ORDERBYS          = array('title');
    public const HEADER_TITLE_SORTORDERS        = array('ASC');

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

    protected $table = 'translation';
    protected $allowedFields = [
        'entry_id', 'author', 'author_note', 'title', 'content',
        'notation', 'status', 'language_code',
    ];
    protected $returnType = Translation::class;

    /**
     * Get table Translation data
     */
    public function getTranslations(Entry $entry, $user_language_code = null, $default_tid = null)
    {
        if ($entry == null || !isset($entry->id)) {
            return null;
        }
        
        $translations = $this->sortTranslationsByLanguage($entry->id);
        $translations = $this->dropdownTranslations($translations, $entry, $user_language_code, $default_tid);
        $translations = $this->encodeData($translations);

        return $translations;
    }

    public function getParents($entry, string $user_language_code)
    {
        return $this->getParentsForTree($entry, $user_language_code);
    }

    public function getChildren($entry, string $user_language_code)
    {
        
        return $this->getChildrenInFolder($entry, $user_language_code);
    }

    public function getSuttaMenu($user_language_code = null) 
    {
        return $this->encodeData($this->changeImagePath(
                $this->getSuttaTranslations($user_language_code), Utilities::IMAGE_FOLDER_MENU),
                false);
    }

    public function getNonSuttaMenu($user_language_code = null) 
    {
        return $this->encodeData($this->changeImagePath(
                $this->getNonSuttaTranslations($user_language_code), Utilities::IMAGE_FOLDER_DISCUSSIONS),
                false);
    }

    public function getTranslationsByEntryId($entryId = null, $sort)
    {
        if (!isset($entryId)) return null;

        $sql = 
        'SELECT t.*, l.language AS language,
            CASE WHEN t.status = :status_inactive: THEN "' . lang('App.translation_label_status_inactive') . '"' .
                ' ELSE "' . lang('App.translation_label_status_active') . '" END AS status_name ' .
        'FROM translation t LEFT JOIN language l ON t.language_code = l.code
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

    public function findTranslation($id) 
    {
        return $this->where('id', $id)->first();
    }

    public function insertTranslation($translation)
    {
        $err = lang('App.msg_insert_fail', [lang('App.translation_label_id'), $translation->id]);
        if (!isset($translation)) return $err;
        try {
            if ($this->where('id', $translation->id)->first() != null) return $err; // iranai?
            $this->insert($translation);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function modifyTranslation($translation)
    {
        $err = lang('App.msg_update_fail', [lang('App.translation_label_id'), $translation->id]);
        if (!isset($translation)) return $err;
        try {
            if ($this->where('id', $translation->id)->first() == null) return $err;
            $this->update($translation->id, $translation);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function deleteTranslation($id) 
    {
        $err = lang('App.msg_delete_fail', [lang('App.translation_label_id'), $id]);
        if (!isset($id)) return $err;
        try {
            $this->db->table('translation')->where('id', $id)->delete();
            if ($this->db->affectedRows() <= 0) {
                return $err;
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function getTranslationCount($entryId): int
    {
        return $this->db->table('translation')->where('entry_id', $entryId)->countAllResults();
    }

    /******************* Private methods *************************/

    /**
     * Query translation list sort by language
     */
    private function sortTranslationsByLanguage($entry_id = false) 
    {
        if ($entry_id === false) {
            return null;
        }

        $this->db->transStart();

        $sql = 'SELECT * FROM translation LEFT JOIN language
                ON translation.language_code = language.code
                WHERE entry_id = ? AND status = ?
                ORDER BY sequence DESC, author ASC';
        $query = $this->db->query($sql, [$entry_id, Utilities::STATUS_ACTIVE]);
        $translations = $query->getResult(Translation::class);
        $query->freeResult();

        $this->db->transComplete();
        
        return $translations;
    }

    /**
     * Folder type -> search children list
     *      Titles are displayed in user language
     *      If not available then displayed in other default languages
     * Translations dropdown, in same language group -> sort author asc
     *      so to be in sync, add order-by `author` in rownum & group by ⇩
     */
    private function getChildrenInFolder(Entry $entry, string $user_language_code) 
    {
        $children_trans = array(); 
        
        if (!isset($entry) || !($entry->isFolder)) return $children_trans;
        $user_language_code = $this->userLanguageCode($user_language_code);

        $this->db->transStart();

        $sql = 
            'SELECT entry_id, author, author_note, title, status 
            FROM (
                SELECT translation.*
                    , ROW_NUMBER() OVER(PARTITION BY entry_id 
                        ORDER BY CASE WHEN language_code = :user_lang: THEN 1 ELSE 2 END ASC,
                                           language.sequence DESC, author ASC) as rn
                FROM translation 
                    LEFT JOIN entry ON translation.entry_id = entry.id
                    LEFT JOIN language ON language_code = code
                WHERE parent_id = :entry_id: AND translation.status = :status: AND entry.status = :status:
                    #AND language_code IN :langs:
                GROUP BY entry_id, language_code, author
                ORDER BY entry.sequence ASC
                ) temp
            WHERE temp.rn = 1';

        $query = $this->db->query($sql, [
                                    'entry_id'  => $entry->id, 
                                    'status'    => Utilities::STATUS_ACTIVE,
                                    'user_lang' => $user_language_code,      
                                    // 'langs'     => Utilities::createLanguageArray($user_language_code),
                                ]);
        $children_trans = $query->getResult(Translation::class);
        $query->freeResult();

        $this->db->transComplete();

        return $children_trans;
    }

    private function getParentsForTree(Entry $entry, string $user_language_code)
    {
        $parents_trans = array(); 
        
        if (!isset($entry)) return $parents_trans;
        $user_language_code = $this->userLanguageCode($user_language_code);

        $this->db->transStart();

        // must set or error, since the default collation is utf8_general_ci
        $sql = 'SET @r := :entry_id: COLLATE utf8_unicode_ci, @l := 0;';
        $this->db->query($sql, ['entry_id' => $entry->id]);

        $sql = 
            'SELECT entry_id, author, author_note, title, status
            FROM (
                SELECT t.*
                    , ROW_NUMBER() OVER(PARTITION BY entry_id 
                                        ORDER BY CASE WHEN language_code = :user_lang: THEN 1 ELSE 2 END ASC,
                                                           language.sequence DESC) as rn
                FROM (
                    SELECT
                        @r AS _id,
                        (SELECT @r := parent_id FROM entry WHERE id = _id) AS parent_id,
                        @l := @l + 1 AS lvl
                    FROM (SELECT @r, @l) vars JOIN entry
                    WHERE @r IS NOT NULL) e1
                JOIN entry e2 ON e1._id = e2.id
                JOIN translation t ON t.entry_id = e2.id
                JOIN language ON language_code = code
                WHERE t.status = :status: AND e2.status = :status: 
                    #AND language_code IN :langs:
                GROUP BY t.entry_id, t.language_code
                ORDER BY e1.lvl DESC) temp
            WHERE temp.rn = 1';

        $query = $this->db->query($sql, [
                                    'status'    => Utilities::STATUS_ACTIVE,
                                    'user_lang' => $user_language_code,      
                                    // 'langs'     => Utilities::createLanguageArray($user_language_code),
                                ]);
                                
        $parents_trans = $query->getResult(Translation::class);
        $query->freeResult();

        $this->db->transComplete();

        return $parents_trans;
    }

    /**
     * get sutta (nikaya + agama) & history
     */
    private function getSuttaTranslations(string $user_language_code) 
    {
        $user_language_code = $this->userLanguageCode($user_language_code);

        $this->db->transStart();

        $sql = 
            'SELECT *
            FROM (
                SELECT t.*, e.section_id AS section_id
                    , (SELECT image_url FROM image_url WHERE image_id_header = image_url.id) 
                        AS image_url_header
    	            , (SELECT image_url FROM image_url WHERE image_id_content = image_url.id) 
                        AS image_url_content
                    , (SELECT image_url FROM image_url WHERE image_id_commentary = image_url.id) 
                        AS image_url_commentary
                    , (SELECT image_url FROM image_url WHERE image_id_footer = image_url.id) 
                        AS image_url_footer
                    , ROW_NUMBER() OVER(PARTITION BY entry_id 
                        ORDER BY CASE WHEN language_code = :user_lang: THEN 1 ELSE 2 END ASC,
                                           language.sequence DESC, author ASC) as rn
                FROM translation t
                    LEFT JOIN entry e ON t.entry_id = e.id
                    LEFT JOIN language ON language_code = code
                    LEFT JOIN section s ON e.section_id = s.id
                WHERE parent_id IS NULL AND s.id IN :section_ids:
                    AND t.status = :status: AND e.status = :status:
                    #AND language_code IN :langs:
                GROUP BY section_id, entry_id, language_code, author
                ORDER BY CASE WHEN e.section_id = :section_id_history: THEN 2 ELSE 1 END ASC,
    	            e.sequence ASC, s.sequence ASC   
                ) temp
            WHERE temp.rn = 1';

        $query = $this->db->query($sql, [
                                    'section_ids'           => Utilities::SECTION_IDS_MENU_SUTTA,
                                    'section_id_history'    => Utilities::SECTION_ID_HISTORY,
                                    'status'                => Utilities::STATUS_ACTIVE,
                                    'user_lang'             => $user_language_code,      
                                    // 'langs'                 => Utilities::createLanguageArray($user_language_code),
                                ]);
        $trans = $query->getResult(Translation::class);
        $query->freeResult();

        $this->db->transComplete();

        return $trans;
    }

    /**
     * get neither [nikaya, agama, history]
     */
    private function getNonSuttaTranslations(string $user_language_code) 
    {
        $user_language_code = $this->userLanguageCode($user_language_code);

        $this->db->transStart();

        $sql = 
            'SELECT *
            FROM (
                SELECT t.*, e.section_id AS section_id
                    , (SELECT image_url FROM image_url WHERE image_id_header = image_url.id) 
                        AS image_url_header
    	            , (SELECT image_url FROM image_url WHERE image_id_content = image_url.id) 
                        AS image_url_content
                    , (SELECT image_url FROM image_url WHERE image_id_commentary = image_url.id) 
                        AS image_url_commentary
                    , (SELECT image_url FROM image_url WHERE image_id_footer = image_url.id) 
                        AS image_url_footer
                    , ROW_NUMBER() OVER(PARTITION BY entry_id 
                        ORDER BY CASE WHEN language_code = :user_lang: THEN 1 ELSE 2 END ASC,
                                           language.sequence DESC, author ASC) as rn
                FROM translation t
                    LEFT JOIN entry e ON t.entry_id = e.id
                    LEFT JOIN language ON language_code = code
                    LEFT JOIN section s ON e.section_id = s.id
                WHERE parent_id IS NULL AND s.id NOT IN :section_ids:
                    AND t.status = :status: AND e.status = :status:
                    #AND language_code IN :langs:
                GROUP BY section_id, entry_id, language_code, author
                ORDER BY s.sequence ASC, e.sequence ASC
                ) temp
            WHERE temp.rn = 1';

        $query = $this->db->query($sql, [
                                    'section_ids'           => Utilities::SECTION_IDS_MENU_SUTTA,
                                    'status'                => Utilities::STATUS_ACTIVE,
                                    'user_lang'             => $user_language_code,      
                                    // 'langs'                 => Utilities::createLanguageArray($user_language_code),
                                ]);
        $trans = $query->getResult(Translation::class);
        $query->freeResult();

        $this->db->transComplete();

        return $trans;
    }

    /**
     * Create dropdown items
     */
    private function dropdownTranslations($translations, $entry, $user_language_code = null, $default_tid = null)
    {
        $dropdown = array();

        if (isset($translations) && count($translations) > 0) {
            foreach ($translations as $row) {
                if (count($dropdown) == 0) {
                    array_push($dropdown, 
                        (new Translation())->makePseudo(true, $row->language, ''));
                } else {
                    $current_language = end($dropdown)->language;
                    if ($current_language !== $row->language) {
                        array_push($dropdown, 
                            (new Translation())->makePseudo(true, $row->language, ''));
                    }
                }
                array_push($dropdown, $row);
            }
        }

        // create reference item if set
        if (isset($entry) && isset($entry->reference_url) && !empty($entry->reference_url)) {
            // header
            array_push($dropdown, 
                (new Translation())->makePseudo(true, 'Chi Tiết', ''));
            // name & link    
            array_push($dropdown, 
                (new Translation())->makePseudo(true, $entry->reference_source, $entry->reference_url));
        }

        return $this->pickDefaultDropdownTranslation($dropdown, $entry, $user_language_code, $default_tid);
    }

    private function pickDefaultDropdownTranslation($dropdown, $entry, $user_language_code = null, $default_tid = null) 
    {
        if (!isset($dropdown)) return $dropdown;
        if (!isset($entry->reference_url) || empty($entry->reference_url)) {
            if (count($dropdown) < 2) return $dropdown;
        } else {
            if (count($dropdown) < 4) return $dropdown;
        }
        
        $user_language_code = $this->userLanguageCode($user_language_code);

        $firstDisplay = false;
        
        if (!isset($default_tid)) {
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
            // $firstDisplay;
            foreach ($dropdown as $row) {
                if ($row->id == $default_tid) {
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

        return $dropdown;
    }

    /**
     * encoding string data for js / html
     */
    private function encodeData($translations, $slash = true) {
        if (isset($translations)) {
            foreach ($translations as $tran) {
                $tran->encodedTitle = Utilities::encodeDataHtml($tran->title, $slash);
                $tran->encodedContent = Utilities::encodeDataHtml($tran->content, $slash);
                $tran->encodedAuthor = Utilities::encodeDataHtml($tran->author, $slash);
                $tran->encodedAuthorNote = Utilities::encodeDataHtml($tran->author_note, $slash);
                $tran->encodedNotation = Utilities::encodeDataHtml($tran->notation, $slash);

                // $tran->content_str = Utilities::shortenString($tran->content, self::SHORTENED_CONTENT_LENGTH);
                // $tran->author_note_str = Utilities::shortenString($tran->author_note, self::SHORTENED_CONTENT_LENGTH);
                // $tran->notation_str = Utilities::shortenString($tran->notation, self::SHORTENED_CONTENT_LENGTH);
            }
        }
        return $translations;
    }

    /**
     * change image folder path (background -> menu / discussions)
     *  for smaller size load and shape
     */
    private function changeImagePath($translations, $newFolder) {
        if (isset($translations) && isset($newFolder)) {
            foreach ($translations as $tran) {
                // only replace the first matched, due to the possibility that filename may contain $newFolder
                $pos = strpos($tran->image_url_header, Utilities::IMAGE_FOLDER_BACKGROUND);
                if ($pos !== false) {
                    $tran->image_url_header =
                        substr_replace($tran->image_url_header, $newFolder, $pos, strlen(Utilities::IMAGE_FOLDER_BACKGROUND));
                }
            }
        }
        return $translations;
    }
}