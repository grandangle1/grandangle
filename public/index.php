<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 20/02/2018
 * Time: 00:02
 */
use App\Utils;

define('ROOT', dirname(__DIR__));
require '../App/Utils.php';

Utils::load();
ini_set('display_errors',1);
isset($_GET['p']) ? $page = $_GET['p'] : $page = "guest.index";

$page = explode('.' ,$page);



if($page[0] === "guest") {
    $controller = '\App\Controller\guest\GuestController';
    $action = $page[1];
} else {
    $page[1] = ucfirst($page[1]);
    $controller = '\App\Controller\Admin\\'.$page[1].'Controller';
    $action = $page[2];
    $page[2] = "";
}

$page = implode('/', $page);

$controller = new $controller();
$controller->$action();


