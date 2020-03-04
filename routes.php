<?php

use Ericabwalker\PHPfinal\Router;

$routes = [
    'GET' => [
        '/display' => 'BooksController@displayBooks',
        '/add' => 'BooksController@addBookForm',
        '/delete' => 'BooksController@displayTitles',
        '/update' => 'BooksController@displayOneBook',
    ],
    'POST' => [
        '/add' => 'BooksController@addBook',
        '/update' => 'BooksController@updateBook',
        '/delete' => 'BooksController@deleteBook',
    ],
];

$router = new Router();
$router->execute($routes);
