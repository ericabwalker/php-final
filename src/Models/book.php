<?php

namespace Ericabwalker\PHPfinal\Models;

class Book
{
    /** @type int $bookID ID of the current instance. */
    public $bookID;

    /** @type string $title Title of the current instance. */
    public $title;

    /** @type string $author Author of the current instance. */
    public $author;

    /** @type string $pages Pages of the current instance. */
    public $pages;

    /** @type string $category Category of the current instance. */
    public $category;

    /** @type array $errors Array of errors on the current instance. */
    public $errors = [];

    /**
     * @param string $title
     * @param string $author
     * @param string $pages
     * @param string $category
     * 
     * @return void
     */
    public function __construct($title, $author, $pages, $category)
    {
        $this->title = $title;
        $this->author = $author;
        $this->pages = $pages;
        $this->category = $category;
    }

    /**
     * Validates the properties on the book and adds error(s) to the $errors array if the field is null.
     * 
     * @return boolean 
     */
    public function validate()
    {
        $this->errors = [];
        $errors_list = [];
        if ($this->title == null) {
            $errors_list['title'] = "Property 'title' must not be null.";
        }
        if ($this->author == null) {
            $errors_list['author'] = "Property 'author' must not be null.";
        }
        if ($this->pages == null) {
            $errors_list['pages'] = "Property 'pages' must not be null.";
        }
        if ($this->category == null) {
            $errors_list['category'] = "Property 'category' must not be null.";
        }
        if (count($errors_list) > 0) {
            $this->setErrors($errors_list);
            return false;
        }
        return true;
    }

    /**
     * @param array $error Errors on the current instance.
     * 
     * @return array 
     */
    public function setErrors(array $error): array
    {
        $this->errors = array_merge($this->errors, $error);
        return $this->errors;
    }
}
