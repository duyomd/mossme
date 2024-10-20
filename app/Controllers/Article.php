<?php

namespace App\Controllers;

use App\Controllers\ArticleBase;
use App\Models\EntryModel;
use App\Models\TranslationModel;
use App\Models\CommentaryModel;
use App\Helpers\Utilities;

use CodeIgniter\Exceptions\PageNotFoundException;

class Article extends ArticleBase
{

    public function show($id = null): string
    {
        $user_language_code = Utilities::getSessionLocale();

        $entryModel = model(EntryModel::class);
        $translationModel = model(TranslationModel::class);

        // entry data        
        $entry = $entryModel->getEntry($entryModel->getEntryRangeId($id));
        if ($entry == null) return $this->notFound();
        Utilities::parallels($entry);

        // get query parameters
        $anchor = $this->request->getGet('anchor');
        $a_id = $this->request->getGet('aid');

        // translation data by entry_id (for dropdown display also)        
        $translations = $translationModel->getTranslations($entry, $user_language_code, 
            $anchor == 'translation' ? $a_id : ($anchor == 'commentary' ? null : $this->request->getGet('tid')));
        if ($translations == null) return $this->notFound();
        $entry->translations = $translations;

        // child list (for folder type)
        $entry->translationsChildren = $translationModel->getChildren($entry, $user_language_code);

        // parent list (tree to root)
        $entry->translationsParents = $translationModel->getParents($entry, $user_language_code);

        // set display title
        // $entryModel->displayTitle($entry, $user_language_code);

        // commentary list
        $entry->commentaries = model(CommentaryModel::class)
                                ->getCommentaries($entry, $user_language_code, $anchor == 'commentary' ? $a_id : null);
        
        // check whether this entry can group all its children to display in one long page
        $entry->isChildrenGroupable = $translationModel->isChildrenGroupable($entry->id);
        
        $data = [
            'displayHeader' => $entry->displayEnumTitle,
            'description'   => lang('App.description_article'),
            'entry'         => $entry,
            'anchor'        => $anchor,
            'hrefLangs'     => $this->createHrefLangs($entry->translations),
        ];

        helper('form');

        return view('templates/header', array_merge($this->data, $data)).view('article');
    }

    /**
     * create hreflang links for SEO purpose
     */
    private function createHrefLangs($translations) 
    {
        if (!isset($translations)) return null;
        $hrefLangs = array();
        $baseUrl = base_url();
        foreach($translations as $tran) {
            if (!$tran->pseudo) {
                $hrefLang = new \stdClass;
                $hrefLang->lang = $tran->language_code;
                $hrefLang->url  = $baseUrl . 'article/' . $tran->entry_id . '?tid=' . $tran->id . '&lang=' . $tran->language_code;
                array_push($hrefLangs, $hrefLang);
            }
        }
        return $hrefLangs;
    }
    
}