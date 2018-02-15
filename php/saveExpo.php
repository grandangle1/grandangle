<?php

require '../inc/bootstrap.php';

$validator = new Validator($_POST);
$bdd = App::getDatabase();
$session = Session::getInstance();
$auth = new Auth($session);
$auth->loggedOnly();

$validator->isEmail('email');
$validator->isLongEnough('descrArtistFr', 10);
$validator->isLongEnough('descrArtisteEn', 10);
$validator->isLongEnough('generalDescrFr', 10);
$validator->isLongEnough('generalDescrEn', 10);
$validator->isValidWeek($bdd, 'week');
$validator->isLetter('nameArtist');
$validator->isLetter('surnameArtist');
$validator->isLetter('nameContact');
$validator->isLetter('surnameContact');
$validator->isShortEnough('nameArtist', 100);
$validator->isShortEnough('surnameArtist', 100);
$validator->isShortEnough('nameContact', 100);
$validator->isShortEnough('surnameContact', 100);
$validator->isShortEnough('descrArtistFr', 5000, "La description doit faire moins de 5000 charactere.");
$validator->isShortEnough('descrArtisteEn', 5000, "La description doit faire moins de 5000 charactere.");
$validator->isShortEnough('generalDescrFr', 5000, "La description doit faire moins de 5000 charactere.");
$validator->isShortEnough('generalDescrEn', 5000, "La description doit faire moins de 5000 charactere.");
$validator->isShortEnough('address', 150);

var_dump($_POST);
var_dump($session->getSession());

if($validator->isValid()) {
	$insert = new Insert();
	if($_POST['action'] == "add") {
		$insert->insertExpo($bdd, $_POST);
		$session = Session::getInstance()->setFlash('success', "L'exposition à bien été ajoutée");
	} else if($_POST['action'] == "edit") {
		$insert->updateExpo($bdd, $_POST, $session->read('idExpo')[0]);

		//$session->delete('idExpo');
	}
	
	echo "success";
	exit();
} else {
	echo json_encode($validator->getErrors());
}

