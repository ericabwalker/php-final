<?php

namespace Ericabwalker\PHPfinal;

use Ericabwalker\PHPfinal\Controllers\BooksController;

class Router
{
    /**
     * @param array $routes Multidimensional array of routes for 'GET' and 'POST' requests. 
     * 
     * @return void 
     */
    function execute($routes)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        $requestURI = $_SERVER['REQUEST_URI'];
        foreach ($routes[$method] as $uri => $action) {
            $explosion = explode('?', $requestURI);
            if ($uri == $explosion[0]) {
                $result = explode('@', $action)[1];
                $controller = new BooksController();
                $controller->$result();
            }
        }
    }
}
