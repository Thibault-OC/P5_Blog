<?php
namespace Controllers;

use Models;

class UserController extends ConfigController{

 function viewUser(){
     echo $this->twig->render('backend/connexionUserView.twig');
 }
    function viewInscription(){
        echo $this->twig->render('backend/newUserview.twig');
    }

function storeUser($username, $lastname ,$email, $password)
{
    $message =  message();

    $userManager = new Models\UserManager();

    $global = new ConfigController();

    $emailUsers = $userManager->emailUsers($email);

    if($emailUsers['email'] == $email) {

        //$_SESSION['message'] = $message['message_email_error'];

        $global->put('message', $message['message_email_error']);

        header('Location: inscription');
    }
    else{
        $affectedLines =  $userManager->storeUser($username, $lastname ,$email, $password);

        if ($affectedLines === false) {

            //$_SESSION['message'] = $message['message_error_inscription'];

            $global->put('message', $message['message_error_inscription']);

            header('Location: inscription');
            
        }
        else{

            $global->put('message', $message['inscription_success']);

            //$_SESSION['message'] = $message['inscription_success'];

            header('Location: accueil');


        }
    }


}


function connectUser($email, $password)
{
    $message =  message();

    $global = new ConfigController();

    if (empty($email) || empty($password) ) //Oublie d'un champ
{
    //$_SESSION['message'] =  $message['message_auth-erreur'];

    $global->put('message', $message['message_auth-erreur']);

    header('Location: user');

}
    else //On check le mot de passe
    {
        $userManager = new Models\UserManager();
        $user =  $userManager->connectUser($email, $password);

         if (password_verify($password , $user['password'])) // Acces OK !
         {


             $global->put('pseudo', $user['username']);
             $global->put('name', $user['lastname']);
             $global->put('id', $user['id']);
             $global->put('admin', $user['admin']);
             $global->put('email', $user['email']);
             $global->put('message', $message['message_login']);

            /*_SESSION['pseudo'] = $user['username'];
            $_SESSION['name'] = $user['lastname'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['admin'] = $user['admin'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['message'] = $message['message_login'];*/

             header('Location: accueil');

        }
         else {
             //$_SESSION['message'] = $message['message_refus'];
             $global->put('message', $message['message_refus']);
             header('Location: user');

         }

    }

}

function logoutUser(){
    $message =  message();
    session_destroy();
    $global = new ConfigController();
    //$_SESSION['message'] = $message['message_logout'];
    $global->put('message', $message['message_logout']);
    header('Location: accueil');

}
}