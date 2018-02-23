<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 20/02/2018
 * Time: 13:44
 */
namespace Core\Database;
use \PDO;

class MysqlDatabase extends Database {

    private $db_host, $db_name, $db_pass, $db_login;
    private $bdd;

    public function __construct($db_host, $db_name, $db_pass, $db_login) {
        $this->db_host = $db_host;
        $this->db_login = $db_login;
        $this->db_pass = $db_pass;
        $this->db_name = $db_name;
    }

    /**
     * Make a query to the DB
     * @param $statement
     * @param null $class_name If null fetchMode will be FETCH_OBJ
     * @param bool $one if true fetch the datas else fetchAll
     * @return array|mixed|\PDOStatement
     */
    public function query($statement, $class_name = null, $one = false) {
        $resp = $this->getPDO()->query($statement);
        if(strpos($statement, "UPDATE") === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0) {
            return $resp;
        }
        $class_name === null ? $resp->setFetchMode(PDO::FETCH_OBJ) : $resp->setFetchMode(PDO::FETCH_CLASS, $class_name);
        return $one ? $resp->fetch() : $resp->fetchAll();
    }

    /**
     * Make a prepared statement to the DB allowing
     * @param $statement
     * @param $attributes
     * @param null $class_name If null fetchMode will be FETCH_OBJ
     * @param bool $one if true fetch the datas else fetchAll
     * @return array|bool|mixed
     */
    public function prepare($statement, $attributes, $class_name = null, $one = false) {
        $req = $this->getPDO()->prepare($statement);
        $res = $req->execute($attributes);
        if(strpos($statement, "UPDATE") === 0 ||
            strpos($statement, 'INSERT') === 0 ||
            strpos($statement, 'DELETE') === 0) {
            return $res;
        }
        $class_name === null ? $req->setFetchMode(PDO::FETCH_OBJ) : $req->setFetchMode(PDO::FETCH_CLASS, $class_name);
        return $one ? $req->fetch() : $req->fetchAll();

    }

    /**
     * @return PDO
     */
    private function getPdo() {
        if(is_null($this->bdd)) {
            $this->bdd = new PDO("mysql:host=".$this->db_host.";dbname=".$this->db_name, $this->db_login, $this->db_pass);
            $this->bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return $this->bdd;
    }

    public function getLastId() {
        return $this->getPDO()->lastInsertId();
    }

}