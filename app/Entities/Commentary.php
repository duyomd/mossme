<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Commentary extends Entity
{
    /**
     * In case of pseudo type for dropdown headers: 
     *  title will be displayed as language
     */
    protected $pseudo = false;

    // default selected dropdown item (on page load)
    protected $default = false;

    // string encoded for js-html
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
    public function makePseudo(bool $pseudo = false, string $author) 
    {
        $this->setPseudo($pseudo);
        if (isset($author)) {
            $this->attributes['author'] = $author;
        }
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

}