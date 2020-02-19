<?php

require 'src/book.php';

//validate on book 
//handle invalid case, if valid then save 

class Controller
{
    function add_book($title, $author, $pages, $category)
    {
        $new_book = new Book();
        $new_book->save($title, $author, $pages, $category);
    }
}
