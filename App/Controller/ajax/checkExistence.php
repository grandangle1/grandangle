<?php
namespace App\Controller\Ajax;
use App\Entity\OeuvreEntity;
use App\Entity\UserEntity;
use App\Service\Validator;
use App\Table\UserTable;
use App\Utils;
use Core\Auth\Auth;
use Core\Auth\Session;

require '../../Utils.php';
Utils::start();

$session = Session::getSession();
$auth = new Auth($session);
$auth->loggedOnly();

$user = new UserEntity();


if(!$user = $user->checkExistence($_POST)) {
    echo json_encode(["resp" => "success"]);
} else {
    echo json_encode($user);
}