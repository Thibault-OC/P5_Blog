<?php
namespace Models;


class CommentManager extends BddManager
{
    public function storeComment($content, $blog, $auteur)
    {
        $bdd = $this->dbConnect();
        $newComment = $bdd->prepare('INSERT INTO comment(content , auteur , blog_id ,creation_date) VALUES(? , ? , ? , NOW())');
        $affectedLines = $newComment->execute(array($content, $auteur, $blog));

        return $affectedLines;

    }

    public function getComment($postId)
    {
        $bdd = $this->dbConnect();
        $comment = $bdd->prepare('SELECT * FROM comment INNER JOIN users ON users.id = comment.auteur where valide = 1 AND blog_id = ? ORDER BY comment.id DESC ');
        $comment->execute(array($postId));
        return $comment;


    }

    public function adminComment()
    {
        $bdd = $this->dbConnect();
        $adminComment = $bdd->prepare('SELECT * FROM comment INNER JOIN users ON comment.auteur = users.id   where valide = 0 ORDER BY comment.id DESC ');
        $adminComment->execute(array());
        $comment = $adminComment;
        return $comment;

    }

    public function updateComment($id)
    {
       $valide = 1;

       $bdd = $this->dbConnect();

        $update = $bdd->prepare('UPDATE comment SET valide = ?  WHERE id = ?');

        $affectedLines = $update->execute(array($valide , $id));

        return $affectedLines;


    }
    public function deleteComment($id)
    {
        $bdd = $this->dbConnect();

        $deleteComment = $bdd->prepare('DELETE FROM comment WHERE id = ?');

        $affectedLines = $deleteComment->execute(array($id));

        return $affectedLines;


    }


}