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
    $_SESSION['user_name'] = $name;
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

    $sql = " SELECT * FROM usres WHERE email ='$email'";
    $res= mysqli_query($conn,$sql);
    
    if(mysqli_num_rows($res)=== 0){
        set_message("danger", "Invaild email");
        header("location: ./index.php?page=login");
        exit;
    }
    $user = mysqli_fetch_assoc($res);
    if(password_verify($password,$user['password'])){
        $_SESSION['user_name'] = $user['name'];
        return true;
    }
    else 
    {
        return false;
    }

}