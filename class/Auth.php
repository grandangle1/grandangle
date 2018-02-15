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
		if(!$this->session->read('auth')) {
			$this->session->setFlash('danger', 'Vous n\'avez pas le droit d\'acceder à cette page');
			header('location: landing.php');
			exit();
		}
	}

	public function idAndTypeRequired($key, $type,$message = 'Vous n\'avez pas le droit d\'acceder à cette page') {
		if(!$this->session->read($key) || $this->session->read($key)[1] != $type) {
			$this->session->setFlash('danger', $message);
			header('location: admin.php');
			exit();
		}
	}

	public function fieldRequire($field, $message ="Vous devez selectionner une oeuvre!") {
		if(!$this->session->read($field)) {
			$this->session->setFlash('danger', $message);
			header('location: admin.php');
			exit();
		}
	}

	public function incrementFail($bdd) {
		$currentFail = $bdd->query("SELECT * FROM fail")->fetch();
		$bdd->query("UPDATE fail SET nbFail = ".($currentFail->nbFail + 1).";");
	}
}