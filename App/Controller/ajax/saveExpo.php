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

$validator = Utils::getValidator($_POST);

$validator->isEmail('email');
$validator->isLongEnough('generalDescrFr', 10);
$validator->isLongEnough('generalDescrEn', 10);
$validator->isLetter('nameContact');
$validator->isLetter('surnameContact');
$validator->isShortEnough('nameContact', 100);
$validator->isShortEnough('surnameContact', 100);
$validator->isShortEnough('generalDescrFr', 5000, "La description doit faire moins de 5000 charactere.");
$validator->isShortEnough('generalDescrEn', 5000, "La description doit faire moins de 5000 charactere.");
$validator->isShortEnough('address', 150);
$_POST['action'] == "edit" ? $validator->isValidWeek('week', $_POST['idExpo']) : $validator->isValidWeek('week');


if($validator->isValid()) {
    $expoT = Utils::getTable('Exposition');
	if($_POST['action'] == "add" ){

        $expoT->createExpo($_POST);
		$session->setFlash('success', "L'exposition a bien été enregistrée");
	} else if($_POST['action'] == "edit") {

        $expoT->updateExpo($_POST);
        $session->setFlash('success', "L'exposition a bien été modifiée");
        Utils::getTable('Activity')->createAction("edit", ["exposition" => $_POST['idExpo']]);
	}
	echo "success";
	exit();
} else {
	echo json_encode([$validator->getErrors()]);
}

