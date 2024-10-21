<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;
use App\Helpers\Utilities;

class Translation extends Entity
{
    /**
     * In case of pseudo type for dropdown headers: 
     * title will be displayed as language or reference_name,
     * and notation will be displayed as referenced_url
     */
    protected $pseudo = false;

    // default selected dropdown item (on page load)
    protected $default = false;

    // string encoded for js-html
    protected $encodedTitle;
    protected $encodedContent;
    protected $encodedAuthor;
    protected $encodedAuthorNote;
    protected $encodedNotation;

    public function getPseudo() 
    {
        return $this->pseudo;
    }

    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }

    public function getDefault() {
        return $this->default;
    }

    public function setDefault(bool $default) {
        $this->default = $default;
        return $this;
    }

    // make dropdown header
    public function makePseudo(bool $pseudo = false, string $author = null, string $notation = null, string $language_code = null) 
    {
        $this->setPseudo($pseudo);
        if (isset($author)) {
            $this->attributes['author'] = $author;
        }
        if (isset($notation)) {
            $this->notation = $notation;
        }
        if (isset($language_code)) {
            $this->language_code = $language_code;
        }
        return $this;
    }

    public function getEncodedTitle() {
        return $this->encodedTitle;
    }

    public function setEncodedTitle($encodedTitle) {
        $this->encodedTitle = $encodedTitle;
        return $this;
    }

    public function getEncodedContent() {
        return $this->encodedContent;
    }

    public function setEncodedContent($encodedContent) {
        $this->encodedContent = $encodedContent;
        return $this;
    }

    public function getEncodedAuthor() {
        return $this->encodedAuthor;
    }

    public function setEncodedAuthor($encodedAuthor) {
        $this->encodedAuthor = $encodedAuthor;
        return $this;
    }

    public function getEncodedAuthorNote() {
        return $this->encodedAuthorNote;
    }

    public function setEncodedAuthorNote($encodedAuthorNote) {
        $this->encodedAuthorNote = $encodedAuthorNote;
        return $this;
    }

    public function getEncodedNotation() {
        return $this->encodedNotation;
    }

    public function setEncodedNotation($encodedNotation) {
        $this->encodedNotation = $encodedNotation;
        return $this;
    }

    public function isPali() 
    {
        return $this->attributes['section_id'] == Utilities::SECTION_ID_NIKAYA;
    }

    public function isAgama() 
    {
        return $this->attributes['section_id'] == Utilities::SECTION_ID_AGAMA;
    }

    public function isOutlaw() 
    {
        return $this->attributes['section_id'] == Utilities::SECTION_ID_OUTLAW;
    }
}