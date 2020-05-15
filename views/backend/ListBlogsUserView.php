<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

include('views/frontend/header.inc.php'); ?>


    <div class="container page-user-blog">
        <div class="row">


            <?php

            while ($donnees = $postsUser->fetch()) {
                ?>

                <div class="col-md-12 list-blog-user">
                    <div class="content row">
                        <div class="col-md-4">
                            <img src="././public/img/<?php echo $donnees['image']; ?>"
                                 alt="<?php echo $donnees['title']; ?>">
                        </div>
                        <div class="col-md-8">
                            <h2><?php echo $donnees['title']; ?></h2>
                            <p><?php echo $donnees['chapo']; ?></p>
                            <p><?php echo $donnees['update_date']; ?></p>
                            <a href="http://51.75.126.51/P5/index.php?action=editPost&id=<?php echo $donnees['id']; ?>"
                               class="btn btn-success btn-lg"> Modifier</a>

                            <a href="http://51.75.126.51/P5/index.php?action=deletePost&id=<?php echo $donnees['id']; ?>"
                               class="btn btn-danger btn-lg"> Supprimer</a>
                        </div>
                    </div>
                </div>

                <?php
            }
            ?>

        </div>
    </div>

<?php include('views/frontend/footer.inc.php'); ?>