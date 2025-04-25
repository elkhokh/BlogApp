<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="mb-4">All Posts</h1>
        <!-- <a href="" class="btn btn-primary mb-3">Add New Blog</a> -->
    </div>

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

            <tr>
                <td> </td>
                <td><img width="25" src=""></td>
                <td> </td>
                <td> </td>
                <td>
                    <a href="index.php?page=" class="btn btn-outline-info btn-sm">View</a>
                    <a href="index.php?page=" class="btn btn-outline-success btn-sm">Add</a>
                    <a href="index.php=" class="btn btn-outline-warning btn-sm">Edit</a>
                    <form action=" " method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this product?');"
                        style="display:inline-block;">
                        <input type="hidden" name="id" value="">
                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                    </form>
                    <!-- <a href="" class="btn btn-sm btn-info">View</a>
                    <a href="" class="btn btn-sm btn-warning">Edit</a>
                    <form action="index.php?page=delete-blog&action=delete" method="POST" style="display:inline-block;">
                        <input type="hidden" name="id" value="">
                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                    </form> -->
                </td>
            </tr>

        </tbody>
    </table>

    <div class="alert alert-warning d-flex align-items-center" role="alert">
        <i class="bi bi-exclamation-triangle-fill me-2 fs-4"></i>
        <div>No Posts Found.</div>
    </div>
</div>

<!-- <div class="alert alert-info">No Posts Found</div>
</div> -->