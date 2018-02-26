<?php
namespace App\Controller\Ajax;
use App\Table\UserTable;
use App\Utils;
use Core\Auth\Auth;
use Core\Auth\Session;

require '../../Utils.php';
Utils::start();

$session = Session::getSession();
$auth = new Auth($session);
$auth->loggedOnly();
extract($_POST);
Utils::getTable('User')->update(["password" => sha1($password)],  ["id" => $id]);

echo json_encode(["resp" => "success"]);
