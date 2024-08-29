<?php

namespace App\Controllers;

use App\Models\ImageUrlModel;
use App\Models\CardModel;
use App\Models\Sort;
use App\Entities\Card;
use App\Helpers\Utilities;

class CardManager extends BaseController
{

    public function show()
    {
        if (!auth()->loggedIn() || !auth()->user()->inGroup('dataoperator', 'superadmin')) {
            return redirect()->to(config('Auth')->logoutRedirect());
        } 

        $data = $this->loadList();
        $data['responseJsonList'] = $this->responseJsonList($data);
        $data['images'] = model(ImageUrlModel::class)->getImageUrls();

        helper('form');        
        return view('admin/cardManager', $data);
    }

    public function ajaxFind($id = null) 
    {
        if (!isset($id)) return null;
        $card = model(CardModel::class)->getCard($id);
        if ($card == null) return null;
        return json_encode($card);
    }

    public function ajaxSubmit() {
        if (!$this->request->is('post') || !$this->request->isAjax())  return;

        if (!auth()->loggedIn() || !auth()->user()->inGroup('dataoperator', 'superadmin')) {
            return redirect()->to(config('Auth')->logoutRedirect());
        }

        helper('form');

        $mode = $this->request->getVar('mode');
        $msg = '';
        $newSelectedIndex = null;
        $result;

        if ($mode == 'delete') {
            $result = $this->deleteCard($this->request->getVar('selected_key'));
            if ($result == null) {
                $msg = lang('App.msg_deleted');
            } else {
                return json_encode($this->showResult(false, $result));
            }

        } else if ($mode == 'insert' || $mode == 'modify') {
            if (! $this->validate([
                'image_id'  => ['label' => lang('App.card_label_image_name'),   'rules' => 'required'],
                'memo'      => ['label' => lang('App.card_label_memo'),         'rules' => 'required|max_length[64]'],
                'sequence'  => ['label' => lang('App.card_label_sequence'),     'rules' => 'required|integer|greater_than[0]|max_length[4]'],
            ])) {
                $errorsHtml = Utilities::createHtmlValidatedMsg($this->validator->getErrors());
                return json_encode($this->showResult(false, $errorsHtml));
            }

            $card = new Card([
                    'image_id'  => $this->request->getVar('image_id'),
                    'memo'  => $this->request->getVar('memo'),
                    'status'    => $this->request->getVar('status'),
                    'sequence'  => $this->request->getVar('sequence'),
            ]);

            if ($mode == 'insert') {
                $result = $this->insertCard($card);
                if ($result == null) {
                    $msg = lang('App.msg_inserted');
                } else {
                    return json_encode($this->showResult(false, $result));
                }               
            } else {
                $card->id = $this->request->getVar('selected_key');
                $result = $this->modifyCard($card);
                if ($result == null) {
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
            $result = $this->moveCard($this->request->getVar('selected_key'), $isSequenceUp);
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

    public function changePage($pageNo = null, $orderBys = '-1', $sortOrders = '-1') 
    {
        $data = $this->loadList($pageNo, $orderBys, $sortOrders);
        return $this->responseJsonList($data);
    }

    private function responseJsonList($data, $newSelectedIndex = null) {
        $jsonCards = array();
        foreach ($data['cards'] as $card) {
            $jsonCard = new \stdClass;
            $jsonCard->id = $card->id;
            $jsonCard->memo = $card->memo;
            $jsonCard->image_id = $card->image_id;
            $jsonCard->image_name = $card->image_name;
            $jsonCard->image_url = $card->image_url;
            $jsonCard->status = $card->status;
            $jsonCard->status_name = $card->status_name;
            $jsonCard->sequence = $card->sequence;
            array_push($jsonCards, $jsonCard);
        }
        $jsonSort = (object)array('rpp'         => $data['sort']->getRpp(), 
                                  'currentPage' => $data['sort']->getCurrentPage(),
                                  'pageTotal'   => $data['sort']->getPageTotal(),
                                  'orderBys'    => $data['sort']->getOrderBys(),
                                  'sortOrders'  => $data['sort']->getSortOrders(),);
        $json = (object)array('items'               => $jsonCards, 
                              'sort'                => $jsonSort,
                              'newSelectedIndex'    => $newSelectedIndex);                          

        return json_encode($json);
    }

    private function deleteCard($id)
    {
        return model(CardModel::class)->deleteCard($id);
    }

    private function insertCard($card)
    {
        return model(CardModel::class)->insertCard($card);
    }

    private function modifyCard($card)
    {
        return model(CardModel::class)->modifyCard($card);
    }

    private function moveCard($id, $isSequenceUp)
    {
        return model(CardModel::class)->moveCard($id, $isSequenceUp);
    }

    private function showResult($succeed, $html, $newSelectedIndex = null)
    {
        $json = new \stdClass;
        $json->hash = csrf_hash();
        $json->succeed = $succeed;
        $json->info = $html;
        if ($succeed == true) {
            $pageNo = $this->request->getVar('currentPage');
            $data = $this->loadList($pageNo, 
                $this->request->getVar('orderBys'), $this->request->getVar('sortOrders'));
            $json->responseJsonList = $this->responseJsonList($data, $newSelectedIndex);
        }
        return $json;
    }

    private function prepareSort($currentPage, $orderBys = '-1', $sortOrders = '-1', $count = 0) 
    {
        $obs = CardModel::DEFAULT_ORDERBYS;
        $sos = CardModel::DEFAULT_SORTORDERS;
        if ($orderBys != '-1') $obs = explode(',', $orderBys);
        if ($sortOrders != '-1') $sos = explode(',', $sortOrders);
        if (!isset($currentPage)) $currentPage = 1;
        $rpp = Utilities::getSessionRpp();
        return Sort::create($obs, $sos, $currentPage, $rpp, $count);
    }

    private function loadList($currentPage = null, $orderBys = '-1', $sortOrders = '-1')
    {
        $model = model(CardModel::class);
        $count = $model->getCardCount();
        $sort = $this->prepareSort($currentPage, $orderBys, $sortOrders, $count);
        $cards = $model->getCards($sort);

        $data = [
            'displayHeader' => lang('App.card_management'),
            'cards'         => $cards,
            'sort'          => $sort,
        ];
        return $data;
    }

}