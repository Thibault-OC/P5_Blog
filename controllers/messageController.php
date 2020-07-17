<?php
function message(){

    $messagetest = array(
       "message_eror_admin"  => "Vous devez vous connecter pour accèder a l'admin",
        "message_admin_refus" => "vous n'avez pas les droit d'administration",
        "message_article_succes" => "article bien ajouté",
        "message_comment_error"  => "veuillez vous connecter pour ajouter un commentaire",
        "message_joli" => "bien joué ! ",
        "message_auth-erreur" => "une erreur s'est produite pendant votre identification. Vous devez remplir tous les champs",
        "message_refus"  => "Le mot de passe ou l'email est invalide.",
        "message_logout" => "Vous êtes à présent déconnecté",
        "message_login" => 'Bienvenue ,vous êtes maintenant connecté!',
        "message_error_inscription" => "une erreur s'est produite pendant votre inscritpion. Vous devez remplir tous les champs",
        "inscription_success" => "inscription reussi ",
        "message_email_error" => "Adresse Email déja utilisé",
        "message_comment_valid" =>"Le commentaire est validé",
        "message_comment_suppr" => "commentaire supprimé"
    );
    return $messagetest;


}