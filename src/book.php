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

    public static function findAll()
    {
        $book = new static();
        $sql = 'SELECT title, author, pages, category FROM Books ORDER BY title';
        $statement = $book->database->query($sql);
        foreach ($statement as $row) {
            print $row['title'] . "\t";
            print $row['author'] . "\t";
            print $row['pages'] . "\t";
            print $row['category'] . "\t";
        }
    }


// The model's save function should return true or false if an insert or update was successful, and should validate the 
// model prior to attempting to save. If the model is invalid, the save() should not complete and should return false.

// If a model does not save for some reason, the user should be returned to the create or update view and be shown 
// the errors.
    public function save($title, $author, $pages, $category, $bookID = null)
    {
        if ($bookID == null) {
            $sql = 'INSERT INTO Books (title, author, pages, category) VALUES (?,?,?,?)';
            $statement = $this->database->prepare($sql);
            $statement->execute([$title, $author, $pages, $category]);
            return;
        } else {
            $sql = 'UPDATE Books SET title=?, author=?, pages=?, category=? WHERE bookID = ?';
            $statement = $this->database->prepare($sql);
            $statement->bindValue(":title", $title, PDO::PARAM_STR);
            $statement->bindValue(":author", $author, PDO::PARAM_STR);
            $statement->bindValue(":pages", $pages, PDO::PARAM_INT);
            $statement->bindValue(":category", $category, PDO::PARAM_STR);
            $statement->bindValue(":bookID", $bookID, PDO::PARAM_INT);
            $statement->execute([$title, $author, $pages, $category, $bookID]);
        }
    }

    public function destroy(string $title)
    {
        $sql = 'DELETE FROM Books WHERE title = ?';
        $statement = $this->database->prepare($sql);
        $statement->execute([$title]);
    }

    // Validates properties on the model using a validate() function which returns true or false as to 
    // whether or not the model is valid

    // The model's validate() function should feed data to an errors() function that returns an array 
    // of errors (if any)
    public function validate()
    {
        $validateBook = new Book();
        if (true) {
            return true;
        } else {
            $validateBook->errors();
            return false;
        }
    }

    public function errors(): ?array
    {
        $errors = [];
        return $errors;
    }
}


$testBook = new Book();
$testBook->findAll();
// $testBook->find(1);
// Book::find(2);
// var_export(Book::find(1));
// $testBook->destroy('Book Bacon BROKE');

$addBook = new Book();
$addBook->save('Pride and Prejudice', 'Jane Austen', 750, 'F', 16);
