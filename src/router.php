<?php
namespace Ericabwalker\PHPfinal;

class Router 
{
    public $uri;
    public $action;
    public $method;
    public $routes;

    function get($uri, $action) {

        // return 
        // echo $uri . " " . $action;

    }

    function execute($routes) {
        foreach($routes as $method => $route) {
            if($method == $_SERVER['REQUEST_METHOD']) {
                var_dump($route);
            }
        } 
    }

    
}

//outer array [GET, [uri, function]]

// $uri = $_SERVER['REQUEST_URI'];
// $method = $_SERVER['REQUEST_METHOD'];