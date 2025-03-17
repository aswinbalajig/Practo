<?php 
session_start();
require 'conf.php';
define("BASE_PATH", __DIR__);
define("FOLDER","php_project");
define("DB_CONFIG_NAME","mysql");

$uri = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$uri = urldecode($uri);
$uri = str_replace('/' . FOLDER, "", $uri);

$method = $_POST["method"] ?? $_SERVER["REQUEST_METHOD"];

$router = require 'router.php';
require 'routes.php';
if(!isset($_SESSION['user'])) 
{   
    file_put_contents("logs.txt", "\n reached loggedout condition uri={$uri}", FILE_APPEND);
    if($uri==='/login')
    {
        $router->route($uri,$method);
        exit(); 
    }
    else if($uri==='/patients/signup' || $uri==='/doctors/signup')
    {   $router->route($uri,$method);
        exit();
    }
    else
    {
        header("Location:/".FOLDER."/login");
        exit();
    }
}

if ($uri==='/')
{
    if($_SESSION['user_type']==='patient')
    {
        $uri='/patients';
    }
    else if($_SESSION['user_type']==='doctor')
    {
        $uri='/doctors';
    }
}
$router->route($uri,$method);


// If user is NOT logged in and NOT already on /login, redirect

// if (!isset($_SESSION['user']) && $uri !== '/login') {   
//     header("Location: /FOLDER/login");
//     exit();
// }

// If user is logged in and visits / or /index.php, redirect to homepage

// if (isset($_SESSION['user']) && ($uri === '/' || $uri === '/index.php')) {
//     header("Location: /FOLDER/users/homepage");
//     exit();
// }

// Handle routing for other requests

//$router->route($uri, $method);