
<?php 
require '../inc/bootstrap.php';
$session = Session::getInstance();
$auth = new Auth($session);

if(!$auth->loggedOnly()) {
	$session->setFlash('danger', 'Vous n\'avez pas le droit d\'acceder à cette page');
	header('location: landing.php');
	exit();
}

?>


<?php require '../inc/header.php' ?>


<h1 style="text-align: center;">Admin page</h1>


<?php require '../inc/footer.php' ?>