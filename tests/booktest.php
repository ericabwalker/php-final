<?php

use Ericabwalker\PHPfinal\Models\Book;
use Ericabwalker\PHPfinal\Persistence\Persistence;
use Ericabwalker\PHPfinal\Repositories\BookRepository;
use \Mockery;

require_once 'vendor/autoload.php';

class BookTest extends PHPUnit\Framework\TestCase
{
    // /** @test */
    // public function confirms_book_cannot_have_empty_properties_in_order_to_be_valid()
    // {
    //     //Create a new object and assert that validation initially fails.
    //     $book = new Book();
    //     $book->validate();
    //     $this->assertFalse($book->validate());

    //     //Assert that an error exists for each particular property where validation is failing.
    //     $this->assertArrayHasKey('title', $book->errors);
    //     $this->assertArrayHasKey('author', $book->errors);
    //     $this->assertArrayHasKey('pages', $book->errors);
    //     $this->assertArrayHasKey('category', $book->errors);

    //     //One by one, set each required property correctly and assert that the error does not exist.
    //     $faker = Faker\Factory::create();
    //     $book->title = $faker->sentence;
    //     $book->validate();
    //     $this->assertArrayNotHasKey('title', $book->errors);

    //     $book->author = $faker->name;
    //     $book->validate();
    //     $this->assertArrayNotHasKey('author', $book->errors);

    //     $book->pages = $faker->numberBetween($min = 100, $max = 999);
    //     $book->validate();
    //     $this->assertArrayNotHasKey('pages', $book->errors);

    //     $book->category = $faker->randomElement($array = array('F', 'NF'));
    //     $book->validate();
    //     $this->assertArrayNotHasKey('category', $book->errors);

    //     //When all required properties are set, assert that validation passes.
    //     $this->assertTrue($book->validate());
    // }

    // /** @test */
    // public function confirms_save_and_destroy_methods_are_inserting_updating_and_deleting_in_the_database_correctly()
    // {
    //     // Assert that the model's database table is empty, or note the number of records.
    //     $recordsInDatabase = count(Book::findAll());

    //     // Create a new object, populate the properties with Faker and call save(); 
    //     // assert that the record was inserted into the database.
    //     $book = new Book();
    //     $faker = Faker\Factory::create();
    //     $book->title = $faker->sentence;
    //     $book->author = $faker->name;
    //     $book->pages = $faker->numberBetween($min = 100, $max = 999);
    //     $book->category = $faker->randomElement($array = array('F', 'NF'));
    //     $book->save();
    //     $newRecordsTotal = $recordsInDatabase + 1;
    //     $this->assertCount($newRecordsTotal, Book::findAll());
    //     $this->assertNotNull(Book::find($book->bookID));


    //     // Update the object and call save(); assert that the data in relevant table row has been 
    //     // updated correctly AND that no additional records were inserted.
    //     $clonedBook = new Book();
    //     $clonedBook->bookID = $book->bookID;
    //     $clonedBook->title = $book->title;
    //     $clonedBook->author = $book->author;
    //     $clonedBook->pages = $book->pages;
    //     $clonedBook->category = $book->category;

    //     $book->title = $faker->sentence;
    //     $book->author = $faker->name;
    //     $book->pages = $faker->numberBetween($min = 100, $max = 999);
    //     if ($book->category == "F") {
    //         $book->category = "NF";
    //     } else {
    //         $book->category = "F";
    //     }
    //     $book->save();

    //     $this->assertSame($clonedBook->bookID, $book->bookID);
    //     $this->assertNotSame($clonedBook->title, $book->title);
    //     $this->assertNotSame($clonedBook->author, $book->author);
    //     $this->assertNotSame($clonedBook->pages, $book->pages);
    //     $this->assertNotSame($clonedBook->category, $book->category);
    //     $this->assertCount($newRecordsTotal, Book::findAll());


    //     // Call the destroy() method on the model and assert that the record has been removed from the database table.
    //     $this->assertNotNull(Book::find($book->bookID));
    //     $book->destroy();
    //     $deletedRecordsTotal = $newRecordsTotal - 1;

    //     $this->assertNull(Book::find($book->bookID));
    //     $this->assertCount($deletedRecordsTotal, Book::findAll());
    // }

    /** @test */
    public function tests_injection_of_mock_dao_find_method()
    {
        //find
        $mock_persistence = Mockery::mock(Persistence::class);
        $mock_persistence->shouldReceive('find')->with(123)->andReturns(new Book('Title', 'Author', '450', 'F'));
        $book_repo = new BookRepository($mock_persistence);
        $book = $book_repo->find(123);
        $expected_title = $book->title;
        $expected_author = $book->author;
        $expected_pages = $book->pages;
        $expected_category = $book->category;
        $this->assertEquals('Title', $expected_title);
        $this->assertEquals('Author', $expected_author);
        $this->assertEquals('450', $expected_pages);
        $this->assertEquals('F', $expected_category);
    }

    /** @test */
    public function tests_injection_of_mock_dao_findAll_method()
    {
        //findAll
        $mock_persistence = Mockery::mock(Persistence::class);
        $book_repo = new BookRepository($mock_persistence);
        $mock_persistence->allows([
            "findAll" => [new Book('Jane Eyre', 'Charlotte Bronte', '500', 'F'), new Book(
                'Wuthering Heights',
                'Emily Bronte',
                '575',
                'F'
            )],
        ]);
        $books = $book_repo->findAll();
        $this->assertCount(2, $books);
    }


    /** @test */
    public function tests_injection_of_mock_dao_save_method()
    {
        //save
        $mock_persistence = Mockery::mock(Persistence::class);
        $book_repo = new BookRepository($mock_persistence);
        $book = new Book('New Title', 'New Author', '4500', 'NF');
        $mock_persistence->shouldReceive('save')->withAnyArgs()->andReturns($book);
        $received_book = $book_repo->save('New Title', 'New Author', '4500', 'NF');
        $this->assertEquals($book, $received_book);
    }

    /** @test */
    public function tests_injection_of_mock_dao_update_method()
    {
        //update
        $mock_persistence = Mockery::mock(Persistence::class);
        $book_repo = new BookRepository($mock_persistence);
        $book = new Book('New Title', 'New Author', '4500', 'NF');
        $book->bookID = 123;
        $mock_persistence->shouldReceive('save')->withAnyArgs()->andReturns($book);
        $received_book = $book_repo->update(123, 'New Title2', 'New Author2', '45002', 'F');
        $this->assertEquals($book, $received_book);
    }

    /** @test */
    public function tests_injection_of_mock_dao_destroy_method()
    {
        //destroy
        $mock_persistence = Mockery::mock(Persistence::class);
        $book_repo = new BookRepository($mock_persistence);
        $book = new Book('Title', 'Author', '450', 'F');
        $book->bookID = 123;
        $mock_persistence->shouldReceive('destroy')->with($book->bookID);
        $book_repo->destroy(123);
    }
}
