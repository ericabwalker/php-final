<?php

namespace Ericabwalker\PHPfinal\Persistence;

use Ericabwalker\PHPfinal\Models\Book;

use PDO;
use PDOException;

class MySQLPersistence implements Persistence
{
    public $database;

    public function __construct()
    {
        try {
            $this->database = new PDO('mysql:dbname=bookList;host=mysql', 'modules', 'secret');
        } catch (PDOException $e) {
            $this->database = new PDO('mysql:dbname=bookList;host=localhost:3307', 'modules', 'secret');
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    public function findAll(): ?array
    {
        $sql = 'SELECT bookID, title, author, pages, category FROM Books ORDER BY title';
        $statement = $this->database->query($sql);
        $all_books = [];
        $all_books = $statement->fetchAll();
        return $all_books;
    }

    public function find($bookID): ?Book
    {
        $sql = 'SELECT title, author, pages, category FROM Books WHERE bookID = ?';
        $statement = $this->database->prepare($sql);
        $statement->execute([$bookID]);
        $find_result = $statement->fetch();
        if ($find_result === false) {
            return null;
        }
        $foundBook = new Book($find_result['title'], $find_result['author'], $find_result['pages'], $find_result['category']);
        $foundBook->bookID = $bookID;
        return $foundBook;
    }

    public function save(Book $book): ?Book
    {
        if ($book->bookID == null) {
            $sql = 'INSERT INTO Books (title, author, pages, category) VALUES (?,?,?,?)';
            $statement = $this->database->prepare($sql);
            $this->database->beginTransaction();
            $statement->execute([$book->title, $book->author, $book->pages, $book->category]);
            $this->bookID = $this->database->lastInsertId();
            $this->database->commit();
        } else {
            $result = $this->find($book->bookID);
            if ($result == null) {
                $book->setErrors(['bookID' => "Book with ID " . $this->bookID . " not found."]);
                return $book;
            }
            $sql = 'UPDATE Books SET title=?, author=?, pages=?, category=? WHERE bookID = ?';
            $statement = $this->database->prepare($sql);
            $statement->bindValue(":title", $this->title, PDO::PARAM_STR);
            $statement->bindValue(":author", $this->author, PDO::PARAM_STR);
            $statement->bindValue(":pages", $this->pages, PDO::PARAM_INT);
            $statement->bindValue(":category", $this->category, PDO::PARAM_STR);
            $statement->bindValue(":bookID", $this->bookID, PDO::PARAM_INT);
            $statement->execute([$book->title, $book->author, $book->pages, $book->category, $book->bookID]);
        }
        return $book;
    }

    public function destroy(int $bookID)
    {
        $sql = 'DELETE FROM Books WHERE bookID = ?';
        $statement = $this->database->prepare($sql);
        $statement->execute([$bookID]);
    }
}
