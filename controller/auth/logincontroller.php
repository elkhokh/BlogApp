<?php 

if($_SERVER['REQUEST_METHOD'] == "POST"){
    // $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password =trim($_POST['password']);
// echo "$email and $password"  ; exit;

$error = valid_login($email,$password);

if(!empty($error)){
    set_message('danger',$error);
    header("location: ./index.php?page=login");
    exit;
}

if (login_user($email, $password )) 
{
    set_message('success', "login Successfully");
    header("Location: ./index.php");
    exit;
} 
else {
    set_message('danger', "Failed to login ");
    header("location: ./index.php?page=login");
    exit;
}
}