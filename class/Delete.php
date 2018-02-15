<?php

class Delete {

	public function __construct() {

	}

	public function deleteExpo($bdd, $idExpo) {
		$bdd->query("DELETE FROM exposition WHERE idExpo= ?;", [$idExpo]);
	}


}