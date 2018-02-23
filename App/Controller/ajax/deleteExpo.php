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
$resp = $expoT->delete(['idExpo'], [$_POST['idExpo']]);

if($resp) {
    echo "success";
} else {
    echo "fail";
}
