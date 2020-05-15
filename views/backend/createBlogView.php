<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

include('views/frontend/header.inc.php'); ?>


    <div class="container">
        <h1>Ajouter un Blog</h1>
        <div class="content-form">
            <form action="http://51.75.126.51/P5/index.php?action=storePost" method="post"
                  enctype="multipart/form-data">
                <div>
                    <input type="hidden" name="MAX_FILE_SIZE" value="300000"/>
                    <label for="title">Image</label><br/>
                    <input type="file" name="image" id="image">
                </div>
                <div>
                    <label for="title">title</label><br/>
                    <input type="text" id="title" name="title"/>
                </div>

                <div>
                    <label for="content">châpo</label><br/>
                    <textarea id="short" maxlength="200" name="chapo"></textarea>
                </div>

                <div>
                    <label for="content">content</label><br/>
                    <textarea id="content" name="content"></textarea>
                </div>

                <div>
                    <input type="submit" name="submit"/>
                </div>
            </form>
        </div>
    </div>

<?php include('views/frontend/footer.inc.php'); ?>