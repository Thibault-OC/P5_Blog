<?php
ini_set( 'error_reporting', E_ALL );
ini_set( 'display_errors', true );

include('views/frontend/header.inc.php'); ?>

<h2>Ajout blog</h2>
<div>
<form action="http://51.75.126.51/P5/index.php?action=storePost" method="post">
    <div>
        <label for="title">title</label><br />
        <input type="text" id="title" name="title" />
    </div>

    <div>
        <label for="content">content</label><br />
        <textarea id="content" name="content"></textarea>
    </div>

    <div>
        <input type="submit" />
    </div>
</form>
</div>

<?php include('views/frontend/footer.inc.php'); ?>