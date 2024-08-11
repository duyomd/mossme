<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Helpers\Utilities;
use App\Entities\Message;

class MessageModel extends BaseModel
{
    public const DEFAULT_ORDERBYS               = array('status', 'sent_at');
    public const DEFAULT_SORTORDERS             = array('DESC', 'DESC');

    public const HEADER_READSTATE_ORDERBYS      = array('read_state');
    public const HEADER_READSTATE_SORTORDERS    = array('ASC');
    
    public const HEADER_SENDER_ORDERBYS         = array('sender');
    public const HEADER_SENDER_SORTORDERS       = array('ASC');
    
    public const HEADER_IPADDRESS_ORDERBYS      = array('ip_address');
    public const HEADER_IPADDRESS_SORTORDERS    = array('ASC');

    public const HEADER_ULC_ORDERBYS            = array('user_language_code');
    public const HEADER_ULC_SORTORDERS          = array('ASC');

    public const HEADER_NAME_ORDERBYS           = array('name');
    public const HEADER_NAME_SORTORDERS         = array('ASC');

    public const HEADER_EMAIL_ORDERBYS          = array('email');
    public const HEADER_EMAIL_SORTORDERS        = array('ASC');

    public const HEADER_SUBJECT_ORDERBYS        = array('subject');
    public const HEADER_SUBJECT_SORTORDERS      = array('ASC');

    public const HEADER_CONTENT_ORDERBYS        = array('content');
    public const HEADER_CONTENT_SORTORDERS      = array('ASC');

    public const HEADER_SENTAT_ORDERBYS         = array('sent_at');
    public const HEADER_SENTAT_SORTORDERS       = array('ASC');

    public const HEADER_STATUS_ORDERBYS         = self::DEFAULT_ORDERBYS;
    public const HEADER_STATUS_SORTORDERS       = self::DEFAULT_SORTORDERS;

    protected $table = 'message';
    protected $allowedFields = [
        'id', 'sender', 'ip_address', 'user_language_code', 
        'name', 'email', 'subject', 'content', 'status', 'sent_at', 
        'read_state', 'language',
    ];
    protected $returnType = Message::class;

    public function saveMessage($message)
    {
        if (isset($message)) {
            $this->save($message);
        }
    }

    public function modifyMessage($message)
    {
        $err = lang('App.msg_update_fail', [lang('App.message_label_id'), $message->id]);
        if (!isset($message)) return $err;
        try {
            if ($this->where('id', $message->id)->first() == null) return $err;
            $this->update($message->id, $message);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function findReadMessage($message_id, $user_id) 
    {
        if (!isset($message_id) || !isset($user_id)) return null;

        $this->db->transStart();

        $sql = 'SELECT * FROM message_read WHERE message_id = :message_id: AND user_id = :user_id:';

        $query = $this->db->query($sql, ['message_id' => $message_id, 'user_id' => $user_id,]);
        $read = $query->getRow();
        $query->freeResult();

        $this->db->transComplete();

        return $read;
    }

    public function markAsRead($message_id, $user_id)
    {
        if ($this->findReadMessage($message_id, $user_id) == null) {
            $this->db->table('message_read')
                ->insert(['message_id' => $message_id, 'user_id' => $user_id]);
        }
    }

    public function markAsUnread($message_id, $user_id)
    {
        $this->db->table('message_read')
            ->where('message_id', $message_id)->where('user_id', $user_id)
            ->delete();
    }

    public function deleteMessage($id) 
    {
        $err = lang('App.msg_delete_fail', [lang('App.message_label_id'), $id]);
        if (!isset($id)) return $err;
        try {
            $this->db->table('message')->where('id', $id)->delete();
            if ($this->db->affectedRows() <= 0) {
                return $err;
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function getMessage($id, $user_id) 
    {
        if (!isset($id)) return null;
        $message = $this->where('id', $id)->first(); 
        if ($message != null) {
            $read = $this->findReadMessage($id, $user_id) != null ? '1' : '0';
            $message->read_state = $read;
        }
        return $message;
    }

    public function getMessageCount() 
    {
        return $this->db->table('message')->countAll();
    }

    public function getMessages($user_id, $sort)
    {
        $this->db->transStart();

        $sql = 
        'SELECT m.*, l.language AS language
            , CASE WHEN 
                (SELECT id
                    FROM message_read r
                    WHERE r.message_id = m.id AND r.user_id = :user_id: LIMIT 1)
               IS NULL THEN 0 ELSE 1 END AS read_state
        FROM message m
        LEFT JOIN language l ON l.code = m.user_language_code' .
        BaseModel::getOrderBySql($sort) .
        BaseModel::getLimitSql($sort);

        $query = $this->db->query($sql, ['user_id' => $user_id,]);
        $messages = $query->getResult(Message::class);
        $query->freeResult();

        $this->db->transComplete();

        return $messages;
    }

}