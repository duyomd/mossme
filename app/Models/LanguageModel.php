<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Entities\Language;
use App\Helpers\Utilities;

// FIXME: error message when database operation failed.
class LanguageModel extends BaseModel
{
    public const DEFAULT_ORDERBYS           = array('sequence', 'code');
    public const DEFAULT_SORTORDERS         = array('DESC', 'ASC');
    
    public const HEADER_CODE_ORDERBYS       = array('code');
    public const HEADER_CODE_SORTORDERS     = array('ASC');
    
    public const HEADER_LANGUAGE_ORDERBYS   = array('language');
    public const HEADER_LANGUAGE_SORTORDERS = array('ASC');

    public const HEADER_STATUS_ORDERBYS     = array('status_name');
    public const HEADER_STATUS_SORTORDERS   = array('ASC');

    public const HEADER_SEQUENCE_ORDERBYS   = self::DEFAULT_ORDERBYS;
    public const HEADER_SEQUENCE_SORTORDERS = self::DEFAULT_SORTORDERS;

    protected $table = 'language';
    protected $primaryKey = 'code';
    protected $allowedFields = [
        'code', 'language', 'status', 'sequence',
    ];
    protected $returnType = Language::class;

    public function insertLanguage($language)
    {
        $err = lang('App.msg_insert_fail', [lang('App.label_code'), $language->code]);
        if (!isset($language)) return $err;
        try {
            // FIXME: combine to 1 sql?
            if ($this->where('code', $language->code)->first() != null) return $err;
            if ($this->where('sequence', $language->sequence)->first() != null) 
                return lang('App.msg_insert_fail', [lang('App.label_sequence'), $language->sequence]);
            $this->insert($language);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function modifyLanguage($language)
    {
        $err = lang('App.msg_update_fail', [lang('App.label_code'), $language->code]);
        if (!isset($language)) return $err;
        try {
            if ($this->where('code', $language->code)->first() == null) return $err;
            if ($this->where('code !=', $language->code)->where('sequence', $language->sequence)->first() != null) 
                return lang('App.msg_update_sequence_fail', [lang('App.label_sequence'), $language->sequence]);
            $this->update($language->code, $language);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function moveLanguage($code, $isSequenceUp) 
    {
        if (!isset($code)) return lang('App.msg_move_fail', [lang('App.label_code'), $code]);
        try {
            $movingLang = $this->getLanguage($code);
            // cannot set sequence less than 1 or greater than 999 (by moving, set sequence UNIQUE so it won't happen?)
            $err = lang('App.msg_move_fail', [lang('App.label_sequence'), $movingLang->sequence]);
            if ($movingLang->sequence <= 1 && !$isSequenceUp) return $err;
            if ($movingLang->sequence > 999 && $isSequenceUp) return $err;
            
            $affectedLang = $this->where('sequence ' . ($isSequenceUp ? '>' : '<'), $movingLang->sequence)
                                    ->orderBy('sequence', $isSequenceUp ? 'ASC' : 'DESC')->first();
            // many records with same sequence but at max or min value (set sequence UNIQUE so this wont happen anymore?)
            if ($affectedLang == null) {
                if ($isSequenceUp) $movingLang->sequence = intval($movingLang->sequence) + 1;
                else $movingLang->sequence = intval($movingLang->sequence) - 1;
                $this->update($movingLang->code, $movingLang);
            } else {
                $newSeq = $affectedLang->sequence;
                $affectedLang->sequence = $movingLang->sequence;
                $movingLang->sequence = $newSeq;
                $this->update($affectedLang->code, $affectedLang);
                $this->update($movingLang->code, $movingLang);
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function deleteLanguage($code) 
    {
        $err = lang('App.msg_delete_fail', [lang('App.label_code'), $code]);
        if (!isset($code)) return $err;
        try {
            $this->db->table('language')->where('code', $code)->delete();
            if ($this->db->affectedRows() <= 0) {
                return $err;
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function getLanguageCount(): int
    {
        return $this->db->table('language')->countAll();
    }

    public function getLanguages($sort = null) 
    {
        if (!isset($sort)) {
            $sort = Sort::create(LanguageModel::DEFAULT_ORDERBYS, LanguageModel::DEFAULT_SORTORDERS, 1, -1, 0);    
        }        
        for ($i = 0; $i < count($sort->getOrderBys()); $i++) {
            $this->orderBy($sort->getOrderBys()[$i], $sort->getSortOrders()[$i]);
        }

        $sql = 
        'SELECT l.*, 
            CASE WHEN l.status = :status_inactive: THEN "' . lang('App.language_label_status_inactive') . '"' .
                ' ELSE "' . lang('App.language_label_status_active') . '" END AS status_name
        FROM language l' . 
        $this->getOrderBySql($sort) .
        $this->getLimitSql($sort);

        $this->db->transStart();    
        $query = $this->db->query($sql, ['status_inactive'  => Utilities::STATUS_INACTIVE]);
                                
        $results = $query->getResult();
        $query->freeResult();

        $this->db->transComplete();
        return $results;
    }

    public function getLanguage($code) 
    {
        if (!isset($code)) return null;
        return $this->where('code', $code)->first();
    }

}