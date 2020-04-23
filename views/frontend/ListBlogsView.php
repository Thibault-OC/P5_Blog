<?php include('header.inc.php'); ?>

<div class="container">
    <div class="row">
<?php

while ($donnees = $posts->fetch())
{
?>

        <div class="col-md-4">
            <h2><?php echo $donnees['title']; ?></h2>
            <p><?php echo $donnees['content']; ?></p>
            <p><?php echo $donnees['creation_date']; ?></p>
            <a href="http://51.75.126.51/P5/index.php?action=post&id=<?php echo $donnees['id']; ?>" > voir plus</a>
        </div>

<?php
}
?>
    </div>
</div>

<?php include('footer.inc.php'); ?>