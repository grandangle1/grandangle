<?Php

require '../inc/bootstrap.php';
$session = Session::getInstance();
$auth = new Auth($session);
$bdd = App::getDatabase();
$auth->loggedOnly();
$auth->idAndTypeRequired('idExpo', 'listOeuvre', "Veuillez choisir une exposition dans le menu d'administration");
$nbOeuvre = App::getNbOeuvre($bdd, $session->read('idExpo')[0]);
$nbPage = floor($nbOeuvre / App::$oeuvrePerPage);
?>

<?php require '../inc/header.php' ?>

<?php Getter::getListOeuvre($session->read('idExpo')[0], $bdd, $nbPage); ?>

<?php require '../inc/footer.php' ?>