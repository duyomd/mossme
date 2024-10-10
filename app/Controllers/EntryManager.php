<?php

namespace App\Controllers;

use App\Models\EntryModel;
use App\Models\ImageUrlModel;
use App\Models\Sort;
use App\Entities\Entry;
use App\Helpers\Utilities;

class EntryManager extends BaseController
{

    public function show($conditions = -1)
    {
        if (!auth()->loggedIn() || !auth()->user()->inGroup('dataoperator', 'superadmin')) {
            return redirect()->to(config('Auth')->logoutRedirect());
        } 
        $parentId = $this->parseParentId($conditions);

        $data = $this->loadList(null, '-1', '-1', $conditions);
        $data['responseJsonList']   = $this->responseJsonList($data);

        $parentEntry = model(EntryModel::class)->getEntryOnly($parentId);
        if ($parentId != null && $parentEntry == null) {
            return $this->notFound();
        }

        // TODO: necessarily reload after edit entry?
        $data['roots']              = model(EntryModel::class)->getRootEntries(); 
        $data['sections']           = model(EntryModel::class)->getSections();
        $data['parentId']           = $parentId;
        $data['grandParentId']      = $parentEntry == null ? null : $parentEntry->parent_id;
        $data['rootId']             = $parentEntry == null ? null : 
                                        ($parentEntry->root_id != null ? $parentEntry->root_id : 
                                            ($parentId == null ? null : $parentId));
        $data['images']             = model(ImageUrlModel::class)->getImageUrls();

        helper('form');
        
        return view('admin/entryManager', $data);
    }

    public function ajaxFind($id = null) 
    {
        if (!isset($id)) return null;
        $entry = model(EntryModel::class)->getEntryOnly($id);
        if ($entry == null) return null;
        return json_encode($entry);
    }

