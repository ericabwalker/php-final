<?php

namespace Ericabwalker\PHPfinal\Persistence;

use Ericabwalker\PHPfinal\Models\Book;

interface Persistence
{

    public function find(int $bookID): ?Book;

    public function findAll(): ?array;

    public function save(); //boolean?

    public function update();

    public function destroy();

    //validate and/or setErrors methods?

}
