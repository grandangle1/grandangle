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


$validatorFile = Utils::getValidator($_FILES);
if(!empty($_FILES)) {
	$validatorFile->isValidFormat('file', ["png", "jpg", "jpeg"], "Seul les formats png, jpg, jpeg sont accepter.");
}

$validator = Utils::getValidator($_POST);
$validator->isShortEnough("nomOeuvre", 30);
$validator->isShortEnough("descrOeuvreFr", 5000);
$validator->isShortEnough("descrOeuvreEn", 5000);
$validator->isLongEnough("descrOeuvreFr", 5);
$validator->isLongEnough("descrOeuvreEn", 5);

if($validator->isValid() && $validatorFile->isValid()) {
    $oeuvreT = Utils::getTable('Oeuvre');
    extract($_POST);
	if($_POST['action'] == "edit") {

		$oeuvreT->update(["nomOeuvre" => $nomOeuvre, "salle" => $salle, "descrOeuvreFr" => $descrOeuvreFr, "descrOeuvreEn" => $descrOeuvreEn, "idType" => $idType], ["idOeuvre" => $idOeuvre]);
		if(!empty($_FILES)) {
            $oeuvreT->writeFile($_FILES, $idOeuvre) ? true : $session->setFlash('danger', "Erreur durant l'ecriture du fichier! Veuillez contacter un dev :/");
		}

		$session->setFlash('success', "L'oeuvre à bien été modifiée!");
	} else {
	    $bdd = Utils::getDb();
	    $oeuvreT->insert(["nomOeuvre" => $nomOeuvre, "salle" => $salle, "descrOeuvreFr" => $descrOeuvreFr, "descrOeuvreEn" => $descrOeuvreEn, "idType" => $idType, "idExpo" => $idExpo]);
        $idOeuvre = $bdd->getLastId();
        $oeuvreT->writeFile($_FILES, $idOeuvre) ? true : $session->setFlash('danger', "Erreur durant l'ecriture du fichier! Veuillez contacter un dev :/");

		$session->setFlash('success', "L'oeuvre à bien été ajouter à l'exposition!");
	}
	echo "success";
	exit();
} else {
	echo json_encode(["text" => $validator->getErrors(), "file" => $validatorFile->getErrors()]);
}





