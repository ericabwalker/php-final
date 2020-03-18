<?php

namespace Ericabwalker\PHPfinal\Repositories;

use Ericabwalker\PHPfinal\Models\Book;
use Ericabwalker\PHPfinal\Persistence\Persistence;

class BookRepository
{
    private $persistence;

    public function __construct(Persistence $persistence)
    {
        $this->persistence = $persistence;
    }

    public function find(int $bookID): ?Book
    {
        return $this->persistence->find($bookID);
    }

    public function findAll(): ?array
    {
        return $this->persistence->findAll();
    }

    public function save($title, $author, $pages, $category)
    {
        $book = new Book($title, $author, $pages, $category);
        if ($book->validate()) {
            return $this->persistence->save($book);
        }
        return $book;
    }

    public function update($bookID, $title, $author, $pages, $category)
    {
        $book = new Book($title, $author, $pages, $category);
        $book->bookID = $bookID;
        if ($book->validate()) {
            return $this->persistence->save($book);
        }
        return $book;
    }

    public function destroy(int $bookID)
    {
        return $this->persistence->destroy($bookID);
    }
}
