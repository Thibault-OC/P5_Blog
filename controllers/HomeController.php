<?php

namespace Controllers;

use Models;


class HomeController extends ConfigController
{
    function home()
    {

        $this->render('frontend/home.twig');

    }


function homeContact($nom , $prenom , $email , $telephone , $commentaire)
{

    $nom = $this->get_POST('nom');
    $prenom = $this->get_POST('prenom');
    $email = $this->get_POST('email');
    $telephone = $this->get_POST('telephone');
    $commentaire = $this->get_POST('commentaire');


    if (isset($email)) {

     
        $email_to = "thib.du-42@hotmail.fr";
        $email_subject = "Le sujet de votre email";




        // si la validation des données attendues existe
        if (!isset($nom) ||
            !isset($prenom) ||
            !isset($email) ||
            !isset($telephone) ||
            !isset($commentaire)) {
            died(
                'Nous sommes désolés, mais le formulaire que vous avez soumis semble poser'.
                ' problème.');
        }




        $error_message = "";
        $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

        if (!preg_match($email_exp, $email)) {
            $error_message .=
                'L\'adresse e-mail que vous avez entrée ne semble pas être valide.<br />';
        }

// Prend les caractères alphanumériques + le point et le tiret 6
        $string_exp = "/^[A-Za-z0-9 .'-]+$/";

        if (!preg_match($string_exp, $nom)) {
            $error_message .=
                'Le nom que vous avez entré ne semble pas être valide.<br />';
        }

        if (!preg_match($string_exp, $prenom)) {
            $error_message .=
                'Le prénom que vous avez entré ne semble pas être valide.<br />';
        }

        if (strlen($commentaire) < 2) {
            $error_message .=
                'Le commentaire que vous avez entré ne semble pas être valide.<br />';
        }

        if (strlen($error_message) > 0) {
            died($error_message);
        }

        $email_message = "Détail.\n\n";
        $email_message .= "Nom: ".$nom."\n";
        $email_message .= "Prenom: ".$prenom."\n";
        $email_message .= "Email: ".$email."\n";
        $email_message .= "Telephone: ".$telephone."\n";
        $email_message .= "Commentaire: ".$commentaire."\n";

// create email headers
        $headers = 'From: '.$email."\r\n".
            'Reply-To: '.$email."\r\n".
            'X-Mailer: PHP/'.phpversion();
        mail($email_to, $email_subject, $email_message, $headers);
        
        $this->header('accueil');
        $this->put('message', "Message bien envoyé");
    }
}
}