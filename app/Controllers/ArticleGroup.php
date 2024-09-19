<?php

namespace App\Controllers;

use App\Models\EntryModel;
use App\Models\TranslationModel;
use App\Helpers\Utilities;

use CodeIgniter\Exceptions\PageNotFoundException;

class ArticleGroup extends BaseController
{

    public function show($parent_id = null)
    {
        $user_language_code = Utilities::getSessionLocale();

        $entryModel = model(EntryModel::class);
        $translationModel = model(TranslationModel::class);

        // entry data
        $entry = $entryModel->getEntry($parent_id);
        if ($entry == null) return $this->notFound();        

        // child list (similar logic to Article.php)
        // FIXME: optimize to 1 SQL only (in the future if needed for better performance)
        $entry->children = $translationModel->getChildren($entry, $user_language_code);
        $entryChildren = array();
        foreach ($entry->children as $child) {
            $en = $entryModel->getEntry($child->entry_id);
            $en->translations = $translationModel->getTranslations($en, $user_language_code);
            array_push($entryChildren, Utilities::parallels($en));
        }
        $entry->entryChildren = $entryChildren;
        
        // parent list (tree to root)
        $entry->translationsParents = $translationModel->getParents($entry, $user_language_code);

        // set display title
        $entryModel->displayTitle($entry, $user_language_code);

        $data = [
            'displayHeader' => $entry->displayEnumTitle,
            'entry'         => $entry,
        ];

        helper('form');

        return view('templates/header', $data).view('articleGroup');
    }

    private function notFound()
    {
        throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(); 
    }

    private function parallels($entry = null)
    {
        if ($entry == null) return null;
        $parArr = explode(Utilities::SERIALS_DELIMETER, $entry->serials);
        $parArr = array_diff($parArr, [$entry->id]);
        // request from js somehow messed up with url contains ":" ??
        $entry->parallels = implode(",", str_replace(":", "_", $parArr));
        return $entry;
    }

}