<?php


    if(!isset($_SESSION))
    {
        session_start();
    }


?>

<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>P5</title>
    <link href="public/css/style.css" rel="stylesheet">
    <!-- Bootstrap Core CSS -->
    <link href="public/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="public/css/freelancer.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="public/css/style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body id="page-top" class="index">
<!-- Navigation -->
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top navbar-custom">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header page-scroll">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
            </button>
            <a class="navbar-brand" href="/P5/index.php">BLOG PHP</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li class="hidden">
                    <a href="#page-top"></a>
                </li>
                <li class="page-scroll">
                    <a href="?action=listPosts">Voir les blogs</a>
                </li>

                <?php if (isset($_SESSION['pseudo']) ){ ?>
                <li class="page-scroll">
                    <a href="?action=addPost">Ajouter un blog</a>
                </li>

                    <li class="page-scroll">
                        <a href="?action=userPosts">Modifier mes blogs</a>
                    </li>

                <?php } if (!isset($_SESSION['pseudo']) ){ ?>
                    <li class="page-scroll">
                        <a href="?action=user">Connexion</a>
                    </li>
                    <li class="page-scroll">
                        <a href="?action=createUser">Inscription</a>
                    </li>
                <?php } ?>

                <?php if (isset($_SESSION['pseudo']) ){ ?>

                    <li class="page-scroll">
                        <a href="#"> <?php echo  $_SESSION['pseudo'] ?> </a>
                    </li>

                    <li class="page-scroll">
                        <a href="?action=logout">Déconnexion</a>
                    </li>

                <?php }
                
                ?>


            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>

<!-- Header -->
<header>

</header>
<?php if (isset($_GET['message']) ){ ?>

<div class="alert alert-warning" role="alert">
    veuillez vous connecter pour ajouter un commentaire
</div>

<?php } ?>
<?php if (isset($message) ){ ?>

    <div class="alert alert-warning" role="alert">
        <?php echo $message; ?>
    </div>

<?php }
    if(isset($messageSucces)){ ?>

        <div class="alert alert-success" role="alert">
            <?php echo $messageSucces; ?>
        </div>

<?php    }
?>
