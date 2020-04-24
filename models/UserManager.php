<?php

class UserManager
{
    public function storeUser($username, $lastname , $email , $password)
    {
        $bdd = $this->dbConnect();
        $newUser = $bdd->prepare('INSERT INTO users(username, lastname ,email, password) VALUES(?, ?, ?, ?)');
        $passwordHash = password_hash($password, PASSWORD_BCRYPT);
        $affectedLines = $newUser->execute(array($username, $lastname ,$email, $passwordHash));
        return $affectedLines;
    }

    public function connectUser( $email , $password)
    {
        $bdd = $this->dbConnect();
        $req = $bdd->prepare('SELECT * FROM users WHERE email = ?');
        $req->execute(array($email ));
        $user = $req->fetch();

        return $user;


    }


    private function dbConnect(): PDO
    {


        $bdd = new PDO('mysql:host=localhost;dbname=P5;charset=utf8', 'root3', '914=GE-FèR/poolm');

        return $bdd;

    }
}