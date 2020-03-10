<?php

use Ericabwalker\PHPfinal\Models\Book;

require_once 'vendor/autoload.php';

class BookTest extends PHPUnit\Framework\TestCase
{
    /** @test */
    public function confirmBookCannotHaveEmptyPropertiesInOrderToBeValid()
    {
        //Create a new object and assert that validation initially fails.
        $book = new Book();
        $this->assertFalse($book->validate());

        //Assert that an error exists for each particular property where validation is failing.
        $this->assertArrayHasKey('title', $book->errors);
        $this->assertArrayHasKey('author', $book->errors);
        $this->assertArrayHasKey('pages', $book->errors);
        $this->assertArrayHasKey('category', $book->errors);

        //One by one, set each required property correctly and assert that the error does not exist.
        $faker = Faker\Factory::create();
        $book->title = $faker->sentence;
        $book->validate();
        var_dump($book);
        $this->assertArrayNotHasKey('title', $book->errors);

        $book->author = $faker->name;
        $book->validate();
        $this->assertArrayNotHasKey('author', $book->errors);

        $book->pages = $faker->numberBetween($min = 100, $max = 999);
        $book->validate();
        $this->assertArrayNotHasKey('pages', $book->errors);

        $book->category = $faker->randomElement($array = array ('F','NF'));
        $book->validate();
        $this->assertArrayNotHasKey('category', $book->errors);

        //When all required properties are set, assert that validation passes.
        $this->assertTrue($book->validate());
    }
}
