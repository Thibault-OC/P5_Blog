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

    return $post;


    //require('views/frontend/blogView.twig');
}

function postComment()
{

    $commentManager = new CommentManager();

    $comment = $commentManager->getComment($_GET['id']);

    return $comment;
    
    //require('views/frontend/blogView.twig');
}


function createPost()
{

    require('views/backend/createBlogView.php');

}


function storePost($image, $title, $chapo, $content)
{


    $uploaddir = './public/img/';
    $uploadfile = $uploaddir.basename($_FILES['image']['name']);


    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {

        $postManager = new BlogPostManager();
        $auteur = $_SESSION['id'];
        $affectedLines = $postManager->storePost($auteur, $image, $title, $content, $chapo);

        return $affectedLines;

    } else {
        echo "impossible d'ajouter l'image :\n";

    }


}

function userPosts()
{
    $user = $_SESSION['id'];

    $postManager = new BlogPostManager();

    $postsUser = $postManager->getPostsUser($user);

    require('views/backend/ListBlogsUserView.php');

}

function userPost()
{
    $postManager = new BlogPostManager();

    $post = $postManager->getPost($_GET['id']);

    require('views/backend/editBlogView.php');
}


function updatePost($title, $chapo, $content, $id)
{

    $postManager = new BlogPostManager();
    $affectedLines = $postManager->updatePost($title, $content, $chapo, $id);

    return $affectedLines;



}

function deletePost($id)
{

    $postManager = new BlogPostManager();
    $affectedLines = $postManager->deletePost($id);

    if ($affectedLines === false) {
        header('Location: index.php?action=userPosts');

        $message = "Impossible de modifier le post !";
    } else {

        echo "test";
        header('Location: index.php?action=userPosts');
    }


}