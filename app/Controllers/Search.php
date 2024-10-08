<?php

namespace App\Controllers;
use App\Helpers\Utilities;
use App\Models\SearchModel;
use App\Models\Sort;

class Search extends BaseController
{
  public function show()
  {
    $data = $this->loadList();
    $data['responseJsonList'] = $this->responseJsonList($data);
    helper('form');
    
    return view('search', $data);
  }    

  public function changePage($pageNo = null, $orderBys = '-1', $sortOrders = '-1', $conditions = null) 
  {
    $data = $this->loadList($pageNo, $orderBys, $sortOrders, $conditions);
    return $this->responseJsonList($data);
  }

  public function action() {
    if (!$this->request->is('post') || !$this->request->isAjax())  return;
    helper('form');

    $kw_minlength = $this->request->getVar('serial') == null ? '3' : '2';
    if (! $this->validate([
      'keyword' => ['label' => lang('App.search_label_keyword'), 
        'rules' => 'trim|required|min_length['.$kw_minlength.']|max_length[84]|regex_match[^[^!@#$%^&*()=|\/{}\\[\\]:?<>]*$]'],
    ])) {
      $errorsHtml = Utilities::createHtmlValidatedMsg($this->validator->getErrors());
      return json_encode($this->showResult(false, $errorsHtml));
    }

    if ($this->request->getVar('serial') == null 
      && $this->request->getVar('content') == null
      && $this->request->getVar('author') == null
      && $this->request->getVar('commentary') == null) {
      return json_encode($this->showResult(false, lang('App.search_msg_checks_required')));
    }

    $response = $this->showResult(true);
    $response->info = lang('App.search_msg_success', [json_decode($response->responseJsonList)->sort->count]);
    return json_encode($response);
  }

  /****************** PRIVATE FUNCTIONS ******************/

  private function showResult($succeed, $html = null) {
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
      $keyword = Utilities::convertTcvn(trim($this->request->getVar('keyword')));
      $checks = (object)array('serial'     => $this->request->getVar('serial'),
                              'content'    => $this->request->getVar('content'),
                              'author'     => $this->request->getVar('author'),
                              'commentary' => $this->request->getVar('commentary'),);
      $sectionIds = $this->request->getVar('section') != null ? explode(',', $this->request->getVar('section')) : [];
      $conditions = json_encode(
                      (object)array('keyword'     => Utilities::encodeUrlJsonParameter($keyword),
                                    'checks'      => $checks,
                                    'sectionIds'  => $sectionIds,), JSON_UNESCAPED_UNICODE);

      $data = $this->loadList($pageNo, $orderBys, $sortOrders, $conditions);
      $json->responseJsonList = $this->responseJsonList($data);
    }
    $json->noResetForm = true;
    return $json;
  }

  private function loadList($currentPage = null, $orderBys = '-1', $sortOrders = '-1', $conditions = '-1')
  {
    $count = 0;
    $sort;
    $results = [];

    if ($conditions != '-1') {
      $cds = json_decode($conditions);
      $cds->keyword = Utilities::decodeUrlJsonParameter($cds->keyword);
      $user_language_code = Utilities::getSessionLocale();

      $model = model(SearchModel::class);
      $count = $model->getSearchCount($user_language_code, $cds); 
      $sort = $this->prepareSort($currentPage, $orderBys, $sortOrders, $count);
      $results = $model->getSearchResults($user_language_code, $cds, $sort);
    } else {
      $sort = $this->prepareSort($currentPage, $orderBys, $sortOrders, $count);
    }

    $data = [
      'displayHeader' => lang('App.search_management'),
      'results'       => $results,
      'sort'          => $sort,
      'conditions'    => $conditions,
    ];
    return $data;
  }

  private function prepareSort($currentPage, $orderBys = '-1', $sortOrders = '-1', $count = 0) 
  {
    $obs = SearchModel::DEFAULT_ORDERBYS;
    $sos = SearchModel::DEFAULT_SORTORDERS;
    if ($orderBys != '-1') $obs = explode(',', $orderBys);
    if ($sortOrders != '-1') $sos = explode(',', $sortOrders);
    if (!isset($currentPage)) $currentPage = 1;
    $rpp = Utilities::getSessionRpp();
    return Sort::create($obs, $sos, $currentPage, $rpp, $count);
  }

  private function responseJsonList($data) {
    $jsonSort = (object)array('rpp'         => $data['sort']->getRpp(), 
                              'count'       => $data['sort']->getCount(),
                              'currentPage' => $data['sort']->getCurrentPage(),
                              'pageTotal'   => $data['sort']->getPageTotal(),
                              'orderBys'    => $data['sort']->getOrderBys(),
                              'sortOrders'  => $data['sort']->getSortOrders(),);
    $json = (object)array('items'       => $data['results'], 
                          'sort'        => $jsonSort,
                          'conditions'  => $data['conditions'],
                          );                          
    return json_encode($json);
  }
}
