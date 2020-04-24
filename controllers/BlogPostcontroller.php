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

function createPost()
{

    require('views/backend/createBlogView.php');
}


function storePost($image , $title, $content )
{





      $uploaddir = './public/img/';
      $uploadfile = $uploaddir . basename($_FILES['image']['name']);


      if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {

          $postManager = new BlogPostManager();

          $affectedLines =  $postManager->storePost($image, $title, $content);

          if ($affectedLines === false) {
              die('Impossible d\'ajouter le post !');

          }
          else{
              $messageSucces = "article bien ajouté";

              require('views/frontend/home.php');
          }

      } else {
          echo "impossible d'ajouter l'image :\n";
      }





  
}


