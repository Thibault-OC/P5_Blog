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
        $req = $bdd->prepare('SELECT title , image , username, lastname , chapo, content , posts.id FROM posts INNER JOIN users ON users.id = posts.auteur WHERE posts.id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();
        return $post;
    }

    public function storePost($auteur, $image ,$title, $content, $chapo)
    {
        $bdd = $this->dbConnect();
        $newPost = $bdd->prepare('INSERT INTO posts(auteur , image ,title, content, chapo ,creation_date) VALUES(? ,? ,?, ?, ?, NOW())');
        //return $newPost->execute(array($title, $content));
        $affectedLines = $newPost->execute(array($auteur ,$image ,$title, $content ,$chapo));

        return $affectedLines;
    }

    private function dbConnect(): PDO
{


    $bdd = new PDO('mysql:host=localhost;dbname=P5;charset=utf8', 'root3', '914=GE-FèR/poolm');

    return $bdd;

}
}