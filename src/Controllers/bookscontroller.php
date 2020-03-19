<?php
namespace Ericabwalker\PHPfinal\Controllers;

use Ericabwalker\PHPfinal\Persistence\MySQLPersistence;
use Ericabwalker\PHPfinal\Repositories\BookRepository;

class BooksController
{   
    /** @type Ericabwalker\PHPfinal\Repositories\BookRepository $repo */
    private $repo;

    public function __construct()
    {
        $this->repo = new BookRepository(new MySQLPersistence());
    }

    /**
     * Helper method to get the bookID off of the Request URI.
     * 
     * @return int Returns the bookID from the Request URI.
     */
    public function getBookID()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $explosion = explode('?', $uri);
        return explode("=", $explosion[1])[1];
    }

    /**
     * Method to add a new book to the database. If there are errors it displays the errors on the page but if the
     * book is added successfully, then it redirects to the Display page. 
     */
    public function addBook()
    {
        $new_book = $this->repo->save($_POST['title'], $_POST['author'], $_POST['pages'], $_POST['category']);
        if (count($new_book->errors) > 0) {
            return $this->view('add', ["book" => $new_book], $new_book->errors);
        }
        header("Location: display");
    }

    /**
     * Gets all of the books with all info to display on the Display page. 
     */
    public function displayBooks()
    {
        $this->view('display', ["books" => $this->repo->findAll()]);
    }

    /**
     * Gets all of the titles to display in the dropdown menu on the Delete page. 
     */
    public function displayTitles()
    {
        $this->view('delete');
        return $this->repo->findAll();
    }

    /**
     * Method to delete a book from the database and then redirects to the Display page after deletion. 
     */
    public function deleteBook()
    {
        $bookID = $_POST['Books'][0];
        $this->repo->destroy($bookID);
        header("Location: /display");
    }

    /**
     * Displays the information about the book that will be updated on the Update page. 
     */
    public function displayOneBook()
    {
        $bookID = $this->getBookID();
        $book_to_update = $this->repo->find($bookID);
        $this->view('update', ["book" => $book_to_update]);
    }

    /**
     * Method to update an existing book in the database. If there are errors it displays the errors on the page but if the
     * book is updated successfully, then it redirects to the Display page. 
     */
    public function updateBook()
    {
        $update_result = $this->repo->update($this->getBookID(), $_POST['title'], $_POST['author'], $_POST['pages'], $_POST['category']);
        if (count($update_result->errors) > 0) {
            return $this->view('update', ["book" => $update_result], $update_result->errors);
        } else {
            header("Location: /display");
        }
    }

    /**
     * Display for the Add page. (Method provided to the Routes file for the 'GET' request on /add)
     */
    public function addBookForm()
    {
        $this->view('add');
    }

    /**
     * Helper method to load a view based on page name. 
     * 
     * @param string $page Filename. 
     * @param array $data An array of data passed to the view.
     * @param array $errors An array of errors passed to the view.
     * 
     */
    public function view($page, $data = [], $errors = [])
    {
        extract($data);
        include_once __DIR__ . '/../../resources/' . $page . '.php';
    }
}
