<?php
namespace Ericabwalker\PHPfinal;

use Ericabwalker\PHPfinal\Controllers\BooksController;

class Router
{
    public function get($uri, $action)
    {
    }

    public function execute($routes)
    {
        $method = $_SERVER['REQUEST_METHOD'];
        foreach ($routes[$method] as $uri => $action) {
            if ($uri == $_SERVER['REQUEST_URI']) {
                $method = explode('@', $action)[1];
                $controller = new BooksController();
                $controller->$method();
            }
        }
    }
}
