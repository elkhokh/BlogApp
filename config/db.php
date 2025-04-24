<?php
// try and catch php with database

try{
$conn=mysqli_connect("localhost",'root',"","blog_app");
if (!$conn){
 
    header("location: ./view/maintenance.php");
    exit;
}

}
catch(Exception $ex){
        
    header("location: ./view/maintenance.php");
}










// if(!$conn) {
//     echo "not select database";
// }
// if(!$conn)
// {
// die("failed connection database".mysqli_connect_error());
// }