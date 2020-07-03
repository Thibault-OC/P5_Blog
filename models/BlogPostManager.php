<?php

namespace Models;


class BlogPostManager extends BddManager
{
    public function getPosts()
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM posts ORDER BY id DESC');
        $req->execute();

        return $req;


    }

    public function getPost($postId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT title , image , username, lastname , chapo, content , posts.id FROM posts INNER JOIN users ON users.id = posts.auteur WHERE posts.id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function storePost($auteur, $image, $title, $content, $chapo)
    {
        $bdd = $this->dbConnect();
        $newPost = $bdd->prepare('INSERT INTO posts(auteur , image ,title, content, chapo ,creation_date ,update_date) VALUES(? ,? ,?, ?, ?, NOW(), NOW())');
        //return $newPost->execute(array($title, $content));
        $affectedLines = $newPost->execute(array($auteur, $image, $title, $content, $chapo));

        return $affectedLines;
    }

    public function getPostsUser($user)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM posts where auteur = ? ORDER BY id DESC');
        $req->execute(array($user));
        $postUser = $req;

        return $postUser;


    }

    public function updatePost($title, $content, $chapo, $id)
    {
        $bdd = $this->dbConnect();

        $newPost = $bdd->prepare('UPDATE posts SET title= ?,chapo= ?,content= ?,update_date = NOW() WHERE id = ?');

        $affectedLines = $newPost->execute(array($title, $chapo, $content, $id));

        return $affectedLines;


    }

    public function deletePost($id)
    {
        $bdd = $this->dbConnect();

        $newPost = $bdd->prepare('DELETE FROM posts WHERE id = ?');

        $affectedLines = $newPost->execute(array($id));

        return $affectedLines;


    }


}