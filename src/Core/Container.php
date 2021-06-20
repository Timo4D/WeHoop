<?php

namespace App\Core;

use App\Home\HomeController;
use App\Home\HomeRepository;
use App\User\LoginService;
use App\User\UserRepository;
use App\User\UserController;

use PDO;

class Container{

    private $instance = [];
    private $buildguide = [];

    public function __construct() {


        $this->buildguide = [

            'loginService' => function() {
                return new LoginService($this->make('userRepository'));
            },



            'userController' => function(){
                return new UserController($this->make('loginService'));
            },
            'userRepository' => function () {
                return new UserRepository($this->make("pdo"));
            },

            'homeController' => function(){
                return new HomeController($this->make('homeRepository'));
            },
            'homeRepository' => function () {
                return new HomeRepository($this->make("pdo"));
            },

            'pdo' => function () {
                $pdo = new PDO('mysql:host=localhost;dbname=wehoop;charset=utf8', 'wehoop', 'geheim');
                $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                return $pdo;
            }
        ];

    }


    public function make($name)
    {
        if (!empty($this->instance[$name])) {
            return $this->instance[$name];
        }
        if (isset($this->buildguide[$name])) {
            $this->instance[$name] = $this->buildguide[$name]();
        }
        return $this->instance[$name];
    }

}
