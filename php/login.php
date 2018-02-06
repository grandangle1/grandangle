<?php 

require '../inc/bootstrap.php';

$bdd = App::getDatabase();
$session = Session::getInstance();
$auth = new Auth($session);

$user = $auth->login($bdd, $_POST['identifiant'], $_POST['password']);
if($user) {
	echo "success";
} else {
	echo "fail";
}



