<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/templates/header.php');
?>
    <div class="container">
        <h1>News</h1>
        <div class='row'>
            <?php
            foreach ($posts as $post) {
                getPost($post);
            } ?>
        </div>
    </div>
<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/templates/footer.php');