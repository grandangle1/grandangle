<?php

class App {

	static $bdd;

	static function getDatabase() {

		if(!self::$bdd) {
			self::$bdd = new Database('root', 'grand-angle', '');
		}

		return self::$bdd;
	}
}