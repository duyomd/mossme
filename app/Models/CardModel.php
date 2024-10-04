<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Entities\Card;
use App\Helpers\Utilities;

class CardModel extends BaseModel
{
    public const DEFAULT_ORDERBYS               = array('sequence');
    public const DEFAULT_SORTORDERS             = array('DESC');
    
    public const HEADER_IMAGE_NAME_ORDERBYS     = array('image_name');
    public const HEADER_IMAGE_NAME_SORTORDERS   = array('ASC');

    public const HEADER_STATUS_ORDERBYS         = array('status_name');
    public const HEADER_STATUS_SORTORDERS       = array('ASC');

    public const HEADER_MEMO_ORDERBYS         = array('memo');
    public const HEADER_MEMO_SORTORDERS       = array('ASC');
    
    public const HEADER_SEQUENCE_ORDERBYS       = self::DEFAULT_ORDERBYS;
    public const HEADER_SEQUENCE_SORTORDERS     = self::DEFAULT_SORTORDERS;

    protected $table = 'card';
    protected $allowedFields = [
        'id', 'memo', 'image_id', 'image_url', 'status', 'sequence',
    ];
    protected $returnType = Card::class;

    public function getActiveCardCount() {
        $this->db->transStart();
        $query = $this->db->query('SELECT COUNT(id) AS count FROM card WHERE status = ?', [Utilities::STATUS_ACTIVE]);
        $count = $query->getRow(0)->count;
        
        $query->freeResult();
        $this->db->transComplete();

        return !isset($count) ? 0 : intval($count);
    }

    public function getCardCount(): int
    {
        return $this->db->table('card')->countAll();
    }

    public function getCard($id = null) 
    {
        if (!isset($id)) return null;
        return $this->where('id', $id)->first();
    }

    public function getCardSiblings($id = null) 
    {
        if (!isset($id)) return null;

        $this->db->transStart();

        $sql = 'SELECT *,
                    (SELECT id FROM card c2 WHERE c2.sequence = c1.sequence - 1) AS previous_id,
                    (SELECT id FROM card c2 WHERE c2.sequence = c1.sequence + 1) AS next_id    
                FROM card c1
                WHERE c1.id = :id:';

        $query = $this->db->query($sql, [
                                    'id'        => $id, 
                                ]);
        $card = $query->getRow(0, Card::class);
        $query->freeResult();

        $this->db->transComplete();
        
        return $card;
    }

    public function getCards($sort) 
    {
        $sql = 
        'SELECT c.*, i.image_name, i.image_url,
            CASE WHEN c.status = :status_inactive: THEN "' . lang('App.entry_label_status_inactive') . '"' .
                ' ELSE "' . lang('App.entry_label_status_active') . '" END AS status_name
        FROM card c LEFT JOIN image_url i ON c.image_id = i.id' .
        $this->getOrderBySql($sort) .
        $this->getLimitSql($sort);

        $this->db->transStart();    
        $query = $this->db->query($sql, ['status_inactive'  => 0,]);
                                
        $results = $query->getResult();
        $query->freeResult();

        $this->db->transComplete();
        return $results;
    }

    public function insertCard($card)
    {
        $err = lang('App.msg_insert_fail', [lang('App.card_label_id'), $card->id]);
        if (!isset($card)) return $err;
        try {            
            if ($this->where('id', $card->id)->first() != null) return $err;
            // if ($this->where('image_id', $card->image_id)->first() != null) {
            //     return lang('App.card_msg_duplicated', [lang('App.card_label_image'), $card->image_id]);
            // }
            if ($this->where('sequence', $card->sequence)->first() != null) {
                return lang('App.card_msg_duplicated', [lang('App.card_label_sequence'), $card->sequence]);
            }

            $this->insert($card);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function modifyCard($card)
    {
        $err = lang('App.msg_update_fail', [lang('App.card_label_id'), $card->id]);
        if (!isset($card)) return $err;
        try {
            if ($this->where('id', $card->id)->first() == null) return $err;
            // if ($this->where('id !=', $card->id)->where('image_id', $card->image_id)->first() != null) {
            //     return lang('App.card_msg_duplicated', [lang('App.card_label_image_id'), $card->image_id]);
            // }
            if ($this->where('id !=', $card->id)->where('sequence', $card->sequence)->first() != null) {
                return lang('App.card_msg_duplicated', [lang('App.card_label_sequence'), $card->sequence]);
            }

            $this->update($card->id, $card);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function moveCard($id, $isSequenceUp) 
    {
        if (!isset($id)) return lang('App.msg_move_fail', [lang('App.card_label_id'), $id]);
        try {
            $moving = $this->getCard($id);
            // cannot set sequence less than 1 or greater than 9999 (by moving, set sequence UNIQUE so it won't happen?)
            $err = lang('App.msg_move_fail', [lang('App.card_label_sequence'), $moving->sequence]);
            if ($moving->sequence <= 1 && !$isSequenceUp) return $err;
            if ($moving->sequence > 10000 && $isSequenceUp) return $err;
            
            $affected = $this->where('sequence ' . ($isSequenceUp ? '>' : '<'), $moving->sequence)
                                    ->orderBy('sequence', $isSequenceUp ? 'ASC' : 'DESC')->first();
            // many records with same sequence but at max or min value (set sequence UNIQUE so this wont happen anymore?)
            if ($affected == null) {
                if ($isSequenceUp) $moving->sequence = intval($moving->sequence) + 1;
                else $moving->sequence = intval($moving->sequence) - 1;
                $this->update($moving->id, $moving);
            } else {
                $newSeq = $affected->sequence;
                $affected->sequence = $moving->sequence;
                $moving->sequence = $newSeq;
                $this->update($affected->id, $affected);
                $this->update($moving->id, $moving);
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function deleteCard($id) 
    {
        $err = lang('App.msg_delete_fail', [lang('App.card_label_id'), $id]);
        if (!isset($id)) return $err;
        try {
            $this->db->table('card')->where('id', $id)->delete();
            if ($this->db->affectedRows() <= 0) {
                return $err;
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }
}