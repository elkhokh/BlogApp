<div class="container mt-5">
    <div class="row justify-content-center">
        <?php
        $path_image = path_image();
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $blog = find_blog($id);
        }
        ?>
        <table class="table table-bordered text-center mt-5" style="width: 70%;">
            <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Content</th>
                    <th>Created At</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?= $blog['id'] ?></td>
                    <td><img height="50" width="50" src="<?= $path_image . $blog['image'] ?>"></td>
                    <td><?= $blog['title'] ?></td>
                    <td><?= $blog['content'] ?></td>
                    <td><?= $blog['create_at'] ?? date('Y-m-d') ?></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
