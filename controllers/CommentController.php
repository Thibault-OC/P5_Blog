<?php

function addComment($content , $blog){
    $auteur = $_SESSION['id'];
    $commentManager = new CommentManager();
    $affectedLines =  $commentManager->storeComment($content , $blog , $auteur);

    if ($affectedLines === false) {
        header('Location: index.php?action=post&id='.$blog);

        $message = "Impossible d'ajouter le commentaire !";
    }
    else{
        header('Location: index.php?action=post&id='.$blog);
    }
}

