<?php

function addComment($content, $blog)
{
    $auteur = $_SESSION['id'];
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->storeComment($content, $blog, $auteur);

    return $affectedLines;
}

function adminComment()
{
    $commentManager = new CommentManager();

    $comment = $commentManager->adminComment();

    require('views/backend/adminView.php');
}

function updateComment($id)
{

    $commentManager = new CommentManager();

    $comment = $commentManager->updateComment($id);

    header('Location: index.php?action=admin');
}

function deleteComment($id)
{

    $commentManager = new CommentManager();

    $comment = $commentManager->deleteComment($id);

    header('Location: index.php?action=admin');
}

