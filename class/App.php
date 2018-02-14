<?php

class App {

	static $bdd;

	static function getDatabase() {

		if(!self::$bdd) {
			self::$bdd = new Database('root', 'grand-angle', '');
		}

		return self::$bdd;
	}

	static function getWeek($bdd, $offset) {
		$now = new DateTime();
		$offset < 0 ? $now->sub(new DateInterval('P'.abs($offset).'W')) : $now->add(new DateInterval('P'.$offset.'W')); 
		$now = $now->Format("Y-W");

		$data = false;
		if($expo = $bdd->query("SELECT * FROM `exposition` WHERE week = ?", [$now])->fetch()) {
			$data['expo'] = ["idExpo" => $expo->idExpo, "week" => $expo->week];
			$nb = $bdd->query("SELECT COUNT(*) AS nb FROM `oeuvre` WHERE idExpo= ?", [$data['expo']['idExpo']])->fetch();
			$data['nbOeuvre'] = $nb->nb;
			$contact = $bdd->query("SELECT nameContact, email, telephone FROM `contact` WHERE ?", [$expo->idContact])->fetch();
			$data['contact'] = [$contact->nameContact, $contact->telephone, $contact->email];
		}
		return $data;
	}	
}