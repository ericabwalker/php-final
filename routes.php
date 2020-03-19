<?php

use Ericabwalker\PHPfinal\Router;

/** @type array $routes Multidimensional array of routes for 'GET' and 'POST' requests. */
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

/** @type Router $router Instance of Router object */
$router = new Router();
$router->execute($routes);
