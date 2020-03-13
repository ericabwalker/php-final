<?php
namespace Ericabwalker\PHPfinal\Controllers;

use Ericabwalker\PHPfinal\Models\Book;
use Ericabwalker\PHPfinal\Persistence\MySQLPersistence;
// use Ericabwalker\PHPfinal\Persistence\MySQLPersistence;
use Ericabwalker\PHPfinal\Repositories\BookRepository;

class BooksController
{
    public function getBookID()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $explosion = explode('?', $uri);
        return explode("=", $explosion[1])[1];
    }

    public function addBook()
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

    public function displayBooks()
    {
        // $result = Book::findAll();
        $mysql = new MySQLPersistence();
        $repo = new BookRepository($mysql);
        $result = $repo->findAll();
        $this->view('display', ["books" => $result]);
    }

    public function displayTitles()
    {
        $this->view('delete');
        $books = new Book;
        return $books->findAll();
    }

    public function deleteBook()
    {
        $book = new Book();
        $book->bookID = $_POST['Books'][0];
        $book->destroy();
        header("Location: /display");
    }

    public function displayOneBook()
    {
        $bookID = $this->getBookID();
        $book_to_update = Book::find($bookID);
        $this->view('update', ["book" => $book_to_update]);
    }

    public function updateBook()
    {
        $updatedbook = new Book();
        $updatedbook->bookID = $this->getBookID();
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

    public function addBookForm()
    {
        $this->view('add');
    }

    public function view($page, $data = [], $errors = [])
    {
        extract($data);
        include_once __DIR__ . '/../../resources/' . $page . '.php';
    }
}
