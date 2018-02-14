<?php 

require '../inc/bootstrap.php';

$bdd = App::getDatabase();
$session = Session::getInstance();
$auth = new Auth($session);

$user = $auth->login($bdd, $_POST['identifiant'], $_POST['password']);
if($user) {
	$pseudo = $session->read('auth')->identifiant;
	$pass = $session->read('auth')->password;
	$session->setFlash('success', "Vous êtes bien connecter en tant que $pseudo!");
	$session->setFlash('danger', "Ne divulger PAS votre mot de passe ($pass)");
	echo "success";
} else {
	$auth->incrementFail($bdd);
	echo "fail";
}



