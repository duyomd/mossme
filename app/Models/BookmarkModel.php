<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Entities\Bookmark;
use App\Helpers\Utilities;

class BookmarkModel extends BaseModel
{
  public const DEFAULT_ORDERBYS           = array('sequence');
  public const DEFAULT_SORTORDERS         = array('ASC');
  
  public const HEADER_NAME_ORDERBYS       = array('name');
  public const HEADER_NAME_SORTORDERS     = array('ASC');
  
  // public const HEADER_URL_ORDERBYS        = array('url');
  // public const HEADER_URL_SORTORDERS      = array('ASC');

  public const HEADER_NOTE_ORDERBYS       = array('note');
  public const HEADER_NOTE_SORTORDERS     = array('ASC');

  public const HEADER_SEQUENCE_ORDERBYS   = self::DEFAULT_ORDERBYS;
  public const HEADER_SEQUENCE_SORTORDERS = self::DEFAULT_SORTORDERS;

  protected $table = 'bookmark';
  protected $primaryKey = 'id';
  protected $allowedFields = [
    'id', 'user_id', 'url', 'name', 'note', 'sequence', 
  ];
  protected $returnType = Bookmark::class;

  public function insertBookmark($bookmark) 
  {
    $msg = lang('App.bookmark_msg_insert_fail');
    if (!isset($bookmark)) return $msg;
    try {
      $this->db->transStart();
      $sql = 'INSERT INTO bookmark (id, user_id, url, name, note, sequence)
              VALUES (NULL, :user_id:, :url:, :name:, :note:,
                    (SELECT CASE WHEN maxS IS NULL THEN 1 ELSE maxS + 1 END 
                      FROM
                          (SELECT MAX(sequence) maxS
                          FROM bookmark
                          WHERE user_id = :user_id:) t
                    )
              )';
      $query = $this->db->query($sql, ['user_id'  => $bookmark->user_id, 
                                       'url'      => $bookmark->url,
                                       'name'     => $bookmark->name,
                                       'note'     => $bookmark->note,]);                                     
      if (!$query) {
        return Utilities::createHtmlDbError($this->db->error());
      }
      $this->db->transComplete();
    } catch (\Exception $e) {
      log_message('error', $e->getMessage());
      return $e->getMessage();
    }
    return null;
  }

  public function modifyBookmark($bookmark)
  {
    $err = lang('App.msg_update_fail', [lang('App.bookmark_label_id'), $bookmark->id]);
    if (!isset($bookmark)) return $err;
    try {
      if ($this->where('id', $bookmark->id)->first() == null) return $err;
      if ($this->where('id !=', $bookmark->id)
        ->where('user_id', $bookmark->user_id)->where('sequence', $bookmark->sequence)->first() != null) {
        return lang('App.msg_update_sequence_fail', [lang('App.label_sequence'), $bookmark->sequence]);
      }
      $this->update($bookmark->id, $bookmark);
    } catch (\Exception $e) {
      log_message('error', $e->getMessage());
      return $e->getMessage();
    }
    return null;
  }

  public function moveBookmark($id, $isSequenceUp) 
  {
    if (!isset($id)) return lang('App.msg_move_fail', [lang('App.bookmark_label_id'), $id]);
    try {
      $movingBm = $this->getBookmark($id);
      // cannot set sequence less than 1 or greater than 999 (by moving, set sequence UNIQUE so it won't happen?)
      $err = lang('App.msg_move_fail', [lang('App.label_sequence'), $movingBm->sequence]);
      if ($movingBm->sequence <= 1 && !$isSequenceUp) return $err;
      if ($movingBm->sequence > 999 && $isSequenceUp) return $err;
      
      $affectedBm = $this->where('sequence ' . ($isSequenceUp ? '>' : '<'), $movingBm->sequence)
                              ->orderBy('sequence', $isSequenceUp ? 'ASC' : 'DESC')->first();
      // many records with same sequence but at max or min value (set sequence UNIQUE so this wont happen anymore?)
      if ($affectedBm == null) {
        if ($isSequenceUp) $movingBm->sequence = intval($movingBm->sequence) + 1;
        else $movingBm->sequence = intval($movingBm->sequence) - 1;
        $this->update($movingBm->id, $movingBm);
      } else {
        $newSeq = $affectedBm->sequence;
        $affectedBm->sequence = $movingBm->sequence;
        $movingBm->sequence = $newSeq;
        $this->update($affectedBm->id, $affectedBm);
        $this->update($movingBm->id, $movingBm);
      }
    } catch (\Exception $e) {
      log_message('error', $e->getMessage());
      return $e->getMessage();
    }
    return null;
  }

  public function deleteBookmark($id) 
  {
    $err = lang('App.msg_delete_fail', [lang('App.bookmark_label_id'), $id]);
    if (!isset($id)) return $err;
    try {
      $this->db->table('bookmark')->where('id', $id)->delete();
      if ($this->db->affectedRows() <= 0) {
        return $err;
      }
    } catch (\Exception $e) {
      log_message('error', $e->getMessage());
      return $e->getMessage();
    }
    return null;
  }

  public function getBookmarkCount($user_id): int
  {
    return $this->db->table('bookmark')->where('user_id', $user_id)->countAllResults();
  }

  public function getBookmarks($sort, $user_id) 
  {
    for ($i = 0; $i < count($sort->getOrderBys()); $i++) {
        $this->orderBy($sort->getOrderBys()[$i], $sort->getSortOrders()[$i]);
    }
    if ($sort->getRpp() < 0) return $this->where('user_id', $user_id)->findAll();
    else return $this->where('user_id', $user_id)
      ->findAll($sort->getRpp(), ($sort->getCurrentPage() - 1) * $sort->getRpp());
  }

  public function getBookmark($id) 
  {
    if (!isset($id)) return null;
    return $this->where('id', $id)->first();
  }
}