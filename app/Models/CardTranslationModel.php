<?php

namespace App\Models;

use App\Models\BaseModel;
use Config\Database;
use App\Entities\CardTranslation;
use App\Helpers\Utilities;

class CardTranslationModel extends BaseModel
{
    public const DEFAULT_ORDERBYS               = array('language_code', 'author');
    public const DEFAULT_SORTORDERS             = array('DESC', 'ASC');
    
    public const HEADER_CARD_ID_ORDERBYS        = array('card_id');
    public const HEADER_CARD_ID_SORTORDERS      = array('ASC');

    public const HEADER_AUTHOR_ORDERBYS         = array('author');
    public const HEADER_AUTHOR_SORTORDERS       = array('ASC');

    public const HEADER_LANGUAGE_ORDERBYS       = array('language');
    public const HEADER_LANGUAGE_SORTORDERS     = array('ASC');

    public const HEADER_STATUS_ORDERBYS         = array('status_name');
    public const HEADER_STATUS_SORTORDERS       = array('ASC');

    public const HEADER_HEADER_ORDERBYS         = array('header');
    public const HEADER_HEADER_SORTORDERS       = array('ASC');

    public const HEADER_FOOTER_ORDERBYS         = array('footer');
    public const HEADER_FOOTER_SORTORDERS       = array('ASC');

    public const HEADER_CONTENT_ORDERBYS        = array('content');
    public const HEADER_CONTENT_SORTORDERS      = array('ASC');

    protected $table = 'card_translation';
    protected $allowedFields = [
        'card_id', 'author', 'header', 'content', 'footer',
        'status', 'language_code',
    ];
    protected $returnType = CardTranslation::class;

    /**
     * Get table card_translation data for Home page events
     */
    public function getCardTranslationsBySequences($sequences, $user_language_code = null)
    {
        $trans = array(); 
        
        if (!isset($sequences) || count($sequences) == 0) {
            return $trans;
        }
        $user_language_code = $this->userLanguageCode($user_language_code);

        $this->db->transStart();

        /** This SQL is better, but supported on SQL>=8.0 only *//////////////////////////////////
        // $sql = 
        //     'SELECT *
        //     FROM (
        //         SELECT t.*
        //             , (SELECT image_url FROM image_url i WHERE c.image_id = i.id) AS image_url
        //             , ROW_NUMBER() OVER(PARTITION BY card_id 
        //                 ORDER BY CASE WHEN language_code = :user_lang: THEN 1 ELSE 2 END ASC,
        //                                    language.sequence DESC) as rn
        //         FROM card_translation t
        //             LEFT JOIN card c ON t.card_id = c.id
        //             LEFT JOIN language ON language_code = code
        //         WHERE c.sequence IN :sequences: AND t.status = :status: AND c.status = :status:
        //             #AND language_code IN :langs:
        //         ) temp
        //     WHERE temp.rn = 1';
        /////////////////////////////////////////////////////////////////////////////////////////

        /** Used for host with lower SQL version (T.T), 
         * not 100% guaranteed it will always return the first row of each group,
         * even when adding session variables like @:row_num */
        $sql = 
        'SELECT id, MIN(card_id), language_code, author, header, content, footer, status, image_url
        FROM (
            SELECT t.*
                , (SELECT image_url FROM image_url i WHERE c.image_id = i.id) AS image_url
            FROM card_translation t
                LEFT JOIN card c ON t.card_id = c.id
                LEFT JOIN language ON language_code = code
            WHERE c.sequence IN :sequences: AND t.status = :status: AND c.status = :status:
            GROUP BY card_id, language_code
            ORDER BY CASE WHEN language_code = :user_lang: THEN 1 ELSE 2 END ASC,
                    language.sequence DESC
            ) temp
        GROUP BY card_id';

        $query = $this->db->query($sql, [
                                    'sequences' => $sequences, 
                                    'status'    => Utilities::STATUS_ACTIVE,
                                    'user_lang' => $user_language_code,      
                                ]);
        $trans = $query->getResult(CardTranslation::class);
        $query->freeResult();

        $this->db->transComplete();

        return $trans;
    }

    public function getCardTranslationsByCardId($cardId = null, $sort)
    {
        if (!isset($cardId)) return null;

        $sql = 
        'SELECT t.*, l.language AS language,
            CASE WHEN t.status = :status_inactive: THEN "' . lang('App.card_translation_label_status_inactive') . '"' .
                ' ELSE "' . lang('App.card_translation_label_status_active') . '" END AS status_name ' .
        'FROM card_translation t LEFT JOIN language l ON t.language_code = l.code
         WHERE card_id = :card_id: ' .
        $this->getOrderBySql($sort) .
        $this->getLimitSql($sort);

        $this->db->transStart();    
        $query = $this->db->query($sql, ['card_id'          => $cardId,
                                         'status_inactive'  => 0,]);
                                
        $results = $query->getResult();
        $query->freeResult();

        $this->db->transComplete();
        return $this->encodeData($results);
    }

    public function findCardTranslation($id) 
    {
        $cardTranslation = $this->where('id', $id)->first();
        if (!isset($cardTranslation)) return $cardTranslation;
        return $this->encodeData([$cardTranslation])[0];
    }

    public function insertCardTranslation($cardTranslation)
    {
        $err = lang('App.msg_insert_fail', [lang('App.card_translation_label_id'), $cardTranslation->id]);
        if (!isset($cardTranslation)) return $err;
        try {
            if ($this->where('id', $cardTranslation->id)->first() != null) return $err;
            $this->insert($cardTranslation);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function modifyCardTranslation($cardTranslation)
    {
        $err = lang('App.msg_update_fail', [lang('App.card_translation_label_id'), $cardTranslation->id]);
        if (!isset($cardTranslation)) return $err;
        try {
            if ($this->where('id', $cardTranslation->id)->first() == null) return $err;
            $this->update($cardTranslation->id, $cardTranslation);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function deleteCardTranslation($id) 
    {
        $err = lang('App.msg_delete_fail', [lang('App.card_translation_label_id'), $id]);
        if (!isset($id)) return $err;
        try {
            $this->db->table('card_translation')->where('id', $id)->delete();
            if ($this->db->affectedRows() <= 0) {
                return $err;
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function getCardTranslationCount($cardId): int
    {
        return $this->db->table('card_translation')->where('card_id', $cardId)->countAllResults();
    }

    /******************* Private methods *************************/

    private function encodeData($translations, $slash = true) {
        if (isset($translations)) {
            foreach ($translations as $tran) {
                $tran->header_field = $tran->header;
                $tran->footer_field = $tran->footer;
            }
        }
        return $translations;
    }

}