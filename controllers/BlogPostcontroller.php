<?php

namespace Controllers;

use Models;


class BlogPostcontroller  extends  ConfigController{

function viewAddPosts(){
    if ($_SESSION['admin'] == 1){
        
        echo $this->twig->render('backend/createBlogView.twig');
    }
    else{
        $_SESSION['message'] = "vous n'avez pas les accès ";

        header('Location: accueil');
    }
}
 function listPosts()
{


    $postManager = new Models\BlogPostManager();

    $posts = $postManager->getPosts();

    echo $this->twig->render('frontend/ListBlogsView.twig', ['posts' => $posts]);


}

function post()
{


    $postManager = new Models\BlogPostManager();

    $post = $postManager->getPost($_GET['id']);

    $comment = $this->postComment();

    echo $this->twig->render('frontend/blogView.twig', ['post' => $post , 'comment' => $comment]);

}

function postComment()
{
    $commentManager = new Models\CommentManager();

    $comment = $commentManager->getComment($_GET['id']);

        return $comment;
}

function storePost($image, $title, $chapo, $content)
{

    $image_type = $_FILES['image']['type'];
    $new_type = str_replace("image/", ".", $image_type );
    $image_name = $_FILES['image']['tmp_name'];
    $new_name = str_replace("/tmp/", "", $image_name );

    $imageVal = $new_name.$new_type;

    echo $imageVal;


    $uploaddir = './public/img/';
    $uploadfile = $uploaddir.basename($imageVal);


    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {

        $postManager = new Models\BlogPostManager();
        $auteur = $_SESSION['id'];
        $affectedLines = $postManager->storePost($auteur, $imageVal, $title, $content, $chapo);

        header('Location: annonces');

    } else {
        $_SESSION['message']="impossible d'ajouter une image";
        
        header('Location: addpost');

    }


}

function userPosts()
{

    if ($_SESSION['admin'] == 1) {
        $user = $_SESSION['id'];

        $postManager = new Models\BlogPostManager();

        $postsUser = $postManager->getPostsUser($user);

        echo $this->twig->render('backend/ListBlogsUserView.twig', ['posts' => $postsUser]);
    }
    else{
        $_SESSION['message'] = "vous n'avez pas les accès ";

        header('Location: accueil');
    }

}

function userPost()
{


    $postManager = new Models\BlogPostManager();

    $post = $postManager->getPost($_GET['id']);

    echo $this->twig->render('backend/editBlogView.twig', ['post' => $post]);
}


function updatePost($title, $chapo, $content, $id)
{

    $postManager = new Models\BlogPostManager();
    $affectedLines = $postManager->updatePost($title, $content, $chapo, $id);

    if($affectedLines === true){
    header('Location: ../annonce/'.$id);
}



}

function deletePost($id)
{

    $postManager = new Models\BlogPostManager();
    $affectedLines = $postManager->deletePost($id);

    if ($affectedLines === false) {
        header('Location: ../mes-articles');

        $message = "Impossible de modifier le post !";
    } else {

        echo "test";
        header('Location: ../mes-articles');
    }


}

}