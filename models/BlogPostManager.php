<?php

class BlogPostManager
{
    public function getPosts(): PDOStatement
    {
        $bdd = new PDO('mysql:host=localhost;dbname=P5;charset=utf8', 'root3', '914=GE-FèR/poolm');
        $req = $bdd->query('SELECT * FROM posts');


        return $req;


    }

    public function getPost($postId)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM posts WHERE id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        return $post;
    }

    public function storePost($title, $content): bool
    {
        $bdd = $this->dbConnect();
        $newPost = $bdd->prepare('INSERT INTO posts(title, content, creation_date) VALUES(?, ?, NOW())');
        /*return $newPost->execute(array($title, $content));*/
        $affectedLines = $newPost->execute(array($title, $content));

        return $affectedLines;
    }

    private function dbConnect(): PDO
    {


        $bdd = new PDO('mysql:host=localhost;dbname=P5;charset=utf8', 'root3', '914=GE-FèR/poolm');

        return $bdd;

    }
}