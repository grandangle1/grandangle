<?php

require '../inc/bootstrap.php';

$bdd = App::getDatabase();
$session = Session::getInstance();

$validatorFile = new validator($_FILES);
if(!empty($_FILES)) {
	$validatorFile->isValidFormat('file', ["png", "jpg", "jpeg"], "Seul les formats png, jpg, jpeg sont accepter.");
}


$validator = new Validator($_POST);
$validator->isShortEnough("nomOeuvre", 30);
$validator->isShortEnough("descrOeuvreFr", 5000);
$validator->isShortEnough("descrOeuvreEn", 5000);
$validator->isLongEnough("descrOeuvreFr", 10);
$validator->isLongEnough("descrOeuvreEn", 10);

if($validator->isValid() && $validatorFile->isValid()) {
	$insert = new Insert();
	$session = Session::getInstance();
	if($_POST['action'] == "edit") {
		$insert->updateOeuvre($bdd, $_POST, $session->read('idOeuvre')[0]);
		if(!empty($_FILES)) {
			$insert->writeFile($_FILES, $session->read('idOeuvre')[0], $bdd);
		}
		$session->setFlash('success', "L'oeuvre à bien été modifiée!");
	} else {
		$idExpo = $session->read('idExpo')[0];
		$idOeuvre = $insert->insertNewOeuvre($bdd, $_POST, $idExpo);
		$insert->writeFile($_FILES, $idOeuvre, $bdd);
		$session->setFlash('success', "L'oeuvre à bien été ajouter à l'exposition!");
	}
	echo "success";
	exit();
} else {
	echo "false";
}





