<?php

class Get {

	private $bdd;

	public function __construct($bdd) {
		$this->bdd = $bdd;
	}

	public function getPageOeuvre($idExpo, $pageNum, $perPage) {
		$oeuvres  = $this->bdd->query("SELECT * FROM oeuvre WHERE idExpo = ? ORDER BY idOeuvre ASC LIMIT ".$perPage." OFFSET ".$pageNum*$perPage.";", [$idExpo])->fetchAll();
		return $oeuvres;
	}
}