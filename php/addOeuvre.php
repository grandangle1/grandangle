<?php

require '../inc/bootstrap.php';

$bdd = App::getDatabase();

$validatorFile = new validator($_FILES);
$validatorFile->isValidFormat('file', ["png", "jpg", "jpeg"], "Seul les formats png, jpg, jpeg sont accepter.");

$validator = new Validator($_POST);
$validator->isShortEnough("nomOeuvre", 30);
$validator->isShortEnough("descrOeuvreFr", 5000);
$validator->isShortEnough("descrOeuvreEn", 5000);
$validator->isLongEnough("descrOeuvreFr", 10);
$validator->isLongEnough("descrOeuvreEn", 10);

if($validator->isValid() && $validatorFile->isValid()) {
	$session = Session::getInstance();
	$session->setFlash('success', "L'oeuvre à bien été ajouter à l'exposition!");
	echo "success";
	exit();
} else {
	echo "false";
}

//var_dump($_POST);




