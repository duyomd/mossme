<?php

namespace App\Controllers;

use App\Models\ImageUrlModel;
use App\Models\Sort;
use App\Entities\ImageUrl;
use App\Helpers\Utilities;

class ImageUrlManager extends BaseController
{

    public function show()
    {
        if (!auth()->loggedIn() || !auth()->user()->inGroup('dataoperator', 'superadmin')) {
            return redirect()->to(config('Auth')->logoutRedirect());
        } 

        $data = $this->loadList();
        $data['responseJsonList'] = $this->responseJsonList($data);
        helper('form');
        
        return view('admin/imageUrlManager', array_merge($this->data, $data));
    }

    public function ajaxFind($id = null) 
    {
        if (!isset($id)) return null;
        $imageUrl = model(ImageUrlModel::class)->getImageUrl($id);
        if ($imageUrl == null) return null;
        return json_encode($imageUrl);
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
            $result = $this->deleteImageUrl($this->request->getVar('selected_key'));
            if ($result == null) {
                $msg = lang('App.msg_deleted');
            } else {
                return json_encode($this->showResult(false, $result));
            }

        } else if ($mode == 'insert' || $mode == 'modify') {
            if (! $this->validate([
                'image_name'    => ['label' => lang('App.imageUrl_label_image_name'),   'rules' => 'required|max_length[128]'],
                'image_url'     => ['label' => lang('App.imageUrl_label_image_url'),    'rules' => 'required|max_length[128]'],
                'sequence'      => ['label' => lang('App.imageUrl_label_sequence'),     'rules' => 'required|integer|greater_than[0]|max_length[10]'],
            ])) {
                $errorsHtml = Utilities::createHtmlValidatedMsg($this->validator->getErrors());
                return json_encode($this->showResult(false, $errorsHtml));
            }

            $imageUrl = new ImageUrl([
                    'image_name' => $this->request->getVar('image_name'),
                    'image_url'  => $this->request->getVar('image_url'),
                    'sequence'   => $this->request->getVar('sequence'),
            ]);

            if ($mode == 'insert') {
                $result = $this->insertImageUrl($imageUrl);
                if ($result == null) {
                    $msg = lang('App.msg_inserted');
                } else {
                    return json_encode($this->showResult(false, $result));
                }               
            } else {
                $imageUrl->id = $this->request->getVar('selected_key');
                $result = $this->modifyImageUrl($imageUrl);
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
            $result = $this->moveImageUrl($this->request->getVar('selected_key'), $isSequenceUp);
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
        $jsonImageUrls = array();
        foreach ($data['imageUrls'] as $imageUrl) {
            $jsonImageUrl = new \stdClass;
            $jsonImageUrl->id = $imageUrl->id;
            $jsonImageUrl->image_name = $imageUrl->image_name;
            $jsonImageUrl->image_url = $imageUrl->image_url;
            $jsonImageUrl->sequence = $imageUrl->sequence;
            array_push($jsonImageUrls, $jsonImageUrl);
        }
        $jsonSort = (object)array('rpp'         => $data['sort']->getRpp(), 
                                  'currentPage' => $data['sort']->getCurrentPage(),
                                  'pageTotal'   => $data['sort']->getPageTotal(),
                                  'orderBys'    => $data['sort']->getOrderBys(),
                                  'sortOrders'  => $data['sort']->getSortOrders(),);
        $json = (object)array('items'               => $jsonImageUrls, 
                              'sort'                => $jsonSort,
                              'newSelectedIndex'    => $newSelectedIndex);                          

        return json_encode($json);
    }

    private function deleteImageUrl($id)
    {
        return model(ImageUrlModel::class)->deleteImageUrl($id);
    }

    private function insertImageUrl($imageUrl)
    {
        return model(ImageUrlModel::class)->insertImageUrl($imageUrl);
    }

    private function modifyImageUrl($imageUrl)
    {
        return model(ImageUrlModel::class)->modifyImageUrl($imageUrl);
    }

    private function moveImageUrl($id, $isSequenceUp)
    {
        return model(ImageUrlModel::class)->moveImageUrl($id, $isSequenceUp);
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
        $obs = ImageUrlModel::DEFAULT_ORDERBYS;
        $sos = ImageUrlModel::DEFAULT_SORTORDERS;
        if ($orderBys != '-1') $obs = explode(',', $orderBys);
        if ($sortOrders != '-1') $sos = explode(',', $sortOrders);
        if (!isset($currentPage)) $currentPage = 1;
        $rpp = Utilities::getSessionRpp();
        return Sort::create($obs, $sos, $currentPage, $rpp, $count);
    }

    private function loadList($currentPage = null, $orderBys = '-1', $sortOrders = '-1')
    {
        $model = model(ImageUrlModel::class);
        $count = $model->getImageUrlCount();
        $sort = $this->prepareSort($currentPage, $orderBys, $sortOrders, $count);
        $imageUrls = $model->getImageUrls($sort);

        $data = [
            'displayHeader' => lang('App.imageUrl_management'),
            'imageUrls'     => $imageUrls,
            'sort'          => $sort,
        ];
        return $data;
    }

}