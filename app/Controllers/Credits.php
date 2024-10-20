<?php

namespace App\Controllers;

use App\Helpers\Utilities;

class Credits extends BaseController
{
    public function index(): string
    {
        helper('form');

        $data = [
            'displayHeader' => lang('App.credits'),
            'description'   => lang('App.description_credits'),
        ];
        
        return view('templates/header', array_merge($this->data, $data)).view('credits');
    }
}