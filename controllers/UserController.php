<?php



function createUser()
{

    require('views/backend/newUserview.php');
}

function storeUser($username, $lastname ,$email, $password)
{
    $userManager = new UserManager();

    $affectedLines =  $userManager->storeUser($username, $lastname ,$email, $password);

    if ($affectedLines === false) {

    die('Impossible d\'ajouter l\'utilisateur !');


}
else{
    require('views/frontend/home.php');
}

}


function interfaceUser()
{
    require('views/backend/connexionUserView.php');

}


function connectUser($email, $password)
{

    session_start();
    

    if (empty($email) || empty($password) ) //Oublie d'un champ
    {
        $message = '<p>une erreur s\'est produite pendant votre identification.
        Vous devez remplir tous les champs</p>
        <p>Cliquez <a href="?action=user">ici</a> pour revenir</p>';
        require('views/frontend/home.php');

    }
    else //On check le mot de passe
    {
        $userManager = new UserManager();
        $user =  $userManager->connectUser($email, $password);

         if (password_verify($password , $user['password'])) // Acces OK !
         {
            $_SESSION['pseudo'] = $user['username'];
            $_SESSION['id'] = $user['id'];
            $_SESSION['admin'] = $user['admin'];
            $messageSucces = '<p>Bienvenue '.$user['username'].',
			vous êtes maintenant connecté!</p>
			<p>Cliquez <a href="./index.php">ici</a>
			pour revenir à la page d accueil</p>';
             require('views/frontend/home.php');


        }
         else {
             $message =  'Le mot de passe est invalide.';
             require('views/frontend/home.php');
         }



    }
}

function logoutUser(){
    session_start();
    session_destroy();
    $message = '<p>Vous êtes à présent déconnecté</p>';
    header('Location: index.php');
}