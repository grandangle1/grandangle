<?php

require '../inc/bootstrap.php';
$session = Session::getInstance();
$auth = new Auth($session);
$auth->loggedOnly();
$auth->idAndTypeRequired('idExpo', 'listOeuvre', "Veuillez choisir une exposition dans le menu d'administration");
$bdd= App::GetDatabase();
$get = new Get($bdd);
$oeuvres = $get->getPageOeuvre($session->read('idExpo')[0], $_POST['page'], App::$oeuvrePerPage);

echo json_encode($oeuvres);