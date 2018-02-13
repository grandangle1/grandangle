
<?php 
require '../inc/bootstrap.php';

$session = Session::getInstance();
$auth = new Auth($session);
$auth->loggedOnly();


?>


<?php require '../inc/header.php' ?>


<h1 style="text-align: center;">Admin page</h1>
<a href="addExpo.php">Ajouter une expo</a><br>
<a href="addOeuvre.php">Ajouter une oeuvre</a>

<?php require '../inc/footer.php' ?>