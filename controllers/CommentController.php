<?php

namespace Controllers;

use Models;


class CommentController extends ConfigController
{


function addComment($content, $blog)
{

    $message = message();

    $auteur = $this->get_SESSION('id');

    $commentManager = new Models\CommentManager();

    $affectedLines = $commentManager->storeComment($content, $blog, $auteur);

    $pseudo = $this->get_SESSION('pseudo');

    if (isset($pseudo)) {

        header('Location: annonce/'.$this->get_POST('blog'));
    }
    else{

        echo $this->twig->render('backend/connexionUserView.twig', ['message' => $message['message_comment_error']]);
    }


}

function adminComment()
{


    $message =  message();

    $commentManager = new Models\CommentManager();

    $comment = $commentManager->adminComment();

    if ($this->get_SESSION('admin') == 1) {

        echo $this->twig->render('backend/adminView.twig', ['comment' => $comment ]);



   }
   else{
       echo $this->twig->render('frontend/home.twig', ['message' => $message['message_admin_refus']]);

   }


}

function updateComment($id)
{

    $message =  message();

    $commentManager = new Models\CommentManager();

    $comment = $commentManager->updateComment($id);

    $comments = $this->adminComment();

    $this->put('message',  $message['message_comment_valid']);

    return $comments;


}

function deleteComment($id)
{
   

    $commentManager = new Models\CommentManager();

    $comment = $commentManager->deleteComment($id);

    $comments = $this->adminComment();

    return $comments;

}

}