<?php

namespace App\Models;

use App\Models\BaseModel;
use App\Models\TranslationModel;
use App\Entities\Entry;
use App\Helpers\Utilities;

class EntryModel extends BaseModel
{
    public const DEFAULT_ORDERBYS                       = array('section_sequence', 'sequence');
    public const DEFAULT_SORTORDERS                     = array('ASC', 'ASC');
    
    public const HEADER_TYPE_ORDERBYS                   = array('type');
    public const HEADER_TYPE_SORTORDERS                 = array('ASC');
    
    public const HEADER_SECTION_ORDERBYS                = array('section_name');
    public const HEADER_SECTION_SORTORDERS              = array('ASC');

    public const HEADER_ROOT_ORDERBYS                   = array('root_id');
    public const HEADER_ROOT_SORTORDERS                 = array('ASC');

    public const HEADER_ID_ORDERBYS                     = array('id');
    public const HEADER_ID_SORTORDERS                   = array('ASC');

    public const HEADER_PARENT_ORDERBYS                 = array('parent_id');
    public const HEADER_PARENT_SORTORDERS               = array('ASC');

    public const HEADER_SERIALS_ORDERBYS                = array('serials');
    public const HEADER_SERIALS_SORTORDERS              = array('ASC');

    public const HEADER_ENUMERATION_ORDERBYS            = array('enumeration');
    public const HEADER_ENUMERATION_SORTORDERS          = array('ASC');

    public const HEADER_IMAGE_HEADER_ORDERBYS           = array('image_name_header');
    public const HEADER_IMAGE_HEADER_SORTORDERS         = array('ASC');

    public const HEADER_IMAGE_CONTENT_ORDERBYS          = array('image_name_content');
    public const HEADER_IMAGE_CONTENT_SORTORDERS        = array('ASC');

    public const HEADER_IMAGE_COMMENTARY_ORDERBYS       = array('image_name_commentary');
    public const HEADER_IMAGE_COMMENTARY_SORTORDERS     = array('ASC');

    public const HEADER_IMAGE_FOOTER_ORDERBYS           = array('image_name_footer');
    public const HEADER_IMAGE_FOOTER_SORTORDERS         = array('ASC');

    public const HEADER_STATUS_ORDERBYS                 = array('status_name');
    public const HEADER_STATUS_SORTORDERS               = array('ASC');

    public const HEADER_CHILDREN_GROUPABLE_ORDERBYS     = array('children_groupable_name');
    public const HEADER_CHILDREN_GROUPABLE_SORTORDERS   = array('ASC');

    public const HEADER_TAGS_ORDERBYS                   = array('tags');
    public const HEADER_TAGS_SORTORDERS                 = array('ASC');

    public const HEADER_VIDEO_URL_ORDERBYS              = array('video_url');
    public const HEADER_VIDEO_URL_SORTORDERS            = array('ASC');

    public const HEADER_REFERENCE_SOURCE_ORDERBYS       = array('reference_source');
    public const HEADER_REFERENCE_SOURCE_SORTORDERS     = array('ASC');

    public const HEADER_REFERENCE_URL_ORDERBYS          = array('reference_url');
    public const HEADER_REFERENCE_URL_SORTORDERS        = array('ASC');

    public const HEADER_CREATED_BY_ORDERBYS             = array('created_by');
    public const HEADER_CREATED_BY_SORTORDERS           = array('ASC');

    public const HEADER_SEQUENCE_ORDERBYS               = array('sequence');
    public const HEADER_SEQUENCE_SORTORDERS             = array('ASC');

    public const HEADER_SEQUENCE_MIXED_ORDERBYS         = self::DEFAULT_ORDERBYS;
    public const HEADER_SEQUENCE_MIXED_SORTORDERS       = self::DEFAULT_SORTORDERS;

    protected $table = 'entry';
    protected $allowedFields = [
        'id', 'parent_id', 'root_id', 'type', 'serials', 'enumeration', 'section_id',
        'image_id_header', 'image_id_content', 'image_id_commentary', 'image_id_footer',
        'reference_source', 'reference_url', 'sequence', 'status', 'video_url', 'tags',
        'previous_id', 'next_id', 'created_by', 'children_groupable',
        'group_ids_start', 'group_ids_end',
    ];
    protected $primaryKey = 'id';
    protected $returnType = Entry::class;
    // protected $useTimestamps = true;

    public function getEntry($id = null)
    {
        $entry = $this->getEntryAndSiblings($id);
        return $this->setEntryExtraInfo($entry);
    }

