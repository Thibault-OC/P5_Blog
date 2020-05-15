<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

include('views/frontend/header.inc.php'); ?>


<div class="container page-user-blog">
    <div class="row">
        <H1> Commentaires en attentes de validation </H1>

        <?php while ($com = $comment ->fetch()) {?>

            <div class="col-md-12 list-blog-user">
                <div class="content row">


                        <div class="commentaire">
                            <p>Auteur : <?php echo $com['username']; ?>  <?php echo $com['lastname']; ?></p>
                            <p>Ajouter le : <?php echo $com['creation_date']; ?></p>
                            <p> <?php echo $com['content']; ?></p>
                        </div>
                    <a href="http://51.75.126.51/P5/index.php?action=UpdateComment&id=<?php echo $com['0']; ?>"
                       class="btn btn-success btn-lg"> valider</a>

                    <a href="http://51.75.126.51/P5/index.php?action=deleteComment&id=<?php echo $com['0']; ?>"
                       class="btn btn-danger btn-lg"> Supprimer</a>
                </div>
            </div>

            <?php
        }
        ?>

    </div>
</div>

<?php include('views/frontend/footer.inc.php'); ?>
