<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 20/02/2018
 * Time: 09:57
 */
namespace App\Table;

class Table  {

    protected $bdd;
    /**
     * Correspondance dans la base de donnee
     * @var
     */
    protected $table;

    public function __construct(\Core\Database\MysqlDatabase $bdd) {
        $this->bdd = $bdd;
        if(is_null($this->table)) {
            $parts = explode('\\', get_class($this));
            $this->table = str_replace('Table', '', end($parts));
        }
    }


    /**
     * Make a request to DB returning an object of Entity type
     * @param $statement
     * @param null $attributes
     * @param bool $one
     * @return array|bool|mixed|\PDOStatement
     */
    public function query($statement, $attributes = null, $one = false) {
        if($attributes) {
            return $this->bdd->prepare($statement, $attributes, str_replace('Table', 'Entity', get_class($this)), $one);

        } else {
            return $this->bdd->query($statement, str_replace('Table', 'Entity', get_class($this)), $one);
        }
    }

    /**
     * Return all element of a table
     * @return array|bool|mixed|\PDOStatement
     */
    public function all() {
        return $this->query("SELECT * FROM ".$this->table);
    }

    /**
     * Find a unique occurence in the table that match the id passed
     * @param $id
     * @return bool|mixed|\PDOStatement
     */
    public function findWithId($id) {
        return $this->query("SELECT * FROM ".$this->table." WHERE id = ?", [$id], null, true);
    }

    public function findWithCond($where, $attributes, $one = false) {
        $parts = [];
        foreach($where as $k) {
            $parts[] = "$k = ?";
        }
        $parts = implode(' AND ', $parts);
        $req = "SELECT * FROM ".$this->table." WHERE ".$parts;
        return $this->query($req, $attributes, $one);

    }

    /**
     * Delete smthg from the DB according to the conditions
     * @param $where array
     * @param $attributes array
     * @return array|bool|mixed|\PDOStatement
     */
    public function delete($where, $attributes) {
        $parts = [];
        foreach($where as $k) {
            $parts[] = "$k = ?";
        }
        $parts = implode(' AND ', $parts);
        $req = "DELETE FROM ".$this->table." WHERE ".$parts;
        return $this->query($req, $attributes);
    }

    /**
     * Insert in the DB according to the fields
     * @param $fields array
     * @return array|bool|mixed|\PDOStatement
     */
    public function insert($fields) {
        $cols = [];
        $vals = [];
        $qm = [];
        foreach ($fields as $k => $v) {
            $cols[] = $k;
            $vals[] = $v;
            $qm[] = "?";
        }
        $req = "INSERT INTO {$this->table} (".implode(', ', $cols).") VALUES (".implode(', ', $qm).");";
        return $this->query($req, $vals);
    }

    /**
     *
     * @param $fields array
     * @param $condition array
     */
    public function update($fields, $condition) {
        $cols = [];
        $vals = [];
        foreach ($fields as $k => $v) {
            if($k != "id") {
                $cols[] = " $k = ?";
                $vals[] = $v;
            }
        }
        $cond = array_keys($condition)[0]." = ?";
        $cols = implode(",", $cols);
        $vals[] = $condition[array_keys($condition)[0]];

        $req = "UPDATE {$this->table} SET {$cols} WHERE {$cond};";
        $this->query($req, $vals);
    }





}