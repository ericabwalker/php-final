<?php

class Book
{
    public $bookID;
    public $title;
    public $author;
    public $pages;
    public $category;
    public $database;

    function __construct()
    {
        try {
            $this->database = new PDO('mysql:dbname=bookList;host=127.0.0.1', 'root', '');
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    //uses a namespace

    public static function find(int $bookID): ?Book
    {
        $book = new static();
        $sql = 'SELECT title, author, pages, category FROM Books WHERE bookID = ?';
        $statement = $book->database->prepare($sql);
        $statement->execute([$bookID]);
        $row = $statement->fetch();
        if ($row === false) {
            return null;
        }
        $book->title = $row['title'];
        $book->author = $row['author'];
        $book->pages = $row['pages'];
        $book->category = $row['category'];
        return $book;
    }

    //make this a static method 
    public function findAll()
    {
        $sql = 'SELECT title, author, pages, category FROM Books ORDER BY title';
        $statement = $this->database->query($sql);
        foreach ($this->database->query($sql) as $row) {
            print $row['title'] . "\t";
            print $row['author'] . "\t";
            print $row['pages'] . "\t";
            print $row['category'] . "\t";
        }
    }

    //Inserts or updates a record into the database using a save() method on the model
    //check to see if record exists first, then create new? and if it already exists then update?
    public function save()
    {
    }

    //Deletes the record from the database using a destroy() method on the model
    public function destroy()
    {
    }
}

var_export(new Book());
$testBook = new Book();
$testBook->findAll();
$testBook->find(1);
Book::find(2);
var_export(Book::find(1));






// Illustrates CRUD functions on a model (all database interaction should happen at the model layer)

// Validates properties on the model using a validate() function which returns true or false as to whether or not the 
// model is valid 

// The model's validate() function should feed data to an errors() function that returns an array of errors (if any)

// The model's save function should return true or false if a insert or update was successful, and should validate the 
// model prior to attempting to save. If the model is invalid, the save() should not complete and should return false.

// If a model does not save for some reason, the user should be returned to the create or update view and be shown 
// the errors.