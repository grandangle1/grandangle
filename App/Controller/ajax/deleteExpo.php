<?php
namespace App\Controller\Ajax;
use App\Table\UserTable;
use App\Utils;
use Core\Auth\Auth;
use Core\Auth\Session;

require '../../Utils.php';
Utils::start();

$bdd = Utils::getDb();
$session = Session::getSession();
$auth = new Auth($session);
$auth->loggedOnly();

$expoT = Utils::getTable('Exposition');
$resp = $expoT->deleteExpo($_POST['idExpo']);
if($resp) {
    Utils::getTable('Activity')->createAction("delete", ["exposition" => $_POST['idExpo']]);
    echo "success";
} else {
    echo "fail";
}
