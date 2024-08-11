<?php

namespace App\Controllers;

use App\Models\CardModel;
use App\Models\CardTranslationModel;
use App\Models\LanguageModel;
use App\Models\Sort;
use App\Entities\CardTranslation;
use App\Helpers\Utilities;

class CardTranslationManager extends BaseController
{

    public function show($conditions = -1)
    {
        if (!auth()->loggedIn() || !auth()->user()->inGroup('dataoperator', 'superadmin')) {
            return redirect()->to(config('Auth')->logoutRedirect());
        } 
        $cardId = $this->parseCardId($conditions);

        $data = $this->loadList(null, '-1', '-1', $conditions);
        $data['responseJsonList']   = $this->responseJsonList($data);
        $data['cardId']             = $cardId;
        $data['languages']          = model(LanguageModel::class)->getLanguages(); 

        helper('form');        
        return view('admin/cardTranslationManager', $data);
    }

    public function ajaxFind($id = null) 
    {
        if (!isset($id)) return null;
        $tran = model(CardTranslationModel::class)->findCardTranslation($id);
        if ($tran == null) return null;
        return json_encode($tran);
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
            $result = $this->deleteCardTranslation($selectedKey);
            if ($result == null) {
                $msg = lang('App.msg_deleted');
            } else {
                return json_encode($this->showResult(false, $result));
            }

        } else if ($mode == 'insert' || $mode == 'modify') {
            if (! $this->validate([
                'card_id'       => ['label' => lang('App.translation_label_card_id'),       'rules' => 'required|max_length[4]'], // int check?
                'author'        => ['label' => lang('App.translation_label_author'),        'rules' => 'required|max_length[128]'],
            ])) {
                $errorsHtml = Utilities::createHtmlValidatedMsg($this->validator->getErrors());
                return json_encode($this->showResult(false, $errorsHtml));
            }

            $tran = new CardTranslation([
                    'card_id'           => Utilities::trimInput($this->request->getVar('card_id')),
                    'author'            => Utilities::trimInput($this->request->getVar('author')),
                    'language_code'     => $this->request->getVar('language_code'),
                    'status'            => $this->request->getVar('status'),
                    'header'            => $this->request->getVar('header_field'),
                    'footer'            => $this->request->getVar('footer_field'),
                    'content'           => $this->request->getVar('content'),
            ]);

            if ($mode == 'insert') {
                $result = $this->insertCardTranslation($tran);
                if ($result == null) {
                    $msg = lang('App.msg_inserted');
                } else {
                    return json_encode($this->showResult(false, $result));
                }               
            } else {
                $tran->id = $selectedKey;
                $result = $this->modifyCardTranslation($tran);
                if ($result == null) {
                    // $newSelectedIndex = $this->request->getVar('selected_index');
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
        $jsonTrans = array();
        if (isset($data['cardTranslations'])) {
            foreach ($data['cardTranslations'] as $tran) {
                $jsonTran = new \stdClass;
                $jsonTran->id = $tran->id;
                $jsonTran->card_id = $tran->card_id;
                $jsonTran->author = $tran->author;
                $jsonTran->language_code = $tran->language_code;
                $jsonTran->language = $tran->language;
                $jsonTran->status = $tran->status;
                $jsonTran->status_name = $tran->status_name;
                $jsonTran->header = $tran->header;
                $jsonTran->header_field = $tran->header_field;
                $jsonTran->footer = $tran->footer;
                $jsonTran->footer_field = $tran->footer_field;
                $jsonTran->content = $tran->content;

                array_push($jsonTrans, $jsonTran);
            }
        }
        $jsonSort = (object)array('rpp'         => $data['sort']->getRpp(), 
                                  'currentPage' => $data['sort']->getCurrentPage(),
                                  'pageTotal'   => $data['sort']->getPageTotal(),
                                  'orderBys'    => $data['sort']->getOrderBys(),
                                  'sortOrders'  => $data['sort']->getSortOrders(),);
        $json = (object)array('items'               => $jsonTrans, 
                              'sort'                => $jsonSort,
                              'conditions'          => $data['conditions'],
                              'newSelectedIndex'    => $newSelectedIndex,);                          

        return json_encode($json);
    }

    private function deleteCardTranslation($id)
    {
        return model(CardTranslationModel::class)->deleteCardTranslation($id);
    }

    private function insertCardTranslation($translation)
    {
        return model(CardTranslationModel::class)->insertCardTranslation($translation);
    }

    private function modifyCardTranslation($translation)
    {
        return model(CardTranslationModel::class)->modifyCardTranslation($translation);
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
            $cardId = $this->request->getVar('cardId');            
            $conditions = json_encode((object)array('cardId' => $cardId,));

            $data = $this->loadList($pageNo, $orderBys, $sortOrders, $conditions);
            $json->responseJsonList = $this->responseJsonList($data, $newSelectedIndex);
        }
        return $json;
    }

    private function prepareSort($currentPage, $orderBys = '-1', $sortOrders = '-1', $count = 0) 
    {
        $obs = CardTranslationModel::DEFAULT_ORDERBYS;
        $sos = CardTranslationModel::DEFAULT_SORTORDERS;
        if ($orderBys != '-1') $obs = explode(',', $orderBys);
        if ($sortOrders != '-1') $sos = explode(',', $sortOrders);
        if (!isset($currentPage)) $currentPage = 1;
        $rpp = Utilities::getSessionRpp();
        return Sort::create($obs, $sos, $currentPage, $rpp, $count);
    }

    private function loadList($currentPage = null, $orderBys = '-1', $sortOrders = '-1', $conditions = '-1')
    {
        $cardId = Utilities::trimInput($this->parseCardId($conditions));
        $model = model(CardTranslationModel::class);
        $count = $model->getCardTranslationCount($cardId);
        $sort = $this->prepareSort($currentPage, $orderBys, $sortOrders, $count);
        $translations = $model->getCardTranslationsByCardId($cardId, $sort);

        $data = [
            'displayHeader'     => lang('App.card_translation_management'),
            'cardTranslations'  => $translations,
            'sort'              => $sort,
            'conditions'        => $conditions,
        ];
        return $data;
    }

    private function parseCardId($conditions = '-1') {
        $cardId = null;
        if ($conditions != '-1') {
            $cds = json_decode($conditions);
            $cardId = $cds->cardId;
        }
        return $cardId;
    }

}