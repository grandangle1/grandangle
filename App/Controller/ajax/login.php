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

$userT = Utils::getTable('User');
$user = $userT->findWithCond(['identifiant', 'password'], [$_POST['identifiant'], sha1($_POST['password'])], true);

if($user) {
    $auth->login($user);
	$pseudo = $session->read('auth')->identifiant;
	$pass = $session->read('auth')->password;
	$session->setFlash('success', "Vous êtes bien connecter en tant que $pseudo!");
	$session->setFlash('danger', "Ne divulger PAS votre mot de passe ($pass)");
	echo "success";
} else {
	//$auth->incrementFail($bdd);
	echo json_encode("Identifiant ou mot de passe incorrect");
}



