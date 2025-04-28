<?php 
    $blogs = get_blog();
// print_r($blogs) ; exit;
$path_image = path_image();
// print_r($image_path) ; exit;
?>

<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-4">All Posts</h1>

        <a href="index.php?page=create" class="btn btn-success ">Add new blog </a>
    </div>
    <?php if(!empty($blogs)): ?>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Image</th>
                <th>Title</th>
                <th>content</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach($blogs as $blog ): ?>
            <tr>
                <td> <?= $blog['id'] ?> </td>
                <td><img width="25" src=" <?=$path_image . $blog['image'] ?>"></td>
                <td> <?= $blog['title'] ?>  </td>
                <td> <?= $blog['content'] ?>  </td>
                <td>
                    <a href="index.php?page=show&id=<?=$blog['id']?>" class="btn btn-outline-info btn-sm">View</a>
                
                    <a href="<?= $path_image . $blog['image'] ?>" download class="btn btn-outline-primary btn-sm">Download image</a>

                    
                    <a href="index.php?page=update&id=<?=$blog['id'] ?>" class="btn btn-outline-warning btn-sm">Edit</a>
                    
                    <form action="index.php?page=delete_controller" method="POST"
                        onsubmit="return confirm('Are you sure you want to delete ?');"
                        style="display:inline-block;">
                        <input type="hidden" name="id" value="<?= $blog['id']  ?>">
                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <?php else: ?>
    <div class="alert alert-warning d-flex align-items-center" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2 fs-4"></i>
        <div>No Posts Found.</div>
    </div>
    <?php endif; ?>
</div>

