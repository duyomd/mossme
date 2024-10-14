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

    public function show($id = null, $forward = null, $f_id = null): string
    {
        $user_language_code = Utilities::getSessionLocale();

        $entryModel = model(EntryModel::class);
        $translationModel = model(TranslationModel::class);

        // entry data        
        $entry = $entryModel->getEntry($entryModel->getEntryRangeId($id));
        if ($entry == null) return $this->notFound();
        Utilities::parallels($entry);

        // translation data by entry_id (for dropdown display also)        
        $translations = $translationModel->getTranslations($entry, $user_language_code, $forward == 'translation' ? $f_id : null);
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
                                ->getCommentaries($entry, $user_language_code, $forward == 'commentary' ? $f_id : null);
        
        // check whether this entry can group all its children to display in one long page
        $entry->isChildrenGroupable = $translationModel->isChildrenGroupable($entry->id);

        $data = [
            'displayHeader' => $entry->displayEnumTitle,
            'entry'         => $entry,
            'forward'       => $forward,
        ];

        helper('form');

        return view('templates/header', $data).view('article');
    }

}