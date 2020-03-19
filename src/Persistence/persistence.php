<?php

namespace Ericabwalker\PHPfinal\Persistence;

use Ericabwalker\PHPfinal\Models\Book;

interface Persistence
{

    /**
     * @param int $bookID ID of the book to find.
     * 
     * @return Book|null
     */
    public function find(int $bookID): ?Book;

    /**
     * Finds all the books in the database, returns null if empty.
     * 
     * @return array|null
     */
    public function findAll(): ?array;

    /**
     * @param Book $book Book object to save in the database.
     * 
     * @return Book|null
     */
    public function save(Book $book): ?Book;

    /**
     * @param int $bookID ID of the book to delete. 
     */
    public function destroy(int $bookID);
}