    // /**
    //  * title for display on screen based on specified language
    //  */
    // public function displayTitle($entry, $user_language_code)
    // {
    //     $display_title = '';
    //     $display_enum_title = '';
    //     $display_content = '';
    //     $parents = $entry->translationsParents;
    //     if (isset($parents) && count($parents) > 0) {
    //         $display_title = end($parents)->title;
    //         $display_enum_title = end($parents)->enum_title;
    //         $display_content = end($parents)->content;
    //     }
    //     // TODO encode for html
    //     $entry->displayTitle = $display_title;
    //     $entry->displayEnumTitle = $display_enum_title;
    //     $entry->displayContent = $display_content;
    //     return $entry;
    // }

    public function getEntries($parentId, $sort) 
    {
        $sql = 
        'SELECT e.*, section_name, s.sequence AS section_sequence,
            CASE WHEN e.status = :status_inactive: THEN "' . lang('App.entry_label_status_inactive') . '"' .
                ' ELSE "' . lang('App.entry_label_status_active') . '" END AS status_name,
            CASE WHEN e.children_groupable = :ungroupable: THEN "' . lang('App.entry_label_cg_ungroupable') . '"' .
                ' ELSE "' . lang('App.entry_label_cg_groupable') . '" END AS children_groupable_name,    
            (SELECT image_url FROM image_url WHERE image_id_header = image_url.id) AS image_url_header ,
            (SELECT image_name FROM image_url WHERE image_id_header = image_url.id) AS image_name_header, 
            (SELECT image_url FROM image_url WHERE image_id_content = image_url.id) AS image_url_content ,
            (SELECT image_name FROM image_url WHERE image_id_content = image_url.id) AS image_name_content, 
            (SELECT image_url FROM image_url WHERE image_id_commentary = image_url.id) AS image_url_commentary ,
            (SELECT image_name FROM image_url WHERE image_id_commentary = image_url.id) AS image_name_commentary, 
            (SELECT image_url FROM image_url WHERE image_id_footer = image_url.id) AS image_url_footer,
            (SELECT image_name FROM image_url WHERE image_id_footer = image_url.id) AS image_name_footer
        FROM entry e        
        LEFT JOIN section s ON e.section_id = s.id
        WHERE parent_id ' . (isset($parentId) ? '= :parent_id:' : 'IS NULL') .
        $this->getOrderBySql($sort) .
        $this->getLimitSql($sort);

        $this->db->transStart();    
        $query = $this->db->query($sql, ['parent_id'        => $parentId,
                                         'status_inactive'  => Utilities::STATUS_INACTIVE,
                                         'ungroupable'      => Utilities::CHILDREN_UNGROUPABLE,]);
                                
        $results = $query->getResult();
        $query->freeResult();

        $this->db->transComplete();
        return $this->encodeData($results);
    }

    public function getEntryOnly($id = null)
    {
        if (!isset($id)) return null;
        return $this->where('id', $id)->first();
    }

    public function getEntryRangeId($id = null)
    {
        if (!isset($id)) return null;

        $this->db->transStart();

        $sql = 'SELECT id 
        FROM entry 
        WHERE (type = :type_folder: AND id = :id:)
            OR (type = :type_file: AND :id: BETWEEN group_ids_start AND group_ids_end)
        AND status = :status:';
        
        $query = $this->db->query($sql, [
                                    'id'            => $id, 
                                    'status'        => Utilities::STATUS_ACTIVE,
                                    'type_folder'   => Utilities::TYPE_FOLDER,
                                    'type_file'     => Utilities::TYPE_FILE,
                                ]);
        $result = $query->getRow(0);
        $query->freeResult();

        $this->db->transComplete();
        
        return $result == null ? null : $result->id;
    }

    public function findParentWithRoot($parentId, $rootId)
    {
        if (!isset($parentId)) return null;

        $this->db->transStart();

        $sql = 'SELECT * 
        FROM entry 
        WHERE id = :parentId:
        AND (
            (parent_id IS NULL AND :rootId: = :parentId:) 
            OR (parent_id IS NOT NULL AND root_id = :rootId:)
        )';
        
        $query = $this->db->query($sql, [
                                    'parentId'  => $parentId, 
                                    'rootId'   => $rootId,
                                ]);
        $entry = $query->getRow(0, Entry::class);
        $query->freeResult();

        $this->db->transComplete();
        
        return $entry;
    }

    public function insertEntry($entry)
    {
        $err = lang('App.msg_insert_fail', [lang('App.entry_label_id'), $entry->id]);
        if (!isset($entry)) return $err;
        try {
            // FIXME: combine to 1 sql?
            if ($this->where('id', $entry->id)->first() != null) return $err;
            if ($this->where('section_id', $entry->section_id)
                    ->where('parent_id', $entry->parent_id)->where('sequence', $entry->sequence)->first() != null) {
                return lang('App.msg_insert_fail', [lang('App.entry_label_sequence'), $entry->sequence]);
            }

            $this->insert($entry);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function modifyEntry($entry)
    {
        $err = lang('App.msg_update_fail', [lang('App.entry_label_id'), $entry->id]);
        if (!isset($entry)) return $err;
        try {
            if ($this->where('id', $entry->id)->first() == null) return $err;
            if ($this->where('id !=', $entry->id)
                    ->where('section_id', $entry->section_id)
                    ->where('parent_id', $entry->parent_id)->where('sequence', $entry->sequence)->first() != null) {
                return lang('App.msg_update_sequence_fail', [lang('App.entry_label_sequence'), $entry->sequence]);
            }
            
            $this->update($entry->id, $entry);
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function moveEntry($id, $isSequenceUp) 
    {
        if (!isset($id)) return lang('App.msg_move_fail', [lang('App.entry_label_id'), $id]);
        try {
            $moving = $this->getEntryOnly($id);
            // root_id (or parent_id) is null, do nothing
            if ($moving->parent_id == null) {
                return lang('App.msg_move_fail', [lang('App.entry_label_id'), $id]);;
            }
            // cannot set sequence less than 1 or greater than 10^10 (by moving, set sequence UNIQUE so it won't happen?)
            $err = lang('App.msg_move_fail', [lang('App.entry_label_sequence'), $moving->sequence]);
            if ($moving->sequence <= 1 && !$isSequenceUp) return $err;
            if ($moving->sequence > 10000000000 && $isSequenceUp) return $err;
            
            $affected = $this->where('parent_id', $moving->parent_id)
                                ->where('sequence ' . ($isSequenceUp ? '>' : '<'), $moving->sequence)
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

    public function deleteEntry($id) 
    {
        $err = lang('App.msg_delete_fail', [lang('App.entry_label_id'), $id]);
        if (!isset($id)) return $err;
        try {
            $this->db->table('entry')->where('id', $id)->delete();
            if ($this->db->affectedRows() <= 0) {
                return $err;
            }
        } catch (\Exception $e) {
            log_message('error', $e->getMessage());
            return $e->getMessage();
        }
        return null;
    }

    public function getEntryCount($parentId): int
    {
        return $this->db->table('entry')->where('parent_id', $parentId)->countAllResults();
    }

    public function getSections()
    {
        return $this->db->table('section')->where('status', 1)->orderBy('sequence', 'ASC')->get()->getResult();
    }

    public function getRootEntries()
    {
        return $this->where('root_id', null)->findAll();
    }

    /**
     * query entry + previous/next entries id (same parent, no extra info)
     *  regardless of <status> or <translation's availability>
     */
    public function getSiblingsOnly($id = null) 
    {
        if (!isset($id)) return null;

        $this->db->transStart();

        $sql = 'SELECT *,
                    (SELECT id FROM entry e2 WHERE e2.parent_id = e1.parent_id AND e2.sequence = e1.sequence - 1) AS previous_id,
                    (SELECT id FROM entry e2 WHERE e2.parent_id = e1.parent_id AND e2.sequence = e1.sequence + 1) AS next_id   
                FROM entry e1
                WHERE e1.id = :id:';

        $query = $this->db->query($sql, [
                                    'id'        => $id, 
                                ]);
        $entry = $query->getRow(0, Entry::class);
        $query->freeResult();

        $this->db->transComplete();
        
        return $entry;
    }


    /******************* Private methods *************************/

    /**
     * query entry + previous/next entries id (in different parents also)
     * ?? theoretically, inactive parent but active grandparent ??
     */
    private function getEntryAndSiblings($id = null) 
    {
        if (!isset($id)) return null;

        $this->db->transStart();

        /** Old SQL, last child's <next> is disabled */
        // $sql = 'SELECT *,
        //             (SELECT image_url FROM image_url WHERE image_id_header = image_url.id) 
        //                 AS image_url_header,
	    //             (SELECT image_url FROM image_url WHERE image_id_content = image_url.id) 
        //                 AS image_url_content,
        //             (SELECT image_url FROM image_url WHERE image_id_commentary = image_url.id) 
        //                 AS image_url_commentary,
        //             (SELECT image_url FROM image_url WHERE image_id_footer = image_url.id) 
        //                 AS image_url_footer,
        //             (SELECT id FROM entry e2 WHERE e2.parent_id = e1.parent_id AND status = :status: AND e2.sequence = e1.sequence - 1
        //                 AND EXISTS (SELECT t.id FROM translation t WHERE t.entry_id = e2.id AND t.status = :status: AND e2.status = :status:)) 
        //                 AS previous_id,
        //             (SELECT id FROM entry e2 WHERE e2.parent_id = e1.parent_id AND status = :status: AND e2.sequence = e1.sequence + 1
        //                 AND EXISTS (SELECT t.id FROM translation t WHERE t.entry_id = e2.id AND t.status = :status: AND e2.status = :status:)) 
        //                 AS next_id    
        //         FROM entry e1
        //         WHERE e1.id = :id: AND e1.status = :status:';

        /** New SQL, if last child clicked <next> then forward to next parent */
        $sql = 
        'SELECT *,
            (SELECT image_url FROM image_url WHERE image_id_header = image_url.id) AS image_url_header,
            (SELECT image_url FROM image_url WHERE image_id_content = image_url.id) AS image_url_content,
            (SELECT image_url FROM image_url WHERE image_id_commentary = image_url.id) AS image_url_commentary,
            (SELECT image_url FROM image_url WHERE image_id_footer = image_url.id) AS image_url_footer,
            (SELECT SUBSTRING_INDEX(GROUP_CONCAT(previous_id ORDER BY lvl), ",", 1)
                FROM (
                    SELECT el.lvl AS lvl,
                        (SELECT es.id FROM entry es
                        WHERE es.parent_id = e.parent_id AND es.sequence = e.sequence - 1 AND es.status = :status:
                        AND EXISTS (SELECT * FROM translation t WHERE t.entry_id = es.id AND t.status = :status:)) AS previous_id
                    FROM (
                        SELECT @r1 AS _id, (SELECT @r1 := parent_id FROM entry WHERE id = _id) AS parent_id, @l1 := @l1 + 1 AS lvl
                        FROM (SELECT @r1 := :id: COLLATE utf8mb4_unicode_ci, @l1 := 0) AS vars JOIN entry en ON en.status = :status:
                        WHERE @r1 IS NOT NULL
                    ) el JOIN entry e ON el._id = e.id
                ) temp
                WHERE temp.previous_id IS NOT NULL
            ) AS previous_id, 	
            (SELECT SUBSTRING_INDEX(GROUP_CONCAT(next_id ORDER BY lvl), ",", 1)
                FROM (
                    SELECT el.lvl AS lvl,
                        (SELECT es.id FROM entry es
                        WHERE es.parent_id = e.parent_id AND es.sequence = e.sequence + 1 AND es.status = :status:
                        AND EXISTS (SELECT * FROM translation t WHERE t.entry_id = es.id AND t.status = :status:)) AS next_id
                    FROM (
                        SELECT @r2 AS _id, (SELECT @r2 := parent_id FROM entry WHERE id = _id) AS parent_id, @l2 := @l2 + 1 AS lvl
                        FROM (SELECT @r2 := :id: COLLATE utf8mb4_unicode_ci, @l2 := 0) AS vars JOIN entry en ON en.status = :status:
                        WHERE @r2 IS NOT NULL
                    ) el JOIN entry e ON el._id = e.id        
                ) temp
                WHERE temp.next_id IS NOT NULL
            ) AS next_id
        FROM entry e1
        WHERE e1.id = :id: AND e1.status = :status:';
        $query = $this->db->query($sql, [
                                    'id'        => $id, 
                                    'status'    => Utilities::STATUS_ACTIVE,
                                ]);
        $entry = $query->getRow(0, Entry::class);
        $query->freeResult();

        $this->db->transComplete();
        
        return $entry;
    }

    /**
     * Get other common information specified in root entry
     */
    private function setEntryExtraInfo(Entry $entry = null) 
    {
        if (!isset($entry)) return $entry;
        
        // get background image info in root if not specified
        if (!isset($entry->root_id)) return $entry;

        $rootEntry = null;
        if (!isset($entry->image_id_header)
            || !isset($entry->image_id_content)
            || !isset($entry->image_id_commentary)
            || !isset($entry->image_id_footer)) {
            $rootEntry = $this->getEntryAndSiblings($entry->root_id);
        }
        
        if (!isset($rootEntry)) return $entry;

        if (!isset($entry->image_id_header)) {
            $entry->image_id_header = $rootEntry->image_id_header;
            $entry->image_url_header = $rootEntry->image_url_header;
        }
        if (!isset($entry->image_id_content)) {
            $entry->image_id_content = $rootEntry->image_id_content;
            $entry->image_url_content = $rootEntry->image_url_content;
        }
        if (!isset($entry->image_id_commentary)) {
            $entry->image_id_commentary = $rootEntry->image_id_commentary;
            $entry->image_url_commentary = $rootEntry->image_url_commentary;
        }
        if (!isset($entry->image_id_footer)) {
            $entry->image_id_footer = $rootEntry->image_id_footer;
            $entry->image_url_footer = $rootEntry->image_url_footer;
        }
        
        return $entry;
    }

    private function encodeData($results, $slash = true) {
        // if (isset($results)) {
        //   foreach ($results as $re) {        
        //     $re->status_name = $re->status == '0' ? lang('App.entry_label_status_inactive') : lang('App.entry_label_status_active');
        //   }
        // }
        return $results;
      }
}