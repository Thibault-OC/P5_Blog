<?php

namespace Controllers;

class ErrorController extends ConfigController{

function errorPage()
{

    echo $this->twig->render('frontend/error.twig');

}

}