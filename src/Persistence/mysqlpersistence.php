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

    public function find(int $bookID): ?Book
    {
        $book = new Book();
        return $book;
    }

    public function save()
    {
    } //boolean?

    public function update()
    {
    }

    public function destroy()
    {
    }
}
