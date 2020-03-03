<?php

namespace Ericabwalker\PHPfinal\Controllers;

use Ericabwalker\PHPfinal\Models\Book;

class BooksController
{
    function get_book_id()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $explosion = explode('?', $uri);
        return explode("=", $explosion[1])[1];
    }

    function add_book()
    {
        $new_book = new Book();
        $new_book->title = $_POST['title'];
        $new_book->author = $_POST['author'];
        $new_book->pages = $_POST['pages'];
        $new_book->category = $_POST['category'];
        $result = $new_book->save();
        if ($result === false) {
            return $this->view('add', ["book" => $new_book], $new_book->errors);
        }
        header("Location: display");
    }

    function display_books()
    {
        $result = Book::findAll();
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
        $book->bookID = $_POST['Books'][0];
        $book->destroy();
        header("Location: /display");
    }

    function display_one_book()
    {
        $bookID = $this->get_book_id();
        $book_to_update = Book::find($bookID);
        $this->view('update', ["book" => $book_to_update]);
    }

    function update_book()
    {
        $updatedbook = new Book();
        $updatedbook->bookID = $this->get_book_id();
        $updatedbook->title = $_POST['title'];
        $updatedbook->author = $_POST['author'];
        $updatedbook->pages = $_POST['pages'];
        $updatedbook->category = $_POST['category'];
        $update_result = $updatedbook->update();
        if ($update_result == false) {
            return $this->view('update', ["book" => $updatedbook], $updatedbook->errors);
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
