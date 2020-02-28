<?php

namespace Ericabwalker\PHPfinal\Controllers;

use Ericabwalker\PHPfinal\Models\Book;

class BooksController
{
    function add_book()
    {
        $title = $_POST['title'];
        $author = $_POST['author'];
        $pages = $_POST['pages'];
        $category = $_POST['category'];
        $new_book = new Book();
        $new_book->title = $title;
        $new_book->author = $author;
        $new_book->pages = $pages;
        $new_book->category = $category;
        $result = $new_book->save();
        if ($result === false) {
            return $this->view('add', [], $new_book->errors);
        }
        header("Location: display");
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
        $updatedbook = new Book();
        $updatedbook->bookID = $bookID[1];
        $updatedbook->title = $title;
        $updatedbook->author = $author;
        $updatedbook->pages = $pages;
        $updatedbook->category = $category;
        $result = $updatedbook->save();
        if ($result === false) {
            return $this->view('update', [], $updatedbook->errors);
        } else {
            header("Location: /display");
        }
    }

    function add_book_form()
    {
        $this->view('add');
    }

    function view($page, $data = [], $errors = [])
    {
        extract($data);
        include_once __DIR__ . '/../../resources/' . $page . '.php';
    }
}
