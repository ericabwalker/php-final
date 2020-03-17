<?php

namespace Ericabwalker\PHPfinal\Models;

class Book
{
    public $bookID;
    public $title;
    public $author;
    public $pages;
    public $category;
    public $errors = [];

    public function __construct($title, $author, $pages, $category)
    {
        $this->title = $title;
        $this->author = $author;
        $this->pages = $pages;
        $this->category = $category;
    }

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

    public function setErrors($error): ?array
    {
        $this->errors = array_merge($this->errors, $error);
        return $this->errors;
    }
}
