<?php

require '../inc/bootstrap.php';

$session = Session::getInstance();
$auth = new Auth($session);
$auth->loggedOnly();
$session->write('idOeuvre', [$_POST['idOeuvre']]);

echo "success";



