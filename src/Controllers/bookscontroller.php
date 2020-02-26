<?php

namespace Ericabwalker\PHPfinal\Controllers;

use Ericabwalker\PHPfinal\Models\Book;

class BooksController
{
    //call validate on book 
    //if invalid then return errors, if valid then save and return empty errors[]
    function add_book()
    {
        $new_book = new Book();
        $title = $_POST['title'];
        $author = $_POST['author'];
        $pages = $_POST['pages'];
        $category = $_POST['category'];
        $new_book->save($title, $author, $pages, $category);
        header("Location: /display");
    }

    function display_books()
    {
        $book = new Book();
        $result = $book->findAll();
        $this->view('display', ["books" => $result]);
    }

    function display_titles()
    {
        $this->view('delete');
        $books = new Book;
        return $books->findAll();
    }

    function delete_book()
    {
        $book = new Book();
        $bookID = $_POST['Books'][0];
        $book->destroy($bookID);
        header("Location: /display");
    }

    function display_one_book()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $explosion = explode('?', $uri);
        $bookID = explode("=", $explosion[1]);
        $book = new Book();
        $book_to_update = $book->find($bookID[1]);
        $this->view('update', ["book" => $book_to_update]);
    }

    function update_book()
    {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $pages = $_POST['pages'];
        $category = $_POST['category'];
        $uri = $_SERVER['REQUEST_URI'];
        $explosion = explode('?', $uri);
        $bookID = explode("=", $explosion[1]);
        $book = new Book();
        $book->save($title, $author, $pages, $category, $bookID[1]);
        header("Location: /display");
    }

    function add_book_form()
    {
        $this->view('add');
    }

    function view($page, $data = [])
    {
        extract($data);
        include_once __DIR__ . '/../../resources/' . $page . '.php';
    }
}
