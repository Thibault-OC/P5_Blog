<?php

namespace Controllers;

use Models;


class BlogPostcontroller  extends  ConfigController{

function viewAddPosts(){


    if ($this->get_SESSION('admin') == 1){
        

        $this->render('backend/createBlogView.twig');
    }
    else{
        $this->put('message', "vous n'avez pas les accès");


        $this->header('accueil');
    }
}
 function listPosts()
{


    $postManager = new Models\BlogPostManager();

    $posts = $postManager->getPosts();



    $this->render('frontend/ListBlogsView.twig', ['posts' => $posts]);

}

function post()
{

    $postManager = new Models\BlogPostManager();

    $post = $postManager->getPost($this->get_GET('id'));


    $comment = $this->postComment();

    $this->render('frontend/blogView.twig',  ['post' => $post , 'comment' => $comment]);

}

function postComment()
{
    $commentManager = new Models\CommentManager();

    $comment = $commentManager->getComment($this->get_GET('id'));

        return $comment;
}

function storePost($image , $title, $chapo, $content)
{


    $image_type = $this->get_FILES('type');

    $new_type = str_replace("image/", ".", $image_type );
    $image_name = $this->get_FILES('tmp_name');
    $new_name = str_replace("/tmp/", "", $image_name );

    $imageVal = $new_name.$new_type;



    $uploaddir = './public/img/';
    $uploadfile = $uploaddir.basename($imageVal);


    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {

        $postManager = new Models\BlogPostManager();

        $auteur = $this->get_SESSION('id');

        $postManager->storePost($auteur, $imageVal, $title, $content, $chapo);

        $this->header('annonces');

    } else {
        $this->put('message', "impossible d'ajouter une image");

        $this->header('addpost');

    }


}

function userPosts()
{


    if ($this->get_SESSION('admin') == 1) {

        $user = $this->get_SESSION('id');

        $postManager = new Models\BlogPostManager();

        $postsUser = $postManager->getPostsUser($user);


        $this->render('backend/ListBlogsUserView.twig', ['posts' => $postsUser]);
    }
    else{
        $this->put('message', "vous n'avez pas les accès");

        $this->header('accueil');
    }

}

function userPost()
{
  if ($this->get_SESSION('admin') == 1) {
      $postManager = new Models\BlogPostManager();

      $post = $postManager->getPost($this->get_GET('id'));

      $this->render('backend/editBlogView.twig', ['post' => $post]);
  }
  else{

      $this->put('message', "vous n'avez pas les droit accéder a la page");

      $this->header('../acceuil');
  }
}


function updatePost( $oldimage ,$image ,$title, $chapo, $content, $id)
{

    if ($this->get_SESSION('admin')== 1) {
    if ( $image == ""){
        $postManager = new Models\BlogPostManager();
        $affectedLines = $postManager->updatePost($oldimage ,$title, $content, $chapo, $id);

        if($affectedLines === true){

            $this->header('../annonce/'.$id.'');

            $this->put('message', "Le blog a bien été modifié");
        }
        else {
            $this->put('message', "impossible de changer l'image");

            $this->header('../addpost');

        }
    }
    else{
        $image_type = $this->get_FILES('type');
        $new_type = str_replace("image/", ".", $image_type );
        $image_name = $this->get_FILES('tmp_name');
        $new_name = str_replace("/tmp/", "", $image_name );

        $imageVal = $new_name.$new_type;



        $uploaddir = './public/img/';
        $uploadfile = $uploaddir.basename($imageVal);


        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadfile)) {

            $postManager = new Models\BlogPostManager();
            $affectedLines = $postManager->updatePost($imageVal ,$title, $content, $chapo, $id);

            if($affectedLines === true){

                $this->header('../annonce/'.$id.'');

                $this->put('message', "Le blog a bien été modifié");
            }

        } else {
            $this->put('message', "impossible de changer l'image");

            $this->header('../addpost');

        }

    }

    }
    else{
        $this->put('message', "vous n'avez pas les droit pour modifier le blog");


        $this->header('../acceuil');
    }


}

function deletePost($id)
{

    $postManager = new Models\BlogPostManager();
    $affectedLines = $postManager->deletePost($id);

    if ($affectedLines === false) {

        $this->header('../mes-articles');

        $this->put('message', "Impossible de modifier le post !");

    } else {


        $this->header('../mes-articles');

        $this->put('message', "le blog a bien été supprimé");
    }


}

}