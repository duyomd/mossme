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
        ];
        
        return view('templates/header', $data).view('credits');
    }
}