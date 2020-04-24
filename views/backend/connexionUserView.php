<?php
ini_set( 'error_reporting', E_ALL );
ini_set( 'display_errors', true );

include('views/frontend/header.inc.php'); ?>


    <div class="container">
        <h1>connexion</h1>
        <div class="content-form">
            <form action="http://51.75.126.51/P5/index.php?action=connectUser" method="post">
                <div>
                    <label for="title">Email</label><br />
                    <input type="text" id="title" name="email" />
                </div>
                <div>
                    <label for="title">Mot de passe</label><br />
                    <input type="text" id="title" name="password" />
                </div>



                <div>
                    <input type="submit" />
                </div>
            </form>
        </div>
    </div>

<?php include('views/frontend/footer.inc.php'); ?>