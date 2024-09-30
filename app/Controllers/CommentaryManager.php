<?php

namespace App\Controllers;

use App\Models\EntryModel;
use App\Models\CommentaryModel;
use App\Models\LanguageModel;
use App\Models\Sort;
use App\Entities\Commentary;
use App\Helpers\Utilities;

class CommentaryManager extends BaseController
{

    public function show($conditions = -1)
    {
        if (!auth()->loggedIn() || !auth()->user()->inGroup('dataoperator', 'superadmin')) {
            return redirect()->to(config('Auth')->logoutRedirect());
        } 
        $entryId = $this->parseEntryId($conditions);

        $data = $this->loadList(null, '-1', '-1', $conditions);
        $data['responseJsonList']   = $this->responseJsonList($data);
        $data['entryId']            = $entryId;
        $data['parentEntryId']      = isset($entryId) ? 
                                        model(EntryModel::class)->getEntryOnly($entryId)->parent_id : null;
        $data['languages']          = model(LanguageModel::class)->getLanguages(); 

        helper('form');
        
        return view('admin/commentaryManager', $data);
    }

    public function ajaxFind($id = null) 
    {
        if (!isset($id)) return null;
        $commentary = model(CommentaryModel::class)->findCommentary($id);
        if ($commentary == null) return null;
        return json_encode($commentary);
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
            $result = $this->deleteCommentary($selectedKey);
            if ($result == null) {
                $msg = lang('App.msg_deleted');
            } else {
                return json_encode($this->showResult(false, $result));
            }

        } else if ($mode == 'insert' || $mode == 'modify') {
            if (! $this->validate([
                'entry_id'      => ['label' => lang('App.translation_label_entry_id'),      'rules' => 'required|max_length[64]'],
                'author'        => ['label' => lang('App.commentary_label_author'),         'rules' => 'required|max_length[128]'],
                'author_note'   => ['label' => lang('App.commentary_label_author_note'),    'rules' => 'max_length[255]'],
                'notation'      => ['label' => lang('App.commentary_label_notation'),       'rules' => 'max_length[1024]'],
                'content'       => ['label' => lang('App.commentary_label_content'),        'rules' => 'required'],
            ])) {
                $errorsHtml = Utilities::createHtmlValidatedMsg($this->validator->getErrors());
                return json_encode($this->showResult(false, $errorsHtml));
            }

            $commentary = new Commentary([
                    'entry_id'          => Utilities::trimInput($this->request->getVar('entry_id')),
                    'author'            => Utilities::trimInput($this->request->getVar('author')),
                    'language_code'     => $this->request->getVar('language_code'),
                    'status'            => $this->request->getVar('status'),
                    'author_note'       => $this->request->getVar('author_note'),
                    'notation'          => $this->request->getVar('notation'),
                    'content'           => $this->request->getVar('content'),
            ]);

            $commentary = $this->convertTcvn($commentary);

            if ($mode == 'insert') {
                $result = $this->insertCommentary($commentary);
                if ($result == null) {
                    $msg = lang('App.msg_inserted');
                } else {
                    return json_encode($this->showResult(false, $result));
                }               
            } else {
                $commentary->id = $selectedKey;
                $result = $this->modifyCommentary($commentary);
                if ($result == null) {
                    $msg = lang('App.msg_updated'); 
                } else {
                    return json_encode($this->showResult(false, $result));
                }                   
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
        $jsonComms = array();
        if (isset($data['commentaries'])) {
            foreach ($data['commentaries'] as $comm) {
                $jsonComm = new \stdClass;
                $jsonComm->id = $comm->id;
                $jsonComm->entry_id = $comm->entry_id;
                $jsonComm->author = $comm->author;
                $jsonComm->language_code = $comm->language_code;
                $jsonComm->language = $comm->language;
                $jsonComm->status = $comm->status;
                $jsonComm->status_name = $comm->status_name;

                $jsonComm->author_note = $comm->author_note;
                $jsonComm->notation = $comm->notation;
                $jsonComm->content = $comm->content;

                array_push($jsonComms, $jsonComm);
            }
        }
        $jsonSort = (object)array('rpp'         => $data['sort']->getRpp(), 
                                  'currentPage' => $data['sort']->getCurrentPage(),
                                  'pageTotal'   => $data['sort']->getPageTotal(),
                                  'orderBys'    => $data['sort']->getOrderBys(),
                                  'sortOrders'  => $data['sort']->getSortOrders(),);
        $json = (object)array('items'               => $jsonComms, 
                              'sort'                => $jsonSort,
                              'conditions'          => $data['conditions'],
                              'newSelectedIndex'    => $newSelectedIndex,);                          

        return json_encode($json);
    }

    private function deleteCommentary($id)
    {
        return model(CommentaryModel::class)->deleteCommentary($id);
    }

    private function insertCommentary($commentary)
    {
        return model(CommentaryModel::class)->insertCommentary($commentary);
    }

    private function modifyCommentary($commentary)
    {
        return model(CommentaryModel::class)->modifyCommentary($commentary);
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
            $entryId = $this->request->getVar('entryId');            
            $conditions = json_encode((object)array('entryId' => $entryId,));

            $data = $this->loadList($pageNo, $orderBys, $sortOrders, $conditions);
            $json->responseJsonList = $this->responseJsonList($data, $newSelectedIndex);
        }
        return $json;
    }

    private function prepareSort($currentPage, $orderBys = '-1', $sortOrders = '-1', $count = 0) 
    {
        $obs = CommentaryModel::DEFAULT_ORDERBYS;
        $sos = CommentaryModel::DEFAULT_SORTORDERS;
        if ($orderBys != '-1') $obs = explode(',', $orderBys);
        if ($sortOrders != '-1') $sos = explode(',', $sortOrders);
        if (!isset($currentPage)) $currentPage = 1;
        $rpp = Utilities::getSessionRpp();
        return Sort::create($obs, $sos, $currentPage, $rpp, $count);
    }

    private function loadList($currentPage = null, $orderBys = '-1', $sortOrders = '-1', $conditions = '-1')
    {
        $entryId = Utilities::trimInput($this->parseEntryId($conditions));
        $model = model(CommentaryModel::class);
        $count = $model->getCommentaryCount($entryId);
        $sort = $this->prepareSort($currentPage, $orderBys, $sortOrders, $count);
        $commentaries = $model->getCommentariesByEntryId($entryId, $sort);

        $data = [
            'displayHeader' => lang('App.commentary_management'),
            'commentaries'  => $commentaries,
            'sort'          => $sort,
            'conditions'    => $conditions,
        ];
        return $data;
    }

    private function parseEntryId($conditions = '-1') {
        $entryId = null;
        if ($conditions != '-1') {
            $cds = json_decode($conditions);
            $entryId = $cds->entryId;
        }
        return $entryId;
    }

    private function convertTcvn($comm = null) {
        if ($comm != null) {
            $comm->content = Utilities::convertTcvn($comm->content);
            $comm->notation = Utilities::convertTcvn($comm->notation);
            $comm->author = Utilities::convertTcvn($comm->author);
            $comm->author_note = Utilities::convertTcvn($comm->author_note);
        }
        return $comm;
    }

}