<?php

namespace Controllers;
require_once('../P5/controllers/GlobalController.php');


use Models;


class ConfigController extends GlobalController
{
    public $vars;

    
    function __construct()
    {

        $this->twigInit();

        $this->global = new GlobalController;

        $this->define_superglobals();

        

    }


    public  function put($key, $value){

        $_SESSION[$key] = $value;

    }

    function twigInit()
    {
        $loader = new \Twig\Loader\FilesystemLoader('views');

        $this->twig = new \Twig\Environment($loader, [
            'cache' => false,


        ]);

        $this->twig->addGlobal('session', $_SESSION);

        return $this->twig;

    }





}