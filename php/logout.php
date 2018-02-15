<?php 
require '../inc/bootstrap.php';
$session = Session::getInstance();
$auth = new Auth($session);
$auth->disconnect();
$session->setFlash('success', 'Vous avez été déconnecté avec succés.');

header('location: ../pages/landing.php');

