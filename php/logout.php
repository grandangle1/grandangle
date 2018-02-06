<?php 
require '../inc/bootstrap.php';
$session = Session::getInstance();
$auth = new Auth($session);
$auth->disconnect();

header('location: ../pages/index.php');

