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

        '/WeHoop/home' => [
            'controller' => 'homeController',
            'method' => 'showStart'
        ],

        '/creategame' => [
            'controller' => 'gameController',
            'method' => 'creategame'
        ],

        '/searchgame' => [
            'controller' => 'gameController',
            'method' => 'searchgame'
        ],

        '/submittgame' => [
            'controller' => 'gameController',
            'method' => 'submittgame'
        ],

        '/joingame' => [
            'controller' => 'gameController',
            'method' => 'joingame'
        ],

        '/reviewgame' => [
            'controller' => 'gameController',
            'method' => 'reviewGame'
        ],

        '/WeHoop/uploadProfilePic' => [
            'controller' => 'userController',
            'method' => 'uploadProfilePic'
        ],

        '/uploadProfilePic' => [
            'controller' => 'userController',
            'method' => 'uploadProfilePic'
        ],

        '/WeHoop/profile' => [
            'controller' => 'userController',
            'method' => 'profile'
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

        '/creategame' => [
            'controller' => 'gameController',
            'method' => 'test'
        ],

    ];
}


if (isset($routes[$pathinfo])){
$route = $routes[$pathinfo];
$controller = $container->make($route['controller']);
$method = $route['method'];
$controller->$method();
}