<?php

namespace Ericabwalker\PHPfinal;

use Ericabwalker\PHPfinal\Controllers\BooksController;

class Router
{
    public function get($uri, $action)
    {
    }

    function execute($routes)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        foreach ($routes[$method] as $uri => $action) {
            if ($uri == $_SERVER['REQUEST_URI']) {
                $result = explode('@', $action);
                $controller = new BooksController();
                $controller->$result[1];
            }
        }
    }
}
