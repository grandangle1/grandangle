<?php

require '../inc/bootstrap.php';

$session = Session::getInstance();
$auth = new Auth($session);
$auth->loggedOnly();
$auth->idAndTypeRequired('idExpo', 'addOeuvre', "Veuillez choisir une exposition dans le menu d'administration");


?>

<?php require '../inc/header.php'; ?>

<?php Getter::getFormOeuvre(); ?>

<?php require '../inc/footer.php'; ?>