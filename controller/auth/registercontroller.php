<?php 

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $name  = trim($_POST['name']);
    $email = trim($_POST['email']);
    $password =trim($_POST['password']);


$error = valid_register($name,$email,$password);

if(!empty($error)){
    set_message('danger',$error);
    header("location: ./index.php?page=register");
    exit;
}

if (register_user($name, $email, $password)) 
{
    set_message('success', "Registered Successfully");
    header("Location: ./index.php");
    exit;
} 
else {
    set_message('danger', "Failed to Register");
    header("location: ./index.php?page=register");
    exit;
}
}