<?php

namespace Ericabwalker\PHPfinal\Repositories;

use Ericabwalker\PHPfinal\Persistence\MySQLPersistence;

class BookRepository
{
    private $persistence;

    public function __construct(MySQLPersistence $persistence)
    {
        $this->persistence = $persistence;
    }

    public function findAll(): ?array
    {
        return $this->persistence->findAll();
    }
}
