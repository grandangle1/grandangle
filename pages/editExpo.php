<?php

$session = Session::getInstance();
$auth = new Auth($session);
$auth->loggedOnly();



