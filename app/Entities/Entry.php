<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use App\Entities\Translation;
use App\Helpers\Utilities;

class Entry extends Entity
{
    protected string $displayTitle = '';
    protected bool $isFolder;

    protected array $translations           = array();
    protected array $translationsChildren   = array();
    protected array $translationsParents    = array();
    protected array $commentaries           = array();

    protected $translationCount;
    protected $commentaryCount;

    public function getDisplayTitle()
    {
        return $this->displayTitle;
    }

    public function setDisplayTitle(string $displayTitle)
    {
        $this->displayTitle = $displayTitle;
        return $this;
    }

    /**
     * Folder or file
     */
    public function getIsFolder(): bool
    {        
        $isFolder = $this->type === Utilities::TYPE_FOLDER;
        return $isFolder;
    }

    public function getTranslations(): ?array 
    {
        return $this->translations;
    }

    public function setTranslations(array $translations) 
    {
        $this->translations = $translations;
        return $this;
    }

    public function getTranslationsChildren(): ?array 
    {
        return $this->translationsChildren;
    }

    public function setTranslationsChildren($translationsChildren) 
    {
        $this->translationsChildren = $translationsChildren;
        return $this;
    }

    public function getTranslationsParents(): ?array 
    {
        return $this->translationsParents;
    }

    public function setTranslationsParents($translationsParents) 
    {
        $this->translationsParents = $translationsParents;
        return $this;
    }

    public function getCommentaries(): ?array 
    {
        return $this->commentaries;
    }

    public function setCommentaries($commentaries) 
    {
        $this->commentaries = $commentaries;
        return $this;
    }

    public function getTranslationCount() {
        if (isset($this->translationCount)) return $this->translationCount; 
        $count = 0;
        if (isset($this->translations)) {
            foreach($this->translations as $tran) {
                if (!$tran->getPseudo()) {
                    $count++;
                }
            }
        }
        $this->translationCount = $count;
        return $this->translationCount;
    }

    public function getCommentaryCount() {
        if (isset($this->commentaryCount)) return $this->commentaryCount; 
        $count = 0;
        if (isset($this->commentaries)) {
            foreach($this->commentaries as $comm) {
                if (!$comm->getPseudo()) {
                    $count++;
                }
            }
        }
        $this->commentaryCount = $count;
        return $this->commentaryCount;
    }    
}