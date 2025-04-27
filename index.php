<?php
session_start();
require_once('config/db.php');
require_once('core/validation.php');
require_once('core/function.php');
require_once('view/layout/header.php');

/*********************** show message  ******************************/
?>

<div class="container text-center my-5">
    <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <div class="message-container p-4 ">
                <?php show_message(); ?>
            </div>
        </div>
    </div>
</div>

<?php
/************************ routing system **************************** */
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

$rout = [
    'home'                =>  './view/home.php',
    'register'            =>  './view/auth/register.php',
    'login'               =>  './view/auth/login.php',
    'main'                =>  './view/blog/main.php',
    'create'              =>  './view/blog/create.php',
    'show'                =>  './view/blog/show.php',
    'update'              =>  './view/blog/update.php',
    'logout'              =>  './controller/auth/logoutcontroller.php',
    'register_controller' =>  './controller/auth/registercontroller.php',
    'login_controller'    =>  './controller/auth/logincontroller.php',
    'create_controller'   =>  './controller/blog/createcontroller.php',
    'update_controller'   =>  './controller/blog/updatecontroller.php',
    'delete_controller'   =>  './controller/blog/deletecontroller.php',
];

$file = isset($rout[$page]) ? $rout[$page] : './view/error/404.php';
include $file;


/******************** another routing system*************************** */
// switch($page){
//     case 'home' :
//         include "./view/home.php";
//         break;
//     case 'register' :
//         include "./view/auth/register.php";
//         break;
//     case 'login' :
//         include "./view/auth/login.php";
//         break;
//     case 'main' :
//         include "./view/blog/main.php";
//         break;
//     case 'create' :
//         include "./view/blog/create.php";
//         break;
//     case 'show' :
//         include "./view/blog/show.php";
//         break;
//     case 'update' :
//         include "./view/blog/update.php";
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
//     case 'create_controller' :
//         include "./controller/blog/createcontroller.php";
//         break;
//     case 'update_controller' :
//         include "./controller/auth/updatecontroller.php";
//         break;
//     case 'delete_controller' :
//         include "./controller/auth/deletecontroller.php";
//         break;
//     default: 
//         include "./view/error/404.php";
//         break;
// }


require_once('view/layout/footer.php');