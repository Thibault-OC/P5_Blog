<?php

namespace Controllers;

class ErrorController extends ConfigController{

function errorPage()
{

    
    $this->render('frontend/error.twig');

}

}