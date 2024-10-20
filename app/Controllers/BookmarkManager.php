<?php

namespace App\Controllers;
use App\Helpers\Utilities;
use App\Models\BookmarkModel;
use App\Models\Sort;
use App\Entities\Bookmark;

class BookmarkManager extends BaseController
{
  public function show()
  {
    if (!auth()->loggedIn()) {
      return redirect()->to(config('Auth')->logoutRedirect());
    }

    $data = $this->loadList();
    $data['description']      = lang('App.description_bookmark');
    $data['responseJsonList'] = $this->responseJsonList($data);
    helper('form');
    
    return view('bookmarkManager', array_merge($this->data, $data));
  }    

  public function ajaxFind($id = null) 
  {
    if (!isset($id)) return null;
    $bookmark = model(BookmarkModel::class)->getBookmark($id);
    if ($bookmark == null) return null;
    $bookmark = $this->encodeData(array($bookmark))[0];
    return json_encode($bookmark);
  }

  public function changePage($pageNo = null, $orderBys = '-1', $sortOrders = '-1') 
  {
      $data = $this->loadList($pageNo, $orderBys, $sortOrders);
      return $this->responseJsonList($data);
  }

  /**
   * Save new bookmark (Menu link)
   */
  public function bookmarkInsert() 
  {
    if (!$this->request->is('post') || !$this->request->isAjax())  return;  
    
    // Check if signed in
    if (!auth()->loggedIn()) {
      return redirect()->to(config('Auth')->logoutRedirect());
    }

    helper('form');

    if (!$this->validate([
        'bm-name' => ['label' => lang('App.bookmark_label_name'), 'rules' => 'max_length[255]'],
        'bm-url'  => ['label' => lang('App.bookmark_label_url'),  'rules' => 'required|max_length[255]'],
        'bm-note' => ['label' => lang('App.bookmark_label_note'), 'rules' => 'max_length[1024]'],
    ])) {
        $errorsHtml = Utilities::createHtmlValidatedMsg($this->validator->getErrors());
        return json_encode($this->showResult(false, $errorsHtml));
    }

    $bookmark = new Bookmark();
    $bookmark->user_id = user_id();
    $bookmark->url = $this->request->getVar('bm-url');
    $bookmark->name = $this->request->getVar('bm-name');
    $bookmark->note = $this->request->getVar('bm-note');

    $result = model(BookmarkModel::class)->insertBookmark($bookmark);
    if ($result != null) {
      return json_encode($this->showResult(false, $result));
    }    
    return json_encode($this->showResult(true, lang('App.bookmark_msg_insert_success'), null, 'bookmark-modal'));
  }

  /**
   * Edit, Delete or Move
   */
  public function ajaxSubmit() {
    if (!$this->request->is('post') || !$this->request->isAjax())  return;

    if (!auth()->loggedIn()) {
      return redirect()->to(config('Auth')->logoutRedirect());
    }

    helper('form');

    $mode = $this->request->getVar('mode');
    $msg = '';
    $newSelectedIndex = null;
    $result;

    if ($mode == 'delete') {
      $result = model(BookmarkModel::class)->deleteBookmark($this->request->getVar('selected_key'));
      if ($result == null) {
        $msg = lang('App.msg_deleted');
      } else {
        return json_encode($this->showResult(false, $result));
      }

    } else if ($mode == 'modify') {
      if (! $this->validate([
        'name' => ['label' => lang('App.bookmark_label_name'), 'rules' => 'max_length[255]'],
        // 'url'  => ['label' => lang('App.bookmark_label_url'),  'rules' => 'required|max_length[255]'],
        'note' => ['label' => lang('App.bookmark_label_note'), 'rules' => 'max_length[1024]'],
      ])) {
        $errorsHtml = Utilities::createHtmlValidatedMsg($this->validator->getErrors());
        return json_encode($this->showResult(false, $errorsHtml));
      }

      // gets the validated data
      // $post = $this->validator->getValidated();

      $bookmark = new Bookmark([
              'id'        => $this->request->getVar('selected_key'),
              'name'      => $this->request->getVar('name'),
              // 'url'       => $this->request->getVar('url'),
              'note'      => $this->request->getVar('note'),
              'sequence'  => $this->request->getVar('sequence'),
      ]);

      $result = model(BookmarkModel::class)->modifyBookmark($bookmark);
      if ($result == null) {
          // $newSelectedIndex = $this->request->getVar('selected_index');
          $msg = lang('App.msg_updated');
      } else {
          return json_encode($this->showResult(false, $result));
      }                   
        
    } else if (str_starts_with($mode, 'move')) {
      $orders = $this->request->getVar('sortOrders');
      $isSequenceUp = false;
      if ($mode == 'move-up') {
          $isSequenceUp = str_starts_with($orders, 'DESC');
      } else if ($mode == 'move-down') {
          $isSequenceUp = str_starts_with($orders, 'ASC');
      }
      
      $result = model(BookmarkModel::class)
        ->moveBookmark($this->request->getVar('selected_key'), $isSequenceUp);
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

  /****************** PRIVATE FUNCTIONS ******************/

  private function showResult($succeed, $html, $newSelectedIndex = null, $modalId = null) {
    $json = new \stdClass;
    $json->hash = csrf_hash();
    $json->succeed = $succeed;
    $json->info = $html;
    if (isset($modalId)) {
      $json->modalId = $modalId;
    }
    if ($succeed == true) {
        $pageNo = $this->request->getVar('currentPage');
        $data = $this->loadList($pageNo, 
            $this->request->getVar('orderBys'), $this->request->getVar('sortOrders'));
        $json->responseJsonList = $this->responseJsonList($data, $newSelectedIndex);
    }
    return $json;
  }

  private function loadList($currentPage = null, $orderBys = '-1', $sortOrders = '-1')
  {
    $model = model(BookmarkModel::class);
    $count = $model->getBookmarkCount(user_id());
    $sort = $this->prepareSort($currentPage, $orderBys, $sortOrders, $count);
    $bookmarks = $model->getBookmarks($sort, user_id());

    $data = [
        'displayHeader' => lang('App.bookmark_management'),
        'bookmarks'     => $bookmarks,
        'sort'          => $sort,
    ];
    return $data;
  }

  private function prepareSort($currentPage, $orderBys = '-1', $sortOrders = '-1', $count = 0) 
  {
      $obs = BookmarkModel::DEFAULT_ORDERBYS;
      $sos = BookmarkModel::DEFAULT_SORTORDERS;
      if ($orderBys != '-1') $obs = explode(',', $orderBys);
      if ($sortOrders != '-1') $sos = explode(',', $sortOrders);
      if (!isset($currentPage)) $currentPage = 1;
      $rpp = Utilities::getSessionRpp();
      return Sort::create($obs, $sos, $currentPage, $rpp, $count);
  }

  private function responseJsonList($data, $newSelectedIndex = null) {
    $jsonBms = array();
    foreach ($data['bookmarks'] as $bookmark) {
        $jsonBm = new \stdClass;
        $jsonBm->id = $bookmark->id;
        $jsonBm->user_id = $bookmark->user_id;
        $jsonBm->url = $bookmark->url;
        $jsonBm->name = $bookmark->name;
        $jsonBm->note = $bookmark->note;
        $jsonBm->sequence = $bookmark->sequence;
        array_push($jsonBms, $jsonBm);
    }
    $jsonSort = (object)array('rpp'         => $data['sort']->getRpp(), 
                              'currentPage' => $data['sort']->getCurrentPage(),
                              'pageTotal'   => $data['sort']->getPageTotal(),
                              'orderBys'    => $data['sort']->getOrderBys(),
                              'sortOrders'  => $data['sort']->getSortOrders(),);
    $json = (object)array('items'               => $this->encodeData($jsonBms), 
                          'sort'                => $jsonSort,
                          'newSelectedIndex'    => $newSelectedIndex);                          
    return json_encode($json);
  }

  private function encodeData($bookmarks, $slash = true) {
    if (isset($bookmarks)) {
      foreach ($bookmarks as $bookmark) {
        $bookmark->note = Utilities::encodeDataHtml($bookmark->note, $slash);
      }
    }
    return $bookmarks;
  }
}
