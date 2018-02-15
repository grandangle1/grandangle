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

	public function getExpo($idExpo){
		$expo = $this->bdd->query("SELECT * FROM exposition WHERE idExpo = ?;", [$idExpo])->fetch();
		$artist = $this->bdd->query("SELECT * FROM artist WHERE idExpo = ?", [$idExpo])->fetch();
		$contact = $this->bdd->query("SELECT * FROM contact WHERE idExpo = ?", [$idExpo])->fetch();
		$data = ["expo" => $expo, "artist" => $artist, "contact" => $contact];
		return $data;
	}
}