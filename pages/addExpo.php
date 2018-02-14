<?php 
require '../inc/bootstrap.php';

$session = Session::getInstance();
$auth = new Auth($session);
$auth->loggedOnly();
 ?>

<?php require '../inc/header.php' ?>

<?php Getter::getFormExpo(); ?>

<?php require '../inc/footer.php' ?>