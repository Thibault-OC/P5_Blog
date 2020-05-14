<?php




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

    $commentManager = new CommentManager();

    $comment = $commentManager->getComment($_GET['id']);

    require('views/frontend/blogView.php');
}

function createPost()
{

    require('views/backend/createBlogView.php');

}


function storePost($image , $title,  $chapo,  $content)
{


      $uploaddir = './public/img/';
      $uploadfile = $uploaddir . basename($_FILES['image']['name']);


      if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {

          $postManager = new BlogPostManager();
          $auteur = $_SESSION['id'];
          $affectedLines =  $postManager->storePost($auteur, $image, $title, $content ,$chapo);

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


