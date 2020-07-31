<?php
namespace Models;


class UserManager extends BddManager
{
    public function storeUser($username, $lastname , $email , $password)
    {
        $bdd = $this->dbConnect();
        $newUser = $bdd->prepare('INSERT INTO users(username, lastname ,email, password , admin) VALUES(?, ?, ?, ? , 0)');
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $affectedLines = $newUser->execute(array($username, $lastname ,$email, $passwordHash));
        return $affectedLines;
    }

    public function connectUser( $email )
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $req->execute(array($email ));
        $user = $req->fetch();

        return $user;


    }

    public function emailUsers( $email )
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT email FROM users WHERE email = ?');
        $req->execute(array($email ));
        $emailUsers = $req->fetch();
        return $emailUsers;
    }


}