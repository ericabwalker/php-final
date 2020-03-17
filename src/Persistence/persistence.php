<?php

namespace Ericabwalker\PHPfinal\Persistence;

use Ericabwalker\PHPfinal\Models\Book;
use phpDocumentor\Reflection\Types\Boolean;

interface Persistence
{

    public function find(int $bookID): ?Book;

    public function findAll(): ?array;

    public function save(Book $book): ?Book;

    public function destroy(int $bookID);
}
