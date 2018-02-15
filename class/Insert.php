<?php

class Insert {

	public function __construct() {

	}

	public function insertExpo($bdd, $data) {
		$bdd->query("INSERT INTO `contact` (`nameContact`, `surnameContact`, `email`, `telephone`, `address`, `city`) VALUES ( ?, ?, ?, ?, ?, ?)", [$data['nameContact'], $data['surnameContact'], $data['email'], $data['telephone'], $data['address'], $data['city']]);
		$idContact = $bdd->getLastInsertId();

		$date = new DateTime($data['week']);
		$week = $date->format("Y-W");

		$bdd->query("INSERT INTO `exposition` (`week`, `generalDescrFR`, `generalDescrEN`, `idContact`) VALUES (?, ?, ?, ?) ",[$week, $data['generalDescrFr'], $data['generalDescrEn'], $idContact]);
		$idExpo = $bdd->getLastInsertId();
		$bdd->query("INSERT INTO `artist` (`nameArtist`, `surnameArtist`, `birthDate`, `descrArtistFR`, `descrArtistEN`, `idExpo`) VALUES ( ?, ?, ?, ?, ?, ?);", [$data['nameArtist'], $data['surnameArtist'], $data['birthDate'], $data['descrArtistFr'], $data['descrArtisteEn'], $idExpo]);
		$idArtist = $bdd->getLastInsertId();
		$bdd->query("UPDATE `exposition` SET `idArtist` = $idArtist WHERE `exposition`.`idExpo` = $idExpo;");
		$bdd->query("UPDATE `contact` SET `idExpo` = $idExpo WHERE `contact`.`idContact` = $idContact;");
	}

	public function updateExpo($bdd, $data, $idExpo) {
		$bdd->query("UPDATE `exposition` SET `week` = ?, `generalDescrFR` = ?, `generalDescrEN` = ? WHERE `exposition`.`idExpo` = ?;", []);
	}

	public function insertNewOeuvre($bdd, $data, $idExpo) {
		$bdd->query("INSERT INTO `oeuvre` (`nomOeuvre`, `descrArtistFR`, `descrArtistEN`, `salle`, `idExpo`) VALUES ( ?, ?, ?, ?, ?);", [$data['nomOeuvre'], $data['descrOeuvreFr'], $data['descrOeuvreEn'], $data['salle'], $idExpo]);
		return $bdd->getLastInsertId();
	}

	public function updateOeuvre($bdd, $data, $id) {
		$date = new DateTime($data['week']);
		$week = $date->format("Y-W");
		$bdd->query("UPDATE `oeuvre` SET `nomOeuvre` = ?, `descrArtistFR` = ?, `descrArtistEN` = ?, `salle` = ? WHERE `oeuvre`.`idOeuvre` = ?;", [$data['nomOeuvre'], $data['descrOeuvreFr'], $data['descrOeuvreEn'], $data['salle'], $id]);
	}

	public function writeFile($file, $idOeuvre, $bdd) {
		$path = "../img/file_oeuvre/";
		$idFile = str_replace("/", $idOeuvre.".", $file['file']['type']);
		
		if(move_uploaded_file($file['file']['tmp_name'], $path.$idFile)){
			$bdd->query("UPDATE `oeuvre` SET `urlFile` = ? WHERE `idOeuvre` = ?;", [$path.$idFile, $idOeuvre]);
		}
	}

	public function deleteExpo($bdd, $idExpo) {
		
	}
}