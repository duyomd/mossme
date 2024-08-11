<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\Sort;
use App\Helpers\Utilities;

class UserManager extends BaseController
{

    public function show()
    {
      if (!auth()->loggedIn() || !auth()->user()->inGroup('admin', 'superadmin')) {
          return redirect()->to(config('Auth')->logoutRedirect());
      } 

      $data = $this->loadList();
      $data['responseJsonList'] = $this->responseJsonList($data);
      helper('form');
      
      return view('admin/userManager', $data);
    }

    public function ajaxFind($id = null) 
    {
      if (!isset($id)) return null;
      $user = auth()->getProvider()->findById($id);
      if ($user == null) return null;

      $jsonUser = new \stdClass;
      $jsonUser->id = $user->id;
      $jsonUser->username = $user->username;
      $jsonUser->email = $user->getEmail();
      $jsonUser->active = $user->isActivated() ? '1' : '0';
      $jsonUser->status = $user->isBanned() ? 'Banned' : '0';
      $jsonUser->status_message = $user->getBanMessage();
      $jsonUser->groups = $user->groups;
      $jsonUser = $this->encodeData(array($jsonUser))[0];

      return json_encode($jsonUser);
    }
  
    public function changePage($pageNo = null, $orderBys = '-1', $sortOrders = '-1') 
    {
        $data = $this->loadList($pageNo, $orderBys, $sortOrders);
        return $this->responseJsonList($data);
    }
  
    /**
     * Edit, Delete
     */
    public function ajaxSubmit() {
      if (!$this->request->is('post') || !$this->request->isAjax())  return;
  
      if (!auth()->loggedIn() || !auth()->user()->inGroup('admin', 'superadmin')) {
        return redirect()->to(config('Auth')->logoutRedirect());
      }
  
      helper('form');
  
      $mode = $this->request->getVar('mode');
      $msg = '';
      $newSelectedIndex = null;
      $result;
  
      if ($mode == 'delete') {
        $result = auth()->getProvider()->delete($this->request->getVar('selected_key'), true);
        if ($result) {
          $msg = lang('App.msg_deleted');
        } else {
          return json_encode($this->showResult(false, 
            lang('App.msg_delete_fail', [lang('App.bookmark_label_id'), $this->request->getVar('selected_key')])));
        }
  
      } else if ($mode == 'modify') {
        if (! $this->validate([
          'active' => ['label' => lang('App.users_label_active_status'), 'rules' => 'required'],
          'status_message' => ['label' => lang('App.users_label_ban_message'), 'rules' => 'max_length[255]'],
        ])) {
          $errorsHtml = Utilities::createHtmlValidatedMsg($this->validator->getErrors());
          return json_encode($this->showResult(false, $errorsHtml));
        }
  
        $model = auth()->getProvider(); 
        $user = $model->findById($this->request->getVar('selected_key'));

        // Active status
        if ($this->request->getVar('active') == 'Inactive') {
          $user->deactivate();
        } else {
          $user->activate();
        }

        // Ban status
        if ($this->request->getVar('status') == 'Banned') {
          $user->ban($this->request->getVar('status_message'));
        } else {
          $user->unBan();
        }

        // Groups
        $configGroups = array_keys(setting('AuthGroups.groups'));
        foreach ($configGroups as $group) {
          if ($this->request->getVar($group) == 'on') {
            $user->addGroup($group);
          } else {
            $user->removeGroup($group);
          }
        }

        $msg = lang('App.msg_updated');
          
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
      $model = auth()->getProvider();
      $count = $model->getUserCount();
      $sort = $this->prepareSort($currentPage, $orderBys, $sortOrders, $count);
      $users = $model->getUsers($sort);
  
      $data = [
          'displayHeader' => lang('App.user_management'),
          'users'         => $users,
          'sort'          => $sort,
      ];
      return $data;
    }
  
    private function prepareSort($currentPage, $orderBys = '-1', $sortOrders = '-1', $count = 0) 
    {
        $obs = UserModel::DEFAULT_ORDERBYS;
        $sos = UserModel::DEFAULT_SORTORDERS;
        if ($orderBys != '-1') $obs = explode(',', $orderBys);
        if ($sortOrders != '-1') $sos = explode(',', $sortOrders);
        if (!isset($currentPage)) $currentPage = 1;
        $rpp = Utilities::getSessionRpp();
        return Sort::create($obs, $sos, $currentPage, $rpp, $count);
    }
  
    private function responseJsonList($data, $newSelectedIndex = null) 
    {
      $jsonUsers = array();
      foreach ($data['users'] as $user) {
          $jsonUser = new \stdClass;
          $jsonUser->id = $user->id;
          $jsonUser->username = $user->username;
          $jsonUser->email = $user->email;
          $jsonUser->active = $user->active;
          $jsonUser->status = $user->status;
          $jsonUser->status_message = $user->status_message;
          $jsonUser->groups = $user->groups;
          $jsonUser->last_login = $user->last_login;
          $jsonUser->created_at = $user->created_at;
          array_push($jsonUsers, $jsonUser);
      }
      $jsonSort = (object)array('rpp'         => $data['sort']->getRpp(), 
                                'currentPage' => $data['sort']->getCurrentPage(),
                                'pageTotal'   => $data['sort']->getPageTotal(),
                                'orderBys'    => $data['sort']->getOrderBys(),
                                'sortOrders'  => $data['sort']->getSortOrders(),);
      $json = (object)array('items'               => $this->encodeData($jsonUsers), 
                            'sort'                => $jsonSort,
                            'newSelectedIndex'    => $newSelectedIndex);                          
      return json_encode($json);
    }

    private function encodeData($users, $slash = true) 
    {
      if (isset($users)) {
        foreach ($users as $user) {
          if (isset($user->active)) $user->active = $user->active == 1 ? lang('App.users_active') : lang('App.users_inactive');
          if (isset($user->status_message)) $user->status_message = Utilities::encodeDataHtml($user->status_message, $slash);
          if (isset($user->status)) $user->status = ucfirst($user->status);
          if (isset($user->last_login))  $user->last_login = Utilities::formatDatetime($user->last_login);
          if (isset($user->created_at)) $user->created_at = Utilities::formatDatetime($user->created_at);
        }
      }
      return $users;
    }
}