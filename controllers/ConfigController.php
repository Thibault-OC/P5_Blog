<?php

namespace Controllers;

require('../P5/controllers/GlobalController.php');

use Models;


class ConfigController
{

    function __construct()
    {
       /* $this->twigInit();*/
        $this->global = new GlobalController;
    }

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