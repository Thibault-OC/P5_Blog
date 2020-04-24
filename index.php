<?php
require('controllers/BlogPostcontroller.php');
require('controllers/errorController.php');
require('controllers/UserController.php');

if ($_SERVER['REQUEST_URI'] == '/P5/index.php'){

    require('views/frontend/home.php');
}
elseif (isset($_GET['action'])) {


    if ($_GET['action'] == 'listPosts') {
        listPosts();

    }

    elseif ($_GET['action'] == 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            post();
        }
        else{
            errorPage();
        }

    }

        elseif ($_GET['action'] == 'addPost') {
            createPost();

        }

    elseif ($_GET['action'] == 'storePost') {
        storePost($_FILES["image"]["name"] , $_POST['title'], $_POST['content'],  $_POST['creation_date'] );



    }

    elseif ($_GET['action'] == 'createUser') {
        createUser();

    }

    elseif ($_GET['action'] == 'storeUser') {
        storeUser( $_POST['username'], $_POST['lastname'],  $_POST['email'],   $_POST['password']);


    }


    elseif ($_GET['action'] == 'user') {
        interfaceUser();

    }
    elseif ($_GET['action'] == 'connectUser') {
        connectUser($_POST['email'],   $_POST['password']);

    }
    elseif ($_GET['action'] == 'logout') {
        logoutUser();

    }

    else{
        errorPage();
    }

}

else {
    errorPage();
}