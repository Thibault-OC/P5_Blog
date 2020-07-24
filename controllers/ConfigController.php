<?php

namespace Controllers;
require_once('../P5/controllers/GlobalController.php');


use Models;


class ConfigController extends GlobalController
{

    function __construct()
    {
       /* $this->twigInit();*/
        $this->global = new GlobalController;

        $this->define_superglobals();

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