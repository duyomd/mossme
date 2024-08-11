<?php

namespace App\Controllers;

use App\Entities\Message;
use App\Models\MessageModel;
use App\Helpers\Utilities;

class Contact extends BaseController
{
    public function index($error = null): string
    {
        helper('form');

        $data = [
            'displayHeader' => lang('App.contact'),
            'error'        => $error,
        ];
        
        return view('templates/header', $data).view('contact');
    }

    public function save()
    {
        if (!$this->request->is('post')) {
            return "";
        }

        helper('form');

        // Checks whether the submitted data passed the validation rules.
        if (! $this->validate([
            'name'      => ['label' => lang('App.label_name'),      'rules' => 'max_length[128]'],
            'email'     => ['label' => lang('App.label_email'),     'rules' => 'trim|required|valid_email|max_length[64]'],
            'subject'   => ['label' => lang('App.label_subject'),   'rules' => 'max_length[255]'],
            'content'   => ['label' => lang('App.label_content'),   'rules' => 'required|max_length[63206]'],
        ])) {
            // The validation fails, so returns the form.
            return $this->index(true);
        }

        // // Gets the validated data.
        $post = $this->validator->getValidated();

        $message = new Message([
            'sender'                => auth()->loggedIn() ? auth()->user()->username : null,
            'ip_address'            => $this->request->getIPAddress(),
            'user_language_code'    => Utilities::getSessionLocale(),
            'name'                  => $post['name'],
            'email'                 => $post['email'],
            'subject'               => $post['subject'],
            'content'               => $post['content'],
            'status'                => Utilities::STATUS_ACTIVE,
        ]);
        model(MessageModel::class)->save($message);

        return redirect()->to(substr($_SERVER['REQUEST_URI'], 1))->with('success', true);
    }
}
