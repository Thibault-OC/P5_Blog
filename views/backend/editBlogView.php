<?php
ini_set('error_reporting', E_ALL);
ini_set('display_errors', true);

include('views/frontend/header.inc.php'); ?>

    <div class="container">
        <div class="row">
            <div class="col-md-12 form-edit  content-form">
                <form action="http://51.75.126.51/P5/index.php?action=updatePost&id=<?php echo $post['id']; ?>"
                      method="post" enctype="multipart/form-data">
                    <div>
                        <label for="title">title</label><br/>
                        <input type="text" id="title" name="title" value="<?php echo $post['title']; ?>"/>
                    </div>

                    <div>
                        <label for="content">châpo</label><br/>
                        <textarea id="short" maxlength="200" name="chapo"><?php echo $post['chapo']; ?></textarea>
                    </div>

                    <div>
                        <label for="content">content</label><br/>
                        <textarea id="content" name="content"><?php echo $post['content']; ?></textarea>
                    </div>

                    <div>
                        <input type="submit" name="submit"/>
                    </div>
                </form>
            </div>


        </div>
    </div>

<?php include('views/frontend/footer.inc.php'); ?>