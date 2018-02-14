<?php

class Validator {

	private $data;
	private $errors = [];

	public function __construct($data) {
		$this->data = $data;
	}

	public function getFields($field) {
		if(!isset($this->data[$field])){
			return null;
		} else {
			return $this->data[$field];
		}
	}

	public function isEmail($field, $errorMsg = "Format d'email incorrect!") {
		if(!filter_var($this->getFields($field), FILTER_VALIDATE_EMAIL)) {
			$this->errors[] = [$field, $errorMsg];
		}
	}

	public function isLetter($field, $errorMsg = "Ce champ ne doit comporter que des lettres.") {
		if(!preg_match("/^[a-zA-Z]+$/", $this->getFields($field))) {
			$this->errors[] = [$field, $errorMsg];
		}
	}

	public function isShortEnough($field, $length, $errorMsg = "Ce champ est trop long") {
		if(strlen($this->getFields($field)) > $length) {
			$this->errors[] = [$field, $errorMsg];
		} 
	}

	public function isLongEnough($field, $length, $errorMsg = "Ce champ n'est pas assez long!") {
		if(strlen($this->getFields($field)) < $length){
			$this->errors[] = [$field, $errorMsg];
		}
	}

	
	public function isValidWeek($bdd, $field, $errorMsg = ["La date est déja passée.", "Il y a deja une expo a cette date."]) {
		$week = new DateTime($this->getFields($field));
		$week = $week->Format("Y-W");
		$now = new DateTime();
		$now = $now->Format("Y-W");
		if($now < $week) {
			$exist = $bdd->query("SELECT * FROM exposition WHERE week = ?", [$week])->fetch();
			if($exist) {
				$this->errors[] = [$field, $errorMsg[1]];
			}
		} else {
			$this->errors[] = [$field, $errorMsg[0]];
		}
	}

	public function isValidFormat($field, $acceptedFormat, $errorMsg = "Ce format n'est pas supporté") {
		$parts = explode("/", $this->getFields($field)['type']);
		$format = $parts[1];
		for($i = 0; $i < sizeof($acceptedFormat); $i++) {
			if($format == $acceptedFormat[$i]) {
				return true;
			}
		}
		$this->errors[] = [$field, $errorMsg];
	}

	public function isValid() {
		return empty($this->errors);
	}

	public function getErrors() {
		$errorsArray = $this->errors;
		$this->errors = [];
		return $errorsArray;
	}

}