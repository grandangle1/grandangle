<?php

class Getter {

	static function getFormOeuvre($data = "") {
		 require '../php/htmlContent/formOeuvre.php';
	}

	static function getFormExpo($data = "") {
		$date = new DateTime();
		$parts = explode("-", $data['expo']->week);
		$date->setISODate($parts[0], $parts[1]);
		$date = $date->format("Y-m-d");
		require '../php/htmlContent/formExpo.php';
	}

	static function getAdminPage() {
		require '../php/htmlContent/adminPage.php';
	}

	static function getListOeuvre($idExpo, $bdd, $nbPage) {
		$date = $bdd->query("SELECT week FROM exposition WHERE idExpo= ?", [$idExpo])->fetch();
		$date = $date->week;
		require '../php/htmlContent/listOeuvre.php';
	}
}