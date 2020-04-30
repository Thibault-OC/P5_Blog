<?php

class CommentManager
{
    public function storeComment($content , $blog , $auteur)
    {
        $bdd = $this->dbConnect();
        $newComment = $bdd->prepare('INSERT INTO comment(content , auteur , blog_id ,creation_date) VALUES(? , ? , ? , NOW())');
        //return $newPost->execute(array($title, $content));
        $affectedLines = $newComment->execute(array( $content ,$auteur , $blog ));

        return $affectedLines;

    }

    public function getComment($postId)
    {
        $bdd = $this->dbConnect();
        $comment = $bdd->query('SELECT * FROM comment INNER JOIN users ON users.id = comment.auteur where blog_id = '.$postId);
        return $comment;



    }

    private function dbConnect(): PDO
    {


        $bdd = new PDO('mysql:host=localhost;dbname=P5;charset=utf8', 'root3', '914=GE-FèR/poolm');

        return $bdd;
    }

}