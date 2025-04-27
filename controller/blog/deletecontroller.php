<?php 

if($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_POST['id']) || empty($_POST['id']))
    {
    set_message('danger', "Error in data send try again");
    header("Location: ./index.php?page=main");
    exit;
    }

    $id = $_POST['id'];
    if (delete_blog($id))
     {
        set_message('success', "Blog removed Successfully  ");
        header("Location: ./index.php?page=main");
        exit;
    } 
    else {
        set_message('danger', "Failed to remove task ");
        header("Location: ./index.php?page=main");
        exit;
    }
