<?php

namespace Ericabwalker\PHPfinal\Repositories;

use Ericabwalker\PHPfinal\Models\Book;
use Ericabwalker\PHPfinal\Persistence\Persistence;

class BookRepository
{
    /** @type Ericabwalker\PHPfinal\Persistence\Persistence $persistence The current persistence. */
    private $persistence;

    /** 
     * @param Ericabwalker\PHPfinal\Persistence\Persistence $persistence The current persistence. 
     */
    public function __construct(Persistence $persistence)
    {
        $this->persistence = $persistence;
    }

    /**
     * @param int $bookID ID of book to find.
     * 
     * @return Book|null returns book object with given ID or null if book doesn't exist.
     */
    public function find(int $bookID): ?Book
    {
        return $this->persistence->find($bookID);
    }

    /**
     * Finds all the books in the database, returns null if empty.
     * 
     * @return array|null
     */
    public function findAll(): ?array
    {
        return $this->persistence->findAll();
    }

    /**
     * @param string $title Title of book to add to database.
     * @param string $author Author of book to add to database.
     * @param string $pages Pages of book to add to database.
     * @param string $category Category of book to add to database.
     * 
     * @return Book
     */
    public function save($title, $author, $pages, $category): Book
    {
        $book = new Book($title, $author, $pages, $category);
        if ($book->validate()) {
            return $this->persistence->save($book);
        }
        return $book;
    }

    /**
     * @param int $bookID ID of book to update.
     * @param string $title Title of book to update.
     * @param string $author Author of book to update.
     * @param string $pages Pages of book to update.
     * @param string $category Category of book to update.
     * 
     * @return Book
     */
    public function update(int $bookID, $title, $author, $pages, $category): Book
    {
        $book = new Book($title, $author, $pages, $category);
        $book->bookID = $bookID;
        if ($book->validate()) {
            return $this->persistence->save($book);
        }
        return $book;
    }

    /**
     * @param int $bookID ID of book to delete.
     * 
     * @return void
     */
    public function destroy(int $bookID)
    {
        return $this->persistence->destroy($bookID);
    }
}
