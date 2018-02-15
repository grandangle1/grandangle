<?php

class Getter {

	static function getFormOeuvre($data = "") {
		 require '../php/htmlContent/formOeuvre.php';
	}

	static function getFormExpo() {
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