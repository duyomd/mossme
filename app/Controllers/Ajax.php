<?php

namespace App\Controllers;
use App\Helpers\Utilities;
use App\Models\UserSettingsModel;
use App\Models\BookmarkModel;
use App\Entities\Bookmark;


class Ajax extends BaseController
{
  /**
   * Specify language
   */
  public function changeLanguage($lang = null)
  {
    Utilities::setSessionLocale($lang);
    return $lang;
  }

  public function changeTheme($theme = null)
  {
    Utilities::setSessionTheme($theme);
    return $theme;
  }

  /**
   * Specify number of rows per page
   */
  public function changeRowsPerPage($rpp = null, $conditions = '-1', $url = null) 
  {
    Utilities::setSessionRpp($rpp);
    return redirect()->to(rawurldecode($url) . '/p=1/orderby=-1/sortorder=-1/conditions=' . $conditions);
  }

  /**
   * Event listener action after successful login
   */
  public static function handleLogin()
  {
    if (!auth()->loggedIn()) return;
    $us = model(UserSettingsModel::class)->getUserSettings(user_id());
    Utilities::setSessionUserSettings($us);
  }

  /****************** PRIVATE FUNCTIONS ******************/

}
