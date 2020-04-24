<?php
ini_set( 'error_reporting', E_ALL );
ini_set( 'display_errors', true );

include('views/frontend/header.inc.php'); ?>


    <div class="container">
        <h1>Inscription</h1>
        <div class="content-form">
            <form action="http://51.75.126.51/P5/index.php?action=storeUser" method="post">
                <div>
                    <label for="title">Nom</label><br />
                    <input type="text" id="title" name="username" />
                </div>
                <div>
                    <label for="title">Prénom</label><br />
                    <input type="text" id="title" name="lastname" />
                </div>
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