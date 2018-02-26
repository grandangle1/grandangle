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

$validator = Utils::getValidator($_POST);

$validator->isEmail('email');
$validator->isLongEnough('descrArtistFr', 10);
$validator->isLongEnough('descrArtisteEn', 10);
$validator->isLongEnough('generalDescrFr', 10);
$validator->isLongEnough('generalDescrEn', 10);
$_POST['action'] == "edit" ? $validator->isValidWeek('week', $_POST['idExpo']) : $validator->isValidWeek('week');
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
$validatorFile = Utils::getValidator($_FILES);

if(!empty($_FILES['urlImg'][0])) {
    $validatorFile->isValidFormat('file', ["image"], "Seul les images sont accéptés.");
}

if($validator->isValid() && $validatorFile->isValid()) {
    $expoT = Utils::getTable('Exposition');
	if($_POST['action'] == "add" ){

        $expoT->createExpo($_POST, $_FILES);
		$session->setFlash('success', "L'exposition a bien été enregistrée");
	} else if($_POST['action'] == "edit") {

        $expoT->updateExpo($_POST, $_FILES);
        $session->setFlash('success', "L'exposition a bien été modifiée");
        Utils::getTable('Activity')->createAction("edit", ["idExpo" => $_POST['idExpo']]);
	}

	echo "success";
	exit();
} else {
	echo json_encode([$validator->getErrors(), $validatorFile->getErrors()]);
}

