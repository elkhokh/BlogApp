<?php
/*********************************** message function ******************************************** */
function  set_message($type_of_alert,$type_of_massage){
$_SESSION['message']=[
        'type' => $type_of_alert,
        'text' => $type_of_massage,
];
}

function show_message(){
    if(isset($_SESSION['message'])){
        $type = $_SESSION['message']['type'];
        $text = $_SESSION['message']['text'];
        echo "<div class='text-center'><div class='alert alert-$type'>$text</div></div>";
        unset($_SESSION['message']);
    }
}
/**********************  register user function  ****************** */
function register_user($name, $email, $password){
$conn = $GLOBALS['conn'];
$password_hash = password_hash($password,PASSWORD_DEFAULT);
$sql ="INSERT INTO `users`(name, email, password) VALUES ('$name','$email' ,'$password_hash')";
$res= mysqli_query($conn,$sql);
if($res){
    $user_id = mysqli_insert_id($conn);
    $_SESSION['user'] = [
        'id' => $user_id,
        'name' => $name,
    ];
    return true;
}
else {
    set_message('danger',"failed Register");
    return false ;
}
}
/********************** login user function ****************************************** */
function login_user($email, $password){

    $conn = $GLOBALS['conn'];

    $sql = "SELECT * FROM users WHERE email ='$email'";

    $res= mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($res) === 0){
        set_message("danger", "Invaild email");
        header("location: ./index.php?page=login");
        exit;
    }
    $user = mysqli_fetch_assoc($res);
    if(password_verify($password,$user['password'])){
        $_SESSION['user'] =[
            'id' => $user['id'],
            'name' => $user['name'],
        ];
        return true;
    }
    else 
    {
        return false;
    }
}
/********************** function to get posts ************************************ */
function get_blog(){

    $conn = $GLOBALS['conn'];

    $sql = " SELECT * FROM `posts` WHERE user_id ='{$_SESSION['user']['id']}'" ;

    $res = mysqli_query($conn ,$sql);

    return mysqli_fetch_all($res ,MYSQLI_ASSOC  );
}
/************************  function to store posts  ********************** */
function add_blog($title, $content, $image){
    $conn = $GLOBALS['conn'];  //conn with database
    // to move image from user into folder and store in path in database
    $file_name = $image['name'];
    $tmp_name = $image["tmp_name"];
    $absolute_path = realpath (__DIR__ ."/../assets/img") . "/". $file_name;
    // $absolute_path =  (__DIR__ ."/../assets/img") . "/". $file_name;
    $relative_path = "/assets/img/" . $file_name ;
    if(!move_uploaded_file($tmp_name,$absolute_path)){
        die("<div class='text-center'><div class='alert alert-danger'> file not upload</div></div>");
    }
    //insert query and run query
    $sql = "INSERT INTO posts ( title, content, image, user_id, create_at) 
    VALUES('$title', '$content' , '$relative_path' ,'{$_SESSION['user']['id']}' , now() ) ";
    $res = mysqli_query($conn, $sql);

    if($res){
        return true ;
    }
    else{
        return false;
    }
}
/*********** function to find  blog ********************** */

function find_blog($id){
    $conn = $GLOBALS['conn'];  //conn with database
    $sql = "SELECT * FROM posts WHERE id = '$id' ";
    $res =mysqli_query($conn , $sql);
     
    if(mysqli_num_rows($res) === 0){
        set_message("danger", "Not Found Blog");
        header("location: ./index.php?page=main");
        exit;
    }
    return mysqli_fetch_assoc($res);
}
/*****************  function to delete blog *************** */
function delete_blog($id){
    find_blog($id);
    $conn = $GLOBALS['conn'];  //conn with database
    $sql = "DELETE FROM posts WHERE id = '$id'";
    $res = mysqli_query($conn,$sql);
    if($res){
        return true;
    }else{
        return false;
    }
}
/*********************function to update blog ****************** */
function update_blog($id, $title, $content, $image ){
    $blog = find_blog($id);
    $conn = $GLOBALS['conn'];
    $absolute_path = realpath(__DIR__.'/../'.$blog['image']);
    if($absolute_path && $image && file_exists($absolute_path)){
        unlink($absolute_path);
    }
    $file_name = $image['name'];
    $tmp_name = $image["tmp_name"];
    $absolute_path = realpath (__DIR__ ."/../assets/img") . "/". $file_name;
    $relative_path = "/assets/img/" . $file_name;
    
    if(!move_uploaded_file($tmp_name,$absolute_path)){
        die("<div class='text-center'><div class='alert alert-danger'> fail to upload image </div></div>");
    }
    
    $sql = "UPDATE posts 
    SET title = '$title' , content = '$content' , image = '$relative_path' 
    where id = '$id'";

    $res = mysqli_query($conn,$sql);
    if($res){
        return true;
    }else{
        return false;
    }
}
/********************** function to    ********************** */


