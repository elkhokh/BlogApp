<?php
session_start();
require_once('config/db.php');
require_once('core/validation.php');
require_once('core/function.php');
require_once('view/layout/header.php');

/************************ routing system **************************** */
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

$rout = [
    'home'                =>  './view/home.php',
    'register'            =>  './view/auth/register.php',
    'login'               =>  './view/auth/login.php',
    'logout'              =>  './controller/auth/logoutcontroller.php',
    'register_controller' =>  './controller/auth/registercontroller.php',
    'login_controller'    =>  './controller/auth/logincontroller.php',
];

// showMessages();

$file = isset($rout[$page]) ? $rout[$page] : './view/404.php';
include $file;






/******************** another routing system*************************** */
// switch($page){
//     case 'home' :
//         include "./view/home.php";
//         break;
//     case 'register' :
//         include ".view/auth/register.php";
//         break;
//     case 'login' :
//         include ".view/auth/login.php";
//         break;
//     case 'logout' :
//         include "./controller/auth/logoutcontroller.php";
//         break;
//     case 'register_controller' :
//         include "./controller/auth/registercontroller.php";
//         break;
//     case 'login_controller' :
//         include "./controller/auth/logincontroller.php";
//         break;
//     default: 
//         include "./view/404.php";
//         break;
// }



require_once('view/layout/footer.php');