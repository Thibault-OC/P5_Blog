<?php
session_start();
require('vendor/autoload.php');

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);


$request = $_GET['action'];






switch ($request){

    case 'accueil';
        $home = new Controllers\HomeController();
        $home -> home();
        unset($_SESSION['message']);
        break;

    case 'annonces';
        $annonces = new Controllers\BlogPostcontroller();
        $annonces->listPosts();
        break;

    case 'annonce';
        $annonce = new Controllers\BlogPostcontroller();
        $annonce->post();
        break;

    case 'addpost';
        $addPost = new Controllers\BlogPostcontroller();
        $addPost->viewAddPosts();
        break;

    case 'storepost';
        $storpost = new Controllers\BlogPostcontroller();
        $storpost->storePost($_FILES["image"]["name"], $_POST['title'], $_POST['chapo'], $_POST['content'] );
        break;

    case 'user';
        $viewUser = new Controllers\UserController();
        $viewUser->viewUser();
        break;

    case 'connect';
        $connect = new Controllers\UserController();
        $connect->connectUser($_POST['email'], $_POST['password']);
        break;

    case 'logout';
        $logout = new Controllers\UserController();
        $logout->logoutUser();
        break;

    case 'inscription';
        $inscription = new Controllers\UserController();
        $inscription->viewInscription();
        break;

    case 'storeuser';
        $storeuser = new Controllers\UserController();
        $storeuser->storeUser($_POST['username'], $_POST['lastname'], $_POST['email'], $_POST['password']);;
        break;

    case 'mes-articles';
        $articles = new Controllers\BlogPostcontroller();
        $articles->userPosts();
        break;

    case 'modifier-article';
        $editarticle = new Controllers\BlogPostcontroller();
        $editarticle->userPost();
        break;

    case 'valider';
        $updatePost = new Controllers\BlogPostcontroller();
        $updatePost->updatePost($_POST['oldimage'] , $_FILES["image"]["name"] ,$_POST['title'], $_POST['chapo'], $_POST['content'], $_GET['id']);
        break;
        
    case 'supprimer-blog';
        $deletePost = new Controllers\BlogPostcontroller();
        $deletePost -> deletePost($_GET['id']);
        break;

    case 'admin';
        $updatePost = new Controllers\CommentController();
        $updatePost -> adminComment();
        break;

    case 'add-comment';
        $addComment = new Controllers\CommentController();
        $addComment -> addComment($_POST['content'], $_POST['blog']);
        break;

    case 'update-comment';
        $updateComment = new Controllers\CommentController();
        $updateComment -> updateComment($_GET['id']);
        break;
    case 'delete-comment';
        $deleteComment = new Controllers\CommentController();
        $deleteComment -> deleteComment($_GET['id']);
        break;

    case 'contact';
        $contact =  new Controllers\HomeController();
        $contact -> homeContact($_POST['nom'], $_POST['prenom'],$_POST['email'],$_POST['telephone'],$_POST['commentaire']);
        break;

    default;
        $error = new Controllers\ErrorController();
        $error -> errorPage();
        break;
}


