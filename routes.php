<?php

use Ericabwalker\PHPfinal\Router;

$routes = [
    'GET' => [
        '/display' => 'BooksController@display_books',
        '/add' => 'BooksController@add_book_form',
        '/delete' => 'Books@display_titles',
        '/update/{$bookID}' => 'BooksController@display_one_book', //display book info in form 
    ],
    'POST' => [
        '/add' => 'BooksController@add_book',
        '/update/{$bookID}' => 'BooksController@update_book', //updates book in database
        '/delete' => 'BooksController@delete_book',
    ],
];



$router = new Router();
$router->get('/display', 'BooksController@display_books');
$router->get('/add', 'BooksController@add_book_form');
$router->execute($routes);

// $uri = $_SERVER['REQUEST_URI'];
// $method = $_SERVER['REQUEST_METHOD'];
