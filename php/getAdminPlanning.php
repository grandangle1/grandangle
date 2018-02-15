<?php

require '../inc/bootstrap.php';

$bdd = App::getDatabase();

for($i = 0; $i < 4; $i++) {
	$data[$i] = App::getWeek($bdd, ($_POST['weekOffset'] * 4 + $i));
}

$data['weeks'] = App::getWeeks(($_POST['weekOffset'] * 4));

echo json_encode($data);

