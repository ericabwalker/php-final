<?php

require 'src/book.php';

//call validate on book 
//if invalid then return errors, if valid then save and return empty errors[]

class Controller
{
    function add_book($title, $author, $pages, $category)
    {
        $new_book = new Book();
        $new_book->save($title, $author, $pages, $category);
    }

    function display_books() {
        $books = new Book;
        $all_books = [];
        $all_books = $books->findAll();
        $display_books = [];
        foreach($all_books as $row) {
            $title = $row['title'];
            $author = $row['author'];
            $pages = $row['pages'];
            $category = $row['category'];
            array_push($display_books, [$title, $author, $pages, $category]);
        }
        return $display_books;
    }
}
