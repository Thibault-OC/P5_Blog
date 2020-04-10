<?php

// Chargement des classes
require_once('models/BlogPostManager.php');


function listPosts()
{

    $postManager = new BlogPostManager();
    $posts = $postManager->getPosts();




  require('views/frontend/ListBlogsView.php');
}

function post()
{
    $postManager = new BlogPostManager();


    $post = $postManager->getPost($_GET['id']);


    require('views/frontend/blogView.php');
}




