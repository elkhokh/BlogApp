<div class="container mt-5">
    <div class="row justify-content-center">
        <?php

$path_image = path_image();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $blog = find_blog($id);
        }
        ?>
        <img height="50" width="50" src="<?= $path_image = path_image();?>">
        <div class="mt-5">
            <div>title : <?= $blog['title'] ?></div>
            <div>content : <?= $blog['content'] ?></div>
            <div>create_at : <?= $blog['create_at'] ?? date('Y-m-d') ?></div>
        </div>
    </div>
</div>