<?php 
class Database {

	private $bdd;

	public function __construct($login, $dbname, $password, $host = 'localhost') {
		$this->bdd = new PDO('mysql:host='.$host.';dbname='.$dbname, $login, $password);
		$this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		$this->bdd->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
	}


	public function query($query, $params = false) {

		if($params) {
			$response = $this->bdd->prepare($query);
			$response->execute($params);
		} else {
			$response = $this->bdd->query($query);
		}
		return $response;
	}

}





