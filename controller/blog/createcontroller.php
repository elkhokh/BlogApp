
<?php 

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $title  = trim($_POST['title']);
    $content = trim($_POST['content']);
    $image =$_FILES['image'];


$error = valid_create_blog($title,$content,$image);

if(!empty($error)){
    set_message('danger',$error);
    header("location: ./index.php?page=create");
    exit;
}

if (add_blog($title, $content, $image)) 
{
    set_message('success', "Added Successfully");
    header("Location: ./index.php?page=main");
    exit;
} 
else {
    set_message('danger', "Failed Add");
    header("location: ./index.php?page=create");
    exit;
}
}



/*************  test how store image in folder********** */
// // echo  __DIR__ ;
// // $image = $_FILES['image'];
// // var_dump($image);echo"<hr>";
// // print_r($image);echo"<hr>";echo"<hr>";
// $name = $_FILES['image']['name'];
// // echo $name;echo"<hr>";
// // echo $_FILES['image']['size'];echo"<hr>";
// $tmp_name = $_FILES['image']['tmp_name'];
// // echo$tmp_name echo"<hr>";
// // echo $_FILES['image']['type'];echo"<hr>";
// $path = realpath (__DIR__ ."/../../assets/img")."/".$name;
// // echo $path ;
// move_uploaded_file($tmp_name,$path);
// exit;
