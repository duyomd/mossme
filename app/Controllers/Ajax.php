<?php

namespace App\Controllers;
use App\Helpers\Utilities;
use App\Models\UserSettingsModel;
use App\Models\BookmarkModel;
use App\Models\EntryModel;
use App\Models\TranslationModel;
use App\Models\CommentaryModel;
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

  public function loadParallels($parsStr = null) 
  {
    if (Utilities::isNullOrBlank($parsStr)) return null;

    $jsonPars = array();
    $pars = explode(",", str_replace("_", ":", $parsStr));

    foreach ($pars as $par) {
      $jsonPar = new \stdClass;
      $jsonPar->entry_id = $par;

      $url = Utilities::URL_ARTICLE . $par;
      // Utilities::urlExists('https://mossme.net' . $url);
      $jsonPar->url = model(EntryModel::class)->getEntryOnly($par) != null ? $url : null;
      
      array_push($jsonPars, $jsonPar);
    }
    // return json_encode($jsonPars);
    return json_encode((object)array('urls' => $jsonPars, 
                                     'msg'  => lang('App.article_parallels_found', [count($jsonPars)])));
  }

  public function loadArticleContent($type = 1, $id = null)
  {
    if (!isset($id)) return '';
    if ($type == 3) {
      return model(CommentaryModel::class)->findCommentary($id)->content;  
    } 
    return model(TranslationModel::class)->findTranslation($id)->content;
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