    public function ajaxSubmit() {
        if (!$this->request->is('post') || !$this->request->isAjax())  return;

        if (!auth()->loggedIn() || !auth()->user()->inGroup('dataoperator', 'superadmin')) {
            return redirect()->to(config('Auth')->logoutRedirect());
        }

        helper('form');

        $mode = $this->request->getVar('mode');
        $selectedKey = $this->request->getVar('selected_key');
        $msg = '';
        $newSelectedIndex = null;
        $result;

        if ($mode == 'delete') {
            $result = $this->deleteEntry($selectedKey);
            if ($result == null) {
                $msg = lang('App.msg_deleted');
            } else {
                return json_encode($this->showResult(false, $result));
            }

        } else if ($mode == 'insert' || $mode == 'modify') {
            if (! $this->validate([
                'id'                    => ['label' => lang('App.entry_label_id'),                  'rules' => 'required|max_length[64]|regex_match[^(?!.*\/)[a-zA-Z0-9.:-]+$]'],
                'parent_id'             => ['label' => lang('App.entry_label_parent'),              'rules' => 'max_length[64]'],
                'root_id'               => ['label' => lang('App.entry_label_root'),                'rules' => 'max_length[64]'],
                'serials'               => ['label' => lang('App.entry_label_serials'),             'rules' => 'required|max_length[512]|regex_match[^(?!.*\/)[a-zA-Z0-9 .:-]+$]'],
                'enumeration'           => ['label' => lang('App.entry_label_enumeration'),         'rules' => 'max_length[16]'],
                'image_id_header'       => ['label' => lang('App.entry_label_image_header'),        'rules' => 'max_length[10]'],
                'image_id_content'      => ['label' => lang('App.entry_label_image_content'),       'rules' => 'max_length[10]'],
                'image_id_commentary'   => ['label' => lang('App.entry_label_image_commentary'),    'rules' => 'max_length[10]'],
                'image_id_footer'       => ['label' => lang('App.entry_label_image_footer'),        'rules' => 'max_length[10]'],
                'sequence'              => ['label' => lang('App.label_sequence'),                  'rules' => 'required|integer|greater_than[0]|max_length[10]'],
                'tags'                  => ['label' => lang('App.entry_label_tags'),                'rules' => 'max_length[255]'],
                'video_url'             => ['label' => lang('App.entry_label_video_url'),           'rules' => 'max_length[255]'],
                'reference_source'      => ['label' => lang('App.entry_label_reference_source'),    'rules' => 'max_length[64]'],
                'reference_url'         => ['label' => lang('App.entry_label_reference_url'),       'rules' => 'max_length[255]'],
            ])) {
                $errorsHtml = Utilities::createHtmlValidatedMsg($this->validator->getErrors());
                return json_encode($this->showResult(false, $errorsHtml));
            }

            // log_message('error', 'DUY1:' . $this->parentId);
            $entry = new Entry([
                    'type'                  => $this->request->getVar('type'),
                    'section_id'            => $this->request->getVar('section_id'),
                    'root_id'               => Utilities::trimInput($this->request->getVar('root_id')),
                    'id'                    => Utilities::trimInput($this->request->getVar('id')),
                    'parent_id'             => Utilities::trimInput($this->request->getVar('parent_id')),
                    'serials'               => Utilities::trimInput($this->request->getVar('serials')),
                    'enumeration'           => Utilities::trimInput($this->request->getVar('enumeration')),

                    'image_id_header'       => Utilities::trimInput($this->request->getVar('image_id_header')),
                    'image_id_content'      => Utilities::trimInput($this->request->getVar('image_id_content')),
                    'image_id_commentary'   => Utilities::trimInput($this->request->getVar('image_id_commentary')),
                    'image_id_footer'       => Utilities::trimInput($this->request->getVar('image_id_footer')),
                    'status'                => $this->request->getVar('status'),
                    'sequence'              => Utilities::trimInput($this->request->getVar('sequence')),

                    'tags'                  => Utilities::trimInput($this->request->getVar('tags')),
                    'video_url'             => Utilities::trimInput($this->request->getVar('video_url')),
                    'reference_source'      => Utilities::trimInput($this->request->getVar('reference_source')),
                    'reference_url'         => Utilities::trimInput($this->request->getVar('reference_url')),
                    'children_groupable'    => $this->request->getVar('children_groupable'),
            ]);

            // root_id & parent_id relation check
            if (($entry->parent_id == null && $entry->root_id != null)
                    || ($entry->parent_id != null && $entry->root_id == null)) {
                return json_encode($this->showResult(false, lang('App.entry_msg_parent_root_relation')));
            }
            // check if parent_id exists
            if ($entry->parent_id != null && $this->findParentWithRoot($entry->parent_id, $entry->root_id) == null) {
                return json_encode($this->showResult(false, lang('App.entry_msg_parent_root_relation')));
            }

            if ($mode == 'insert') {
                $entry->created_by = auth()->user()->username;
                $result = $this->insertEntry($entry);
                if ($result == null) {
                    $msg = lang('App.msg_inserted');
                } else {
                    return json_encode($this->showResult(false, $result));
                }               
            } else {
                $result = $this->modifyEntry($entry);
                if ($result == null) {
                    // $newSelectedIndex = $this->request->getVar('selected_index');    // position might be changed
                    $msg = lang('App.msg_updated'); 
                } else {
                    return json_encode($this->showResult(false, $result));
                }                   
            }
            
        } else if (str_starts_with($mode, 'move')) {
            $orders = $this->request->getVar('sortOrders');
            $isSequenceUp = false;
            if ($mode == 'move-up') {
                $isSequenceUp = str_starts_with($orders, 'DESC');
            } else if ($mode == 'move-down') {
                $isSequenceUp = str_starts_with($orders, 'ASC');
            }
            $result = $this->moveEntry($selectedKey, $isSequenceUp);
            if ($result == null) {
                $newSelectedIndex = $this->request->getVar('selected_index');  
                $msg = lang('App.msg_move_success'); 
            } else {
                return json_encode($this->showResult(false, $result));
            }
            
        } else {
            return;
        }
        
        return json_encode($this->showResult(true, $msg, $newSelectedIndex));
    }

    public function changePage($pageNo = null, $orderBys = '-1', $sortOrders = '-1', $conditions = '-1') 
    {
        $data = $this->loadList($pageNo, $orderBys, $sortOrders, $conditions);
        return $this->responseJsonList($data);
    }

    private function responseJsonList($data, $newSelectedIndex = null) {
        $jsonEntries = array();
        foreach ($data['entries'] as $entry) {
            $jsonEntry = new \stdClass;
            $jsonEntry->id = $entry->id;
            $jsonEntry->parent_id = $entry->parent_id;
            $jsonEntry->root_id = $entry->root_id;
            $jsonEntry->section_id = $entry->section_id;
            $jsonEntry->section_name = $entry->section_name;
            $jsonEntry->type = $entry->type;
            $jsonEntry->serials = $entry->serials;
            $jsonEntry->enumeration = $entry->enumeration;

            $jsonEntry->image_id_header = $entry->image_id_header;
            $jsonEntry->image_id_content = $entry->image_id_content;
            $jsonEntry->image_id_commentary = $entry->image_id_commentary;
            $jsonEntry->image_id_footer = $entry->image_id_footer;
            $jsonEntry->image_url_header = $entry->image_url_header;
            $jsonEntry->image_url_content = $entry->image_url_content;
            $jsonEntry->image_url_commentary = $entry->image_url_commentary;
            $jsonEntry->image_url_footer = $entry->image_url_footer;
            $jsonEntry->image_name_header = $entry->image_name_header;
            $jsonEntry->image_name_content = $entry->image_name_content;
            $jsonEntry->image_name_commentary = $entry->image_name_commentary;
            $jsonEntry->image_name_footer = $entry->image_name_footer;

            $jsonEntry->reference_source = $entry->reference_source;
            $jsonEntry->reference_url = $entry->reference_url;
            $jsonEntry->video_url = $entry->video_url;
            $jsonEntry->tags = $entry->tags;
            $jsonEntry->children_groupable = $entry->children_groupable;
            $jsonEntry->children_groupable_name = $entry->children_groupable_name;
            $jsonEntry->status = $entry->status;
            $jsonEntry->status_name = $entry->status_name;
            $jsonEntry->created_by = $entry->created_by;
            $jsonEntry->sequence = $entry->sequence;
            array_push($jsonEntries, $jsonEntry);
        }
        $jsonSort = (object)array('rpp'         => $data['sort']->getRpp(), 
                                  'currentPage' => $data['sort']->getCurrentPage(),
                                  'pageTotal'   => $data['sort']->getPageTotal(),
                                  'orderBys'    => $data['sort']->getOrderBys(),
                                  'sortOrders'  => $data['sort']->getSortOrders(),);
        $json = (object)array('items'               => $jsonEntries, 
                              'sort'                => $jsonSort,
                              'conditions'          => $data['conditions'],
                              'newSelectedIndex'    => $newSelectedIndex,);                          

        return json_encode($json);
    }

    private function deleteEntry($id)
    {
        return model(EntryModel::class)->deleteEntry($id);
    }

    private function findParentWithRoot($parentId, $rootId) {
        return model(EntryModel::class)->findParentWithRoot($parentId, $rootId);
    }

    private function insertEntry($entry)
    {
        return model(EntryModel::class)->insertEntry($entry);
    }

    private function modifyEntry($entry)
    {
        return model(EntryModel::class)->modifyEntry($entry);
    }

    private function moveEntry($id, $isSequenceUp)
    {
        return model(EntryModel::class)->moveEntry($id, $isSequenceUp);
    }

    private function showResult($succeed, $html, $newSelectedIndex = null)
    {
        $json = new \stdClass;
        $json->hash = csrf_hash();
        $json->succeed = $succeed;
        $json->info = $html;
        if ($succeed == true) {
            // pagination & order
            $pageNo = $this->request->getVar('currentPage');
            $orderBys = $this->request->getVar('orderBys');
            $sortOrders = $this->request->getVar('sortOrders');

            // search conditions
            $parentId = $this->request->getVar('parentId');            
            $conditions = json_encode((object)array('parentId' => $parentId,));

            $data = $this->loadList($pageNo, $orderBys, $sortOrders, $conditions);
            $json->responseJsonList = $this->responseJsonList($data, $newSelectedIndex);
        }
        return $json;
    }

    private function prepareSort($currentPage, $orderBys = '-1', $sortOrders = '-1', $conditions = '-1', $count = 0) 
    {
        $parentId = $this->parseParentId($conditions);
        $obs = isset($parentId) ? EntryModel::HEADER_SEQUENCE_ORDERBYS : EntryModel::DEFAULT_ORDERBYS;
        $sos = isset($parentId) ? EntryModel::HEADER_SEQUENCE_SORTORDERS : EntryModel::DEFAULT_SORTORDERS;
        if ($orderBys != '-1') $obs = explode(',', $orderBys);
        if ($sortOrders != '-1') $sos = explode(',', $sortOrders);
        if (!isset($currentPage)) $currentPage = 1;
        $rpp = Utilities::getSessionRpp();
        return Sort::create($obs, $sos, $currentPage, $rpp, $count);
    }

    private function loadList($currentPage = null, $orderBys = '-1', $sortOrders = '-1', $conditions = '-1')
    {
        $parentId = Utilities::trimInput($this->parseParentId($conditions));
        $model = model(EntryModel::class);
        $count = $model->getEntryCount($parentId);        
        $sort = $this->prepareSort($currentPage, $orderBys, $sortOrders, $conditions, $count);
        $entries = $model->getEntries($parentId, $sort);

        $data = [
            'displayHeader' => lang('App.entry_management'),
            'entries'       => $entries,
            'sort'          => $sort,
            'conditions'    => $conditions,
        ];
        return $data;
    }

    private function parseParentId($conditions = '-1') {
        $parentId = null;
        if ($conditions != '-1') {
            $cds = json_decode($conditions);
            $parentId = $cds->parentId;
        }
        return $parentId;
    }

}