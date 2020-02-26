<?php

use Ericabwalker\PHPfinal\Router;

$routes = [
    'GET' => [
        '/display' => 'BooksController@display_books',
        '/add' => 'BooksController@add_book_form',
        '/delete' => 'BooksController@display_titles',
        '/update' => 'BooksController@display_one_book',
    ],
    'POST' => [
        '/add' => 'BooksController@add_book',
        '/update' => 'BooksController@update_book',
        '/delete' => 'BooksController@delete_book',
    ],
];

$router = new Router();
$router->execute($routes);
