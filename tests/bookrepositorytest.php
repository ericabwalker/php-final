<?php

use Ericabwalker\PHPfinal\Models\Book;
use Ericabwalker\PHPfinal\Persistence\Persistence;
use Ericabwalker\PHPfinal\Repositories\BookRepository;
use \Mockery;

require_once 'vendor/autoload.php';

class BookRepositoryTest extends PHPUnit\Framework\TestCase
{
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
