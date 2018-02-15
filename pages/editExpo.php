<?php 
require '../inc/bootstrap.php';

$session = Session::getInstance();
$auth = new Auth($session);
$auth->loggedOnly();
$auth->idAndTypeRequired('idExpo', 'editExpo', "Veuillez choisir une exposition dans le menu d'administration");
$bdd = App::getDatabase();
$get = new Get($bdd);
$expo = $get->getExpo($session->read('idExpo')[0]);
 ?>

<?php require '../inc/header.php' ?>

<?php Getter::getFormExpo($expo); ?>

<?php require '../inc/footer.php' ?>

