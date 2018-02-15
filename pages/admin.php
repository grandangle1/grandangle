
<?php 
require '../inc/bootstrap.php';

$session = Session::getInstance();
$auth = new Auth($session);
$auth->loggedOnly();
$session->delete('idExpo');
$session->delete('idOeuvre');


?>


<?php require '../inc/header.php' ?>

<?php Getter::getAdminPage(); ?>

<?php require '../inc/footer.php' ?>