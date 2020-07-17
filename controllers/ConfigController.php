<?php

namespace Controllers;

use Models;


class ConfigController
{

    function __construct()
    {
        $this->twigInit();
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