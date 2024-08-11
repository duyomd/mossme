<?php

namespace App\Controllers;

use App\Models\MessageModel;
use App\Models\Sort;
use App\Entities\Message;
use App\Helpers\Utilities;

class MessageManager extends BaseController
{
    private const SHORTENED_CONTENT_LENGTH = 20;    

    public function show()
    {
        if (!auth()->loggedIn() || !auth()->user()->inGroup('admin', 'superadmin')) {
            return redirect()->to(config('Auth')->logoutRedirect());
        } 

        $data = $this->loadList();
        $data['responseJsonList'] = $this->responseJsonList($data);
        helper('form');
        
        return view('admin/messageManager', $data);
    }

    public function ajaxFind($id = null) 
    {
        if (!isset($id)) return null;
        $message = model(MessageModel::class)->getMessage($id, user_id());
        if ($message == null) return null;
        return json_encode($message);
    }

    public function ajaxSubmit() {
        if (!$this->request->is('post') || !$this->request->isAjax())  return;

        if (!auth()->loggedIn() || !auth()->user()->inGroup('admin', 'superadmin')) {
            return redirect()->to(config('Auth')->logoutRedirect());
        }

        helper('form');

        $mode = $this->request->getVar('mode');
        $id   = $this->request->getVar('selected_key');
        $msg = '';
        $result;
        $model = model(MessageModel::class);

        if ($mode == 'delete') {
            $result = $model->deleteMessage($id);
            if ($result == null) {
                $msg = lang('App.msg_deleted');
            } else {
                return json_encode($this->showResult(false, $result));
            }

        } else if ($mode == 'modify') {
            if (! $this->validate([
                'status' => ['label' => lang('App.message_label_status'), 'rules' => 'required|max_length[1]'],
            ])) {
                $errorsHtml = Utilities::createHtmlValidatedMsg($this->validator->getErrors());
                return json_encode($this->showResult(false, $errorsHtml));
            }

            $message = new Message([
                    'id'        => $id,
                    'status'    => $this->request->getVar('status'),
            ]);

            $result = $model->modifyMessage($message);
            if ($result == null) {
                $read = $this->request->getVar('read_state');
                if ($read === '1') {
                    $this->markAsRead($message->id);
                } else {
                    $model->markAsUnread($message->id, user_id());
                }   
                $msg = lang('App.msg_updated'); 
            } else {
                return json_encode($this->showResult(false, $result));
            }                   

        } else {
            return;
        }
        
        return json_encode($this->showResult(true, $msg));
    }

    public function changePage($pageNo = null, $orderBys = '-1', $sortOrders = '-1') 
    {
        $data = $this->loadList($pageNo, $orderBys, $sortOrders);
        return $this->responseJsonList($data);
    }

    public function markAsRead($id = null, $pageNo = null, $orderBys = '-1', $sortOrders = '-1') {
        if (isset($id)) model(MessageModel::class)->markAsRead($id, user_id());
        return $this->changePage($pageNo, $orderBys, $sortOrders);
    }

    private function responseJsonList($data) {
        $jsonSort = (object)array('rpp'         => $data['sort']->getRpp(), 
                                  'currentPage' => $data['sort']->getCurrentPage(),
                                  'pageTotal'   => $data['sort']->getPageTotal(),
                                  'orderBys'    => $data['sort']->getOrderBys(),
                                  'sortOrders'  => $data['sort']->getSortOrders(),);
        $json = (object)array('items'   => $this->encodeData($data['messages']), 
                              'sort'    => $jsonSort);                          

        return json_encode($json);
    }

    private function showResult($succeed, $html)
    {
        $json = new \stdClass;
        $json->hash = csrf_hash();
        $json->succeed = $succeed;
        $json->info = $html;
        if ($succeed == true) {
            $pageNo = $this->request->getVar('currentPage');
            $data = $this->loadList($pageNo, 
                $this->request->getVar('orderBys'), $this->request->getVar('sortOrders'));
            $json->responseJsonList = $this->responseJsonList($data);
        }
        return $json;
    }

    private function prepareSort($currentPage, $orderBys = '-1', $sortOrders = '-1', $count = 0) 
    {
        $obs = MessageModel::DEFAULT_ORDERBYS;
        $sos = MessageModel::DEFAULT_SORTORDERS;
        if ($orderBys != '-1') $obs = explode(',', $orderBys);
        if ($sortOrders != '-1') $sos = explode(',', $sortOrders);
        if (!isset($currentPage)) $currentPage = 1;
        $rpp = Utilities::getSessionRpp();
        return Sort::create($obs, $sos, $currentPage, $rpp, $count);
    }

    private function loadList($currentPage = null, $orderBys = '-1', $sortOrders = '-1')
    {
        $model = model(MessageModel::class);
        $count = $model->getMessageCount();
        $sort = $this->prepareSort($currentPage, $orderBys, $sortOrders, $count);
        $messages = $model->getMessages(user_id(), $sort);

        $data = [
            'displayHeader' => lang('App.message_management'),
            'messages'      => $messages,
            'sort'          => $sort,
        ];
        return $data;
    }

    private function encodeData($messages, $slash = true) 
    {
      if (isset($messages)) {
        foreach ($messages as $message) {
          $message->subject = strlen($message->subject) <= 0 ? lang('App.message_subject_blank') : $message->subject;  
          $message->status_str = $message->status == 1 ? lang('App.message_status_active') : lang('App.message_status_spam');
          $message->content = Utilities::encodeDataHtml($message->content, false);
          $message->content_str = Utilities::shortenString($message->content, self::SHORTENED_CONTENT_LENGTH);
          $message->sent_at_str = substr($message->sent_at, 0, 16);
        }
      }
      return $messages;
    }

}