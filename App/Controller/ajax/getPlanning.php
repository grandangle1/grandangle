<?php
namespace App\Controller\Ajax;
use App\Utils;

require '../../Utils.php';
Utils::start();

for($i = 0; $i < 4; $i++) {
	$data[$i] = Utils::getWeek(($_POST['weekOffset'] * 4 + $i));
}

$data['weeks'] = Utils::getWeeks(($_POST['weekOffset'] * 4));


echo json_encode($data);

