<?php

namespace App\Controllers;

use CodeIgniter\Exceptions\PageNotFoundException;
use App\Models\LanguageModel;
use App\Models\Sort;
use App\Entities\Language;
use App\Helpers\Utilities;

class LanguageManager extends BaseController
{

    public function index()
    {
        if (!auth()->loggedIn() || !auth()->user()->inGroup('dataoperator', 'superadmin')) {
            return redirect()->to(config('Auth')->logoutRedirect());
        } 

        $data = $this->loadList();
        $data['responseJsonList'] = $this->responseJsonList($data);
        helper('form');
        
        return view('admin/languageManager', array_merge($this->data, $data));
    }

    public function ajaxFind($code = null) 
    {
        if (!isset($code)) return null;
        $language = model(LanguageModel::class)->getLanguage($code);
        if ($language == null) return null;
        return json_encode($language);
    }

    public function ajaxSubmit() {
        if (!$this->request->is('post') || !$this->request->isAjax())  return;

        if (!auth()->loggedIn() || !auth()->user()->inGroup('dataoperator', 'superadmin')) {
            return redirect()->to(config('Auth')->logoutRedirect());
        }

        helper('form');

        $mode = $this->request->getVar('mode');
        $code = $this->request->getVar('code');
        $msg = '';
        $newSelectedIndex = null;
        $result;

        if ($mode == 'delete') {
            $result = $this->deleteLanguage($code);
            if ($result == null) {
                $msg = lang('App.msg_deleted');
            } else {
                return json_encode($this->showResult(false, $result));
            }

        } else if ($mode == 'insert' || $mode == 'modify') {
            if (! $this->validate([
                'code'      => ['label' => lang('App.label_code'),      'rules' => 'required|max_length[10]|alpha_dash'],
                'language'  => ['label' => lang('App.label_language'),  'rules' => 'required|max_length[32]'],
                'sequence'  => ['label' => lang('App.label_sequence'),  'rules' => 'required|integer|greater_than[0]|less_than[1000]|max_length[3]'],
            ])) {
                $errorsHtml = Utilities::createHtmlValidatedMsg($this->validator->getErrors());
                return json_encode($this->showResult(false, $errorsHtml));
            }

            // gets the validated data
            $post = $this->validator->getValidated();

            $language = new Language([
                    'code'      => $code,
                    'language'  => $this->request->getVar('language'),
                    'status'  => $this->request->getVar('status'),
                    'sequence'  => $this->request->getVar('sequence'),
            ]);

            if ($mode == 'insert') {
                $result = $this->insertLanguage($language);
                if ($result == null) {
                    $msg = lang('App.msg_inserted');
                } else {
                    return json_encode($this->showResult(false, $result));
                }               
            } else {
                $result = $this->modifyLanguage($language);
                if ($result == null) {
                    // $newSelectedIndex = $this->request->getVar('selected_index');    // position might be changed
                    $msg = lang('App.msg_updated'); 
                } else {
                    return json_encode($this->showResult(false, $result));
                }                   
            }
            
        } else if (str_starts_with($mode, 'move')) {
            $selectedKey = $this->request->getVar('selected_key');
            $orders = $this->request->getVar('sortOrders');
            $isSequenceUp = false;
            if ($mode == 'move-up') {
                $isSequenceUp = str_starts_with($orders, 'DESC');
            } else if ($mode == 'move-down') {
                $isSequenceUp = str_starts_with($orders, 'ASC');
            }
            $result = $this->moveLanguage($selectedKey, $isSequenceUp);
            if ($result == null) {
                $newSelectedIndex = $this->request->getVar('selected_index');  
                $msg = lang('App.msg_move_success'); 
            } else {
                return json_encode($this->showResult(false, $result));
            }
            
        } else {
            return;
        }
        
        $this->updateCache();
        return json_encode($this->showResult(true, $msg, $newSelectedIndex));
    }

    public function changePage($pageNo = null, $orderBys = '-1', $sortOrders = '-1') 
    {
        $data = $this->loadList($pageNo, $orderBys, $sortOrders);
        return $this->responseJsonList($data);
    }

    private function responseJsonList($data, $newSelectedIndex = null) {
        $jsonLangs = array();
        foreach ($data['languages'] as $lang) {
            $jsonLang = new \stdClass;
            $jsonLang->code = $lang->code;
            $jsonLang->language = $lang->language;
            $jsonLang->status = $lang->status;
            $jsonLang->status_name = $lang->status_name;
            $jsonLang->sequence = $lang->sequence;
            array_push($jsonLangs, $jsonLang);
        }
        $jsonSort = (object)array('rpp'         => $data['sort']->getRpp(), 
                                  'currentPage' => $data['sort']->getCurrentPage(),
                                  'pageTotal'   => $data['sort']->getPageTotal(),
                                  'orderBys'    => $data['sort']->getOrderBys(),
                                  'sortOrders'  => $data['sort']->getSortOrders(),);
        $json = (object)array('items'               => $jsonLangs, 
                              'sort'                => $jsonSort,
                              'newSelectedIndex'    => $newSelectedIndex);                          

        return json_encode($json);
    }

    private function deleteLanguage($code)
    {
        return model(LanguageModel::class)->deleteLanguage($code);
    }

    private function insertLanguage($language)
    {
        return model(LanguageModel::class)->insertLanguage($language);
    }

    private function modifyLanguage($language)
    {
        return model(LanguageModel::class)->modifyLanguage($language);
    }

    private function moveLanguage($code, $isSequenceUp)
    {
        return model(LanguageModel::class)->moveLanguage($code, $isSequenceUp);
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
        $obs = LanguageModel::DEFAULT_ORDERBYS;
        $sos = LanguageModel::DEFAULT_SORTORDERS;
        if ($orderBys != '-1') $obs = explode(',', $orderBys);
        if ($sortOrders != '-1') $sos = explode(',', $sortOrders);
        if (!isset($currentPage)) $currentPage = 1;
        $rpp = Utilities::getSessionRpp();
        return Sort::create($obs, $sos, $currentPage, $rpp, $count);
    }

    private function loadList($currentPage = null, $orderBys = '-1', $sortOrders = '-1')
    {
        $model = model(LanguageModel::class);
        $count = $model->getLanguageCount();
        $sort = $this->prepareSort($currentPage, $orderBys, $sortOrders, $count);
        $languages = $model->getLanguages($sort);

        $data = [
            'displayHeader' => lang('App.language_management'),
            'languages'     => $languages,
            'sort'          => $sort,
        ];
        return $data;
    }

    private function updateCache() {
        // Clear the languages cache
        $cache = \Config\Services::cache();
        $cache->delete('languages'); 
    }

}