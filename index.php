<?php

session_start();


require __DIR__ . "/src/init.php";

if(!isset($_SERVER['PATH_INFO'])){
$pathinfo = $_SERVER['REQUEST_URI'];
}else {
$pathinfo =  $_SERVER['PATH_INFO'];
}

//$pathinfo = $_SERVER['PATH_INFO'];

if(!empty($_SESSION['username'])) {
    $routes = [
        '/index' => [
            'controller' => 'homeController',
            'method' => 'showStart'
        ],
        '/WeHoop/' => [
            'controller' => 'homeController',
            'method' => 'showStart'
        ],
        '/login' => [
            'controller' => 'userController',
            'method' => 'login'
        ],
        '/register' => [
            'controller' => 'userController',
            'method' => 'register'
        ],

        '/logout' => [
            'controller' => 'userController',
            'method' => 'logout'
        ],

        '/home' => [
            'controller' => 'homeController',
            'method' => 'showStart'
        ],

    ];
} else {
    $routes = [
        '/index' => [
            'controller' => 'userController',
            'method' => 'login'
        ],
        '/WeHoop/' => [
            'controller' => 'userController',
            'method' => 'login'
        ],
        '/login' => [
            'controller' => 'userController',
            'method' => 'login'
        ],
        '/register' => [
            'controller' => 'userController',
            'method' => 'register'
        ],

        '/logout' => [
            'controller' => 'userController',
            '   method' => 'logout'
        ],

        '/home' => [
            'controller' => 'homeController',
            'method' => 'showStart'
        ],

    ];
}


if (isset($routes[$pathinfo])){
$route = $routes[$pathinfo];
$controller = $container->make($route['controller']);
$method = $route['method'];
$controller->$method();
}