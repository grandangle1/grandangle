<?php

require '../inc/bootstrap.php';
$session = Session::getInstance();
$auth = new Auth($session);
$bdd = App::getDatabase();
$auth->loggedOnly();
$auth->idAndTypeRequired('idExpo', 'listOeuvre', "Veuillez choisir une exposition dans le menu d'administration");
$oeuvre = $bdd->query("SELECT * FROM oeuvre WHERE idOeuvre = ?", [$session->read('idOeuvre')[0]])->fetch();
?>


<?php require '../inc/header.php' ?>

<?php Getter::getFormOeuvre($oeuvre); ?>

<?php require '../inc/footer.php' ?>




