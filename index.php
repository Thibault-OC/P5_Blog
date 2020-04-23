<?php
require('controllers/BlogPostcontroller.php');
require('controllers/errorController.php');

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
        storePost( $_POST['title'], $_POST['content'],  $_POST['creation_date']);
    }




    else{
        errorPage();
    }

}

else {
    errorPage();
}