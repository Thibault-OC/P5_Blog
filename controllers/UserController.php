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

    $emailUsers = $userManager->emailUsers($email);

    if($emailUsers['email'] == $email) {

        $this->put('message', $message['message_email_error']);

        header('Location: inscription');
    }
    else{
        $affectedLines =  $userManager->storeUser($username, $lastname ,$email, $password);

        if ($affectedLines === false) {

            $this->put('message', $message['message_error_inscription']);

            header('Location: inscription');
            
        }
        else{

            $this->put('message', $message['inscription_success']);

            header('Location: accueil');


        }
    }


}


function connectUser($email, $password)
{
    $message =  message();



    if (empty($email) || empty($password) ) //Oublie d'un champ
{

    $this->put('message', $message['message_auth-erreur']);

    header('Location: user');

}
    else //On check le mot de passe
    {
        $userManager = new Models\UserManager();
        $user =  $userManager->connectUser($email, $password);

         if (password_verify($password , $user['password'])) // Acces OK !
         {


             $this->put('pseudo', $user['username']);
             $this->put('name', $user['lastname']);
             $this->put('id', $user['id']);
             $this->put('admin', $user['admin']);
             $this->put('email', $user['email']);
             $this->put('message', $message['message_login']);

             header('Location: accueil');

        }
         else {
             $this->put('message', $message['message_refus']);
             header('Location: user');

         }

    }

}

function logoutUser(){
    $message =  message();

    session_destroy();

    $this->put('message', $message['message_logout']);

    header('Location: accueil');

}
}