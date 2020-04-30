<?php include('header.inc.php'); ?>

    <div class="container">
        <div class="row">
           <div class="col-md-12 titre">

               <h1><?php echo $post['title']; ?></h1>
           </div>
           <div class="col-md-6 image-blog">
                <img src="././public/img/<?php echo $post['image']; ?>" alt="<?php echo $post['title']; ?>">
            </div>
            <div class="col-md-6 ">
                <p>Auteur : <?php echo $post['username']; ?> <?php echo $post['lastname']; ?></p>
                <p><?php echo $post['chapo']; ?></p>
            </div>
            <div class="col-md-12 ">
                <p><?php echo $post['content']; ?></p>
            </div>

            <div class="col-md-12 titre"> <h2>Commentaires :</h2> </div>
            <div class="col-md-12 bloc-commentaire">
                <form action="http://51.75.126.51/P5/index.php?action=addComment" method="post">

                    <div>
                        <label for="content">Ajouter un commentaire : </label><br />
                        <textarea id="content_commentaire" name="content"></textarea>
                    </div>
                    <input id="Id" name="blog" type="hidden" value="<?php echo $post['id']; ?>">
                    <div>
                        <input class="btn btn-success btn-lg" type="submit" />
                    </div>
                </form>
               <?php while ($com = $comment ->fetch()) {?>
                    <div class="commentaire">
                        <p>Auteur : <?php echo $com['username']; ?>  <?php echo $com['lastname']; ?></p>
                        <p>Ajouter le : <?php echo $com['creation_date']; ?></p>
                        <p> <?php echo $com['content']; ?></p>
                    </div>
                <?php } ?>


            </div>
        </div>
    </div>

<?php include('footer.inc.php'); ?>