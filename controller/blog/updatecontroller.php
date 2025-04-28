<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id=$_POST['id'];
    $title = trim(htmlspecialchars(htmlentities($_POST['title']))) ;
    $content = trim(htmlspecialchars(htmlentities($_POST['content']))) ;
    $image =$_FILES['image'];

    $error = valid_create_blog($title,$content,$image);

if (!empty($error)) {
    set_message('danger', $error);
    header("Location: ./index.php?page=update");
    exit;
}
if (update_blog($id, $title, $content, $image )) 
{
    set_message('success', "Blog Update Successfully ");
    header("Location: ./index.php?page=main");
    exit;
}
else {
    set_message('danger', "Blog Failed Update");
    header("Location: ./index.php?page=update");
    exit;
}
}