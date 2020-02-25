<?php
use Models\Book;
// require '../src/book.php';



class Controller
{
    //call validate on book 
    //if invalid then return errors, if valid then save and return empty errors[]
    function add_book($title, $author, $pages, $category)
    {
        $new_book = new Book();
        $new_book->save($title, $author, $pages, $category);
    }

    function display_books()
    {
        $books = new Book;
        $all_books = [];
        $all_books = $books->findAll();
        $display_books = [];
        foreach ($all_books as $row) {
            $title = $row['title'];
            $author = $row['author'];
            $pages = $row['pages'];
            $category = $row['category'];
            $bookID = $row['bookID'];
            array_push($display_books, [$title, $author, $pages, $category, $bookID]);
        }
        return $display_books;
    }

    function display_titles()
    {
        $books = new Book;
        return $books->findAll();
    }

    function delete_book($bookID)
    {
        $book = new Book();
        $book->destroy($bookID);
    }

    function display_one_book(int $bookID): ?Book 
    {
        $book = new Book();
        return $book->find($bookID);
    }

    function update_book($title, $author, $pages, $category, $bookID=null)
    {
        $book = new Book();
        $book->save($title, $author, $pages, $category, $bookID);
    }
}
