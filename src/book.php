<?php

namespace Models;
use PDO;
use PDOException; 

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

    public static function find(int $bookID): ?Book
    {
        $book = new static();
        $sql = 'SELECT title, author, pages, category FROM Books WHERE bookID = ?';
        $statement = $book->database->prepare($sql);
        $statement->execute([$bookID]);
        $book = $statement->fetch();
        if ($book === false) {
            return null;
        }
        $foundBook = new Book();
        $foundBook->bookID = $bookID;
        $foundBook->title = $book['title'];
        $foundBook->author = $book['author'];
        $foundBook->pages = $book['pages'];
        $foundBook->category = $book['category'];
        return $foundBook;
    }

    public static function findAll(): ?array
    {
        $book = new static();
        $sql = 'SELECT bookID, title, author, pages, category FROM Books ORDER BY title';
        $statement = $book->database->query($sql);
        $all_books = [];
        $all_books = $statement->fetchAll();
        return $all_books;
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

    public function destroy(int $bookID)
    {
        $sql = 'DELETE FROM Books WHERE bookID = ?';
        $statement = $this->database->prepare($sql);
        $statement->execute([$bookID]);
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