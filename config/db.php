<?php

try{
$conn=mysqli_connect("localhost",'root',"","blog_app");

if (!$conn)
{
    header("location: ./view/error/maintenance.php");
    exit;
}

}
catch(Exception $ex)
{
    header("location: ./view/error/maintenance.php");
    exit;
}
