<?php

namespace App\Controllers;

use App\Controllers\ArticleBase;
use App\Entities\Entry;
use App\Models\EntryModel;
use App\Models\TranslationModel;
use App\Helpers\Utilities;

use CodeIgniter\Exceptions\PageNotFoundException;

class ArticleGroup extends ArticleBase
{

    public function show($parent_id = null)
    {
        $user_language_code = Utilities::getSessionLocale();

        // entry data
        $entry = model(EntryModel::class)->getEntry($parent_id);
        if ($entry == null || !$entry->getIsFolder()) return $this->notFound();
        if (!model(TranslationModel::class)->isChildrenGroupable($entry->id)) return $this->notFound();

        // FIXME: optimize to 1 SQL only (in the future if needed for better performance)
        $entry = $this->getChildrenRecursive($entry, $user_language_code);
        
        // Flatten the structure starting from the root entry
        $entry->entryChildren = $this->flattenNodes($entry, '', true);
        
        // parent list (tree to root)
        $entry->translationsParents = model(TranslationModel::class)->getParents($entry, $user_language_code);

        $data = [
            'displayHeader' => $entry->displayEnumTitle,
            'entry'         => $entry,
        ];

        helper('form');

        return view('templates/header', $data).view('articleGroup');
    }

    /**
     * In mysql8.0+ it's better to use Recursive CTE 
     *  Current host's mysql is v5.7, we can use Stored Procedure...
     */
    private function getChildrenRecursive($entry, $user_language_code) {
        if ($entry != null) {
            $entry->translations = model(TranslationModel::class)->getTranslations($entry, $user_language_code);    
            $entry->children = model(TranslationModel::class)->getChildren($entry, $user_language_code);

            $entryChildren = array();
            foreach ($entry->children as $child) {                
                $en = model(EntryModel::class)->getEntry($child->entry_id);
                if ($child->type == Utilities::TYPE_FILE) {                   
                    $en->translations = model(TranslationModel::class)->getTranslations($en, $user_language_code);                    
                    array_push($entryChildren, Utilities::parallels($en));

                } else {
                    $en = $this->getChildrenRecursive($en, $user_language_code);
                    array_push($entryChildren, $en);                    
                }
            }
            $entry->entryChildren = $entryChildren;
        }
        return $entry;
    }

    /**
     *  Function to flatten the structure and collect leaves with extra (chapter...) titles
     */ 
    private function flattenNodes($entry, $parentTitles = '', $skipFirst = true) {
        $result = [];
        
        // Full title for the folder or combined title for the first child, but skip the uppermost entry
        if (!$skipFirst) {
            $fullTitle = $parentTitles . '<br/>' . $entry->displayEnumTitle;
        } else {
            $fullTitle = '';
        }

        if ($entry->type == Utilities::TYPE_FILE) {
            $entry->chapter_title = $parentTitles;
            $result[] = $entry;
        
        } elseif ($entry->type == Utilities::TYPE_FOLDER && isset($entry->entryChildren)) {            
            $firstChild = true;
            foreach ($entry->entryChildren as $child) {
                // First child gets the full combined title, skip the uppermost folder (first level)
                $result = array_merge($result, $this->flattenNodes($child, $firstChild && !$skipFirst ? $fullTitle : '', false));
                $firstChild = false; // Only the first child has the combined title
            }
        }

        return $result;
    }

}