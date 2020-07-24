<?php
session_start();
require('vendor/autoload.php');

ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);


$Global = new Controllers\ConfigController();

$request = $Global->get_GET('action');

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
        $storpost->storePost($_FILES["image"]["name"], $Global->get_POST('title'), $Global->get_POST('chapo'), $Global->get_POST('content') );
        break;

    case 'user';
        $viewUser = new Controllers\UserController();
        $viewUser->viewUser();
        break;

    case 'connect';
        $connect = new Controllers\UserController();
        $connect->connectUser( $Global->get_POST('email'), $Global->get_POST('password'));
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
        $storeuser->storeUser( $Global->get_POST('username'), $Global->get_POST('lastname') ,$Global->get_POST('email') ,$Global->get_POST('password'));;
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
        $updatePost->updatePost($Global->get_POST('oldimage') , $_FILES["image"]["name"] ,$Global->get_POST('title'),$Global->get_POST('chapo') ,$Global->get_POST('content') , $Global->get_POST('id'));
        break;
        
    case 'supprimer-blog';
        $deletePost = new Controllers\BlogPostcontroller();
        $deletePost -> deletePost( $Global->get_GET('id'));
        break;

    case 'admin';
        $updatePost = new Controllers\CommentController();
        $updatePost -> adminComment();
        break;

    case 'add-comment';
        $addComment = new Controllers\CommentController();
        $addComment -> addComment($Global->get_POST('content') ,$Global->get_POST('blog'));
        break;

    case 'update-comment';
        $updateComment = new Controllers\CommentController();
        $updateComment -> updateComment($Global->get_GET('id'));
        break;
    case 'delete-comment';
        $deleteComment = new Controllers\CommentController();
        $deleteComment -> deleteComment($Global->get_GET('id'));
        break;

    case 'contact';
        $contact =  new Controllers\HomeController();
        $contact -> homeContact($Global->get_POST('nom') ,$Global->get_POST('prenom'),$Global->get_POST('email') ,$Global->get_POST('telephone') ,$Global->get_POST('commentaire'));
        break;

    default;
        $error = new Controllers\ErrorController();
        $error -> errorPage();
        break;
}


