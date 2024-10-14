<?php

namespace App\Controllers;

use App\Models\EntryModel;
use App\Models\TranslationModel;
use App\Models\CommentaryModel;
use App\Helpers\Utilities;

class ArticleBase extends BaseController
{
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

  public function fetchChildNodes($parentEntryId = null) {
    if (!isset($parentEntryId)) return [];    
    $parentEntry = model(EntryModel::class)->getEntryOnly($parentEntryId);
    $childNodes = model(TranslationModel::class)->getChildren($parentEntry, Utilities::getSessionLocale());
    return json_encode($childNodes);
  }
}
