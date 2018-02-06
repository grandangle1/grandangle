<?php

class Auth {

	private $session;

	public function __construct($session) {
		$this->session = $session;
	}

	public function connectUser($user) {
		$this->session->write('auth', $user);
	}

	public function login($bdd, $identifiant, $password) {
		
		$user = $bdd->query("SELECT * FROM administrateur WHERE identifiant = ? AND password = ?", [$_POST['identifiant'], $_POST['password']])->fetch();
		
		if($user) {
			$this->connectUser($user);
			return true;
			exit();
		} 
		return false;
	}

	public function disconnect() {
		$this->session->delete('auth');
	}

	public function loggedOnly() {
		if($this->session->read('auth')) {
			return true;
		} else {
			return false;
		}
	}
}