<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Entities\ImageUrl;
use App\Helpers\Utilities;

// FIXME: error message when database operation failed.
class ImageUrlModel extends BaseModel
{
    public const DEFAULT_ORDERBYS               = array('sequence');
    public const DEFAULT_SORTORDERS             = array('DESC');
    
    public const HEADER_IMAGE_NAME_ORDERBYS     = array('image_name');
    public const HEADER_IMAGE_NAME_SORTORDERS   = array('ASC');
    
    public const HEADER_IMAGE_URL_ORDERBYS      = array('image_url');
    public const HEADER_IMAGE_URL_SORTORDERS    = array('ASC');

    public const HEADER_SEQUENCE_ORDERBYS       = self::DEFAULT_ORDERBYS;
    public const HEADER_SEQUENCE_SORTORDERS     = self::DEFAULT_SORTORDERS;

    protected $table = 'image_url';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'id', 'image_name', 'image_url', 'sequence',
    ];
    protected $returnType = ImageUrl::class;

    public function insertImageUrl($imageUrl)
    {
        $err = lang('App.msg_insert_fail', [lang('App.imageUrl_label_id'), $imageUrl->id]);
        if (!isset($imageUrl)) return $err;
        try {
            // FIXME: combine to 1 sql?
            if ($this->where('id', $imageUrl->id)->first() != null) return $err;
            if ($this->where('image_url', $imageUrl->image_url)->first() != null) {
                return lang('App.imageUrl_msg_duplicated', [lang('App.imageUrl_label_image_url'), $imageUrl->image_url]);
            }
            if ($this->where('sequence', $imageUrl->sequence)->first() != null) {
                return lang('App.imageUrl_msg_duplicated', [lang('App.imageUrl_label_sequence'), $imageUrl->sequence]);
            }

            $this->insert($imageUrl);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function modifyImageUrl($imageUrl)
    {
        $err = lang('App.msg_update_fail', [lang('App.imageUrl_label_id'), $imageUrl->id]);
        if (!isset($imageUrl)) return $err;
        try {
            if ($this->where('id', $imageUrl->id)->first() == null) return $err;
            if ($this->where('id !=', $imageUrl->id)->where('image_url', $imageUrl->image_url)->first() != null) {
                return lang('App.imageUrl_msg_duplicated', [lang('App.imageUrl_label_image_url'), $imageUrl->image_url]);
            }
            if ($this->where('id !=', $imageUrl->id)->where('sequence', $imageUrl->sequence)->first() != null) {
                return lang('App.imageUrl_msg_duplicated', [lang('App.imageUrl_label_sequence'), $imageUrl->sequence]);
            }

            $this->update($imageUrl->id, $imageUrl);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function moveImageUrl($id, $isSequenceUp) 
    {
        if (!isset($id)) return lang('App.msg_move_fail', [lang('App.imageUrl_label_id'), $id]);
        try {
            $moving = $this->getImageUrl($id);
            // cannot set sequence less than 1 or greater than 999 (by moving, set sequence UNIQUE so it won't happen?)
            $err = lang('App.msg_move_fail', [lang('App.label_sequence'), $moving->sequence]);
            if ($moving->sequence <= 1 && !$isSequenceUp) return $err;
            if ($moving->sequence > 10000000000 && $isSequenceUp) return $err;
            
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

    public function deleteImageUrl($id) 
    {
        $err = lang('App.msg_delete_fail', [lang('App.imageUrl_label_id'), $id]);
        if (!isset($id)) return $err;
        try {
            $this->db->table('image_url')->where('id', $id)->delete();
            if ($this->db->affectedRows() <= 0) {
                return $err;
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function getImageUrlCount(): int
    {
        return $this->db->table('image_url')->countAll();
    }

    public function getImageUrls($sort = null) 
    {
        if (!isset($sort)) {
            $sort = Sort::create(ImageUrlModel::DEFAULT_ORDERBYS, ImageUrlModel::DEFAULT_SORTORDERS, 1, -1, 0);    
        }  
        for ($i = 0; $i < count($sort->getOrderBys()); $i++) {
            $this->orderBy($sort->getOrderBys()[$i], $sort->getSortOrders()[$i]);
        }
        if ($sort->getRpp() < 0) return $this->findAll();
        else return $this->findAll($sort->getRpp(), ($sort->getCurrentPage() - 1) * $sort->getRpp());
    }

    public function getImageUrl($id) 
    {
        if (!isset($id)) return null;
        return $this->where('id', $id)->first();
    }
}