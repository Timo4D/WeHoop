<?php

namespace App\Core;

abstract class AbstractController {

    protected function render($view, $parameter){

        extract($parameter);
        //var_dump($parameter);
        require __DIR__ . "./../views/{$view}.php";
    }
}
