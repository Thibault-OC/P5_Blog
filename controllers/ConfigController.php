<?php

namespace Controllers;

use Models;


class ConfigController
{

    /*function __construct()
    {
        $this->twigInit();
    }*/

    static function render($view , $variables)
    {
        $loader = new \Twig\Loader\FilesystemLoader('views');

        $twig = new \Twig\Environment($loader, [
            'cache' => false,
            

        ]);
        $twig->addGlobal('session', $_SESSION);

        echo $twig->render($view , $variables);

    }


    static function get($name){
        return $_GET[$name];
    }

}