<?php
require('vendor/autoload.php');
require('controllers/BlogPostcontroller.php');
require('controllers/errorController.php');
require('controllers/UserController.php');
require('controllers/CommentController.php');
require('controllers/messageController.php');
require_once('models/UserManager.php');
require_once('models/BlogPostManager.php');
require_once('models/CommentManager.php');

session_start();
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

$loader = new \Twig\Loader\FilesystemLoader('views');
$twig = new \Twig\Environment($loader, [



]);



if ($_SERVER['REQUEST_URI'] == '/P5/index.php') {

    require('views/frontend/home.php');
} elseif (isset($_GET['action'])) {


    if ($_GET['action'] == 'listPosts') {
        listPosts();

    } elseif ($_GET['action'] == 'post') {

        if (isset($_GET['id']) && $_GET['id'] > 0) {

             //post();

            echo $twig->render('frontend/blogView.twig', ['post' => post() , 'comment' => postComment()]);

        } else {
            errorPage();
        }

    } elseif ($_GET['action'] == 'addPost') {

        if (isset($_SESSION['pseudo'])) {

            createPost();

        } else {
            echo "veuillez vous connecter !";
        }


    } elseif ($_GET['action'] == 'storePost') {
        storePost($_FILES["image"]["name"], $_POST['title'], $_POST['chapo'], $_POST['content'],
            $_POST['creation_date']);

        if ($affectedLines === false) {
            die('Impossible d\'ajouter le post !');

        } else {
            $messageSucces = $message_article_succes;


            require('views/frontend/home.php');
        }

    } elseif ($_GET['action'] == 'createUser') {
        createUser();

    } elseif ($_GET['action'] == 'storeUser') {
        storeUser($_POST['username'], $_POST['lastname'], $_POST['email'], $_POST['password']);


    } elseif ($_GET['action'] == 'user') {
        interfaceUser();

    } elseif ($_GET['action'] == 'connectUser') {
        connectUser($_POST['email'], $_POST['password']);

    } elseif ($_GET['action'] == 'logout') {
        logoutUser();

    } elseif ($_GET['action'] == 'userPosts') {
        userPosts();

    } elseif ($_GET['action'] == 'editPost') {

        userPost();
    } elseif ($_GET['action'] == 'updatePost') {

        updatePost($_POST['title'], $_POST['chapo'], $_POST['content'], $_GET['id']);

        if ($affectedLines === false) {
            header('Location: index.php?action=post&id='.$id);

            $message = "Impossible de modifier le post !";
        } else {
            header('Location: index.php?action=post&id='.$id);
        }

    } elseif ($_GET['action'] == 'deletePost') {

        deletePost($_GET['id']);

    } elseif ($_GET['action'] == 'admin') {

        if (!$_SESSION['admin']) {

            $message = $message_eror_admin;

            require('views/frontend/home.php');
        } elseif ($_SESSION['admin'] == 0) {

            $message = $message_admin_refus;

            require('views/frontend/home.php');
        } elseif ($_SESSION['admin'] == 1) {

            adminComment();

        }

    } elseif ($_GET['action'] == 'addComment') {

        if (isset($_SESSION['pseudo'])) {

            addComment($_POST['content'], $_POST['blog']);


            header('Location: index.php?action=post&id='.$_POST['blog']);
        } else {


            header('Location: index.php?action=post&id='.$_POST['blog'].'&message');

        }

    }elseif ($_GET['action'] == 'UpdateComment') {

        if ($_SESSION['admin'] == 1) {

            updateComment($_GET['id']);

        }
        else{
            $messageSucces = $message_joli;


            require('views/frontend/home.php');
        }


    }elseif ($_GET['action'] == 'deleteComment') {

        if ($_SESSION['admin'] == 1) {

            deleteComment($_GET['id']);

        }
        else{

            $messageSucces = $message_joli;


            require('views/frontend/home.php');
        }



    }else
     {
        errorPage();
    }

} else {
    errorPage();
}