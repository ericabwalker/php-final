<?php

namespace Ericabwalker\PHPfinal\Models;

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
            $this->database = new PDO('mysql:dbname=bookList;host=mysql', 'modules', 'secret');
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

    public function save()
    {
        if ($this->validate()) {
            if ($this->bookID == null) {
                $sql = 'INSERT INTO Books (title, author, pages, category) VALUES (?,?,?,?)';
                $statement = $this->database->prepare($sql);
                $statement->execute([$this->title, $this->author, $this->pages, $this->category]);
            } else {
                $sql = 'UPDATE Books SET title=?, author=?, pages=?, category=? WHERE bookID = ?';
                $statement = $this->database->prepare($sql);
                $statement->bindValue(":title", $this->title, PDO::PARAM_STR);
                $statement->bindValue(":author", $this->author, PDO::PARAM_STR);
                $statement->bindValue(":pages", $this->pages, PDO::PARAM_INT);
                $statement->bindValue(":category", $this->category, PDO::PARAM_STR);
                $statement->bindValue(":bookID", $this->bookID, PDO::PARAM_INT);
                $statement->execute([$this->title, $this->author, $this->pages, $this->category, $this->bookID]);
            }
            return true;
        } else {
            return false;
        }
    }

    public function destroy(int $bookID)
    {
        $sql = 'DELETE FROM Books WHERE bookID = ?';
        $statement = $this->database->prepare($sql);
        $statement->execute([$bookID]);
    }

    // The model's validate() function should feed data to an errors() function that returns an array 
    // of errors (if any)
    public function validate()
    {
        $errors = [];
        if ($this->title == null) {
            $errors[] = "Property 'title' must not be null.";
        }
        if ($this->author == null) {
            $errors[] = "Property 'author' must not be null.";
        }
        if ($this->pages == null) {
            $errors[] = "Property 'pages' must not be null.";
        }
        if ($this->category == null) {
            $errors[] = "Property 'category' must not be null.";
        }
        if (count($errors) == 0) {
            return true;
        } else {
            $this->errors($errors);
            return false;
        }
    }

    public function errors(): ?array
    {
        $errors = [];
        return $errors;
    }
}
