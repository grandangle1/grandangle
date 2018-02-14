<?php

require '../inc/bootstrap.php';

$session = Session::getInstance();
$auth = new Auth($session);
$auth->loggedOnly();

$session->write('idExpo', $_POST['idExpo']);

echo "success";





