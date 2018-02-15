<?php

require '../inc/bootstrap.php';
$session = Session::getInstance();
$auth = new Auth($session);
$auth->loggedOnly();

$delete = new Delete();
$delete->deleteExpo(App::getDatabase(), $_POST['idExpo']);
echo "success";