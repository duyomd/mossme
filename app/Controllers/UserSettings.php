<?php

namespace App\Controllers;

use App\Helpers\Utilities;
use App\Models\LanguageModel;
use App\Models\UserSettingsModel;
use App\Models\Sort;
use App\Entities\UserSettings as USEntity;

class UserSettings extends BaseController
{
  public function show()
  {
    if (!auth()->loggedIn()) {
      return redirect()->to(config('Auth')->logoutRedirect());
    }

    helper('form');
    $data = [
      'displayHeader' => lang('App.settings'),
      'description'   => lang('App.description_settings'),
      'languages'     => $this->filterLanguages($this->data['languages']),
      'userSettings'  => $this->getUserSettings(), 
    ];
    return view('userSettings', $data);
  }
  
  public function action()
  {
    if (!$this->request->is('post')) {
      return redirect()->back()->withInput()->with('error', "Not a post request.");
    }

    helper('form');
    
    $rules = [
      'language_code' => ['label' => lang('App.setting_language'),          'rules' => 'max_length[10]'],
      'rows_per_page' => ['label' => lang('App.setting_num_rows_per_page'), 'rules' => 'integer|greater_than[0]'],
      'num_of_cards'  => ['label' => lang('App.setting_num_of_cards'),      'rules' => 'integer|less_than[10]'],
      'num_of_feeds'  => ['label' => lang('App.setting_num_of_feeds'),      'rules' => 'integer|less_than[10]'],
      'theme_code'    => ['label' => lang('App.setting_theme'),             'rules' => 'max_length[32]'],
      'lite_mode'     => ['label' => lang('App.setting_display_mode'),      'rules' => 'required|max_length[1]'],
    ];
    if (!$this->validate($rules)) {
      $errorsHtml = Utilities::createHtmlValidatedMsg($this->validator->getErrors());
      return redirect()->back()->withInput()->with('error', $errorsHtml);
    }

    $userSettings = new USEntity();
    $userSettings->user_id = user_id();
    $userSettings->fill($this->request->getPost(array_keys($rules))); 
    
    model(UserSettingsModel::class)->saveUserSettings($userSettings);

    // set locale, rpp, ... not synced when value changed from other pages, fix there??
    Utilities::setSessionUserSettings($userSettings);

    return redirect()->back()->withInput()->with('success', true);
  }

  private function filterLanguages($languages = null)
  {
    if (!isset($languages)) return null;
    $filtereds = array();
    foreach ($languages as $lang) {
      if ($lang->status == Utilities::STATUS_ACTIVE) {
        array_push($filtereds, $lang);
      }
    }
    return $filtereds;
  }

  private function getUserSettings() {
    return model(UserSettingsModel::class)->getUserSettings(user_id());
  }
}