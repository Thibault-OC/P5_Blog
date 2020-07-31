<?php

namespace Controllers;



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


    public static function put($key, $value){

        $_SESSION[$key] = $value;

    }

    public function twigInit()
    {
        $loader = new \Twig\Loader\FilesystemLoader('views');

        $this->twig = new \Twig\Environment($loader, [
            'cache' => false,


        ]);

        $this->twig->addGlobal('session', $_SESSION);

        return $this->twig;

    }
    public function render($template ,$data = array()){
        echo $this->twig->display($template,$data);
    }

    public function header($template){

        header('Location: '.$template.'');
    }
    
}