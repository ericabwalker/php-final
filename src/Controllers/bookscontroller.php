<?php
namespace Ericabwalker\PHPfinal\Controllers;

use Ericabwalker\PHPfinal\Persistence\MySQLPersistence;
use Ericabwalker\PHPfinal\Repositories\BookRepository;

class BooksController
{   
    private $repo;

    public function __construct()
    {
        $this->repo = new BookRepository(new MySQLPersistence());
    }

    public function getBookID()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $explosion = explode('?', $uri);
        return explode("=", $explosion[1])[1];
    }

    public function addBook()
    {
        $new_book = $this->repo->save($_POST['title'], $_POST['author'], $_POST['pages'], $_POST['category']);
        if (count($new_book->errors) > 0) {
            return $this->view('add', ["book" => $new_book], $new_book->errors);
        }
        header("Location: display");
    }

    public function displayBooks()
    {
        $this->view('display', ["books" => $this->repo->findAll()]);
    }

    public function displayTitles()
    {
        $this->view('delete');
        return $this->repo->findAll();
    }

    public function deleteBook()
    {
        $bookID = $_POST['Books'][0];
        $this->repo->destroy($bookID);
        header("Location: /display");
    }

    public function displayOneBook()
    {
        $bookID = $this->getBookID();
        $book_to_update = $this->repo->find($bookID);
        $this->view('update', ["book" => $book_to_update]);
    }

    public function updateBook()
    {
        $update_result = $this->repo->update($this->getBookID(), $_POST['title'], $_POST['author'], $_POST['pages'], $_POST['category']);
        if (count($update_result->errors) > 0) {
            return $this->view('update', ["book" => $update_result], $update_result->errors);
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
