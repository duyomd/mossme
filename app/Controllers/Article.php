<?php

namespace App\Controllers;

use App\Models\EntryModel;
use App\Models\TranslationModel;
use App\Models\CommentaryModel;
use App\Helpers\Utilities;

use CodeIgniter\Exceptions\PageNotFoundException;

class Article extends BaseController
{

    public function show($id = null, $forward = null, $f_id = null): string
    {
        $user_language_code = Utilities::getSessionLocale();

        $entryModel = model(EntryModel::class);
        $translationModel = model(TranslationModel::class);

        // entry data
        $entry = $entryModel->getEntry($id);
        if ($entry == null) return $this->index();
        
        // translation data by entry_id (for dropdown display also)        
        $translations = $translationModel->getTranslations($entry, $user_language_code, $forward == 'translation' ? $f_id : null);
        if ($translations == null) return $this->index();
        $entry->translations = $translations;

        // child list (for folder type)
        $entry->translationsChildren = $translationModel->getChildren($entry, $user_language_code);

        // parent list (tree to root)
        $entry->translationsParents = $translationModel->getParents($entry, $user_language_code);

        // set display title
        $entryModel->displayTitle($entry, $user_language_code);

        // commentary list
        $entry->commentaries = model(CommentaryModel::class)
                                ->getCommentaries($entry, $user_language_code, $forward == 'commentary' ? $f_id : null);

        $data = [
            'displayHeader' => $entry->displayTitle,
            'entry'         =>  $entry,
            'forward'       => $forward,
        ];

        helper('form');

        return view('templates/header', $data).view('article');
    }

    /**
     * TODO
     */
    // public function index(): string
    // {
    //     return "Wrong URL. Please go back: <a href=\"/\">Home</a>";
    // }

}