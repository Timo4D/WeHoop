<?php

require __DIR__ . "./../autoloader.php";

$container = new \App\Core\Container();

function html(string $str):string{

    $string = htmlentities($str, ENT_QUOTES, 'UTF-8');
    $string2 = str_replace('&lt;br /&gt;', '<br>', $string);

    return $string2;
}