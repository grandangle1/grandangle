<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 21/02/2018
 * Time: 13:20
 */
namespace App\Table;

use Core\Auth\Session;

class ActivityTable extends Table {

    protected $table = "activity";

    /**
     * @param $libelle Type of action
     * @param $idType id0euvre / idExpo  + value of id
     */
    public function createAction($libelle, $type) {
        $idAdmin = Session::getSession()->read('auth')->id;
        $now = date("Y-m-d H:i:s");

        $this->query("INSERT INTO `activity` (`id`, `libelle`, `heure`, `idAdmin`, `".array_keys($type)[0]."`) VALUES (?, ?, ?, ?, ?);",
            [NULL, $libelle, $now, $idAdmin, $type[array_keys($type)[0]]]);
    }

    /**
     * @param array $idsOeuvre
     * @return array|bool|mixed|\PDOStatement
     */
    public function getListOeuvreActivity($idsOeuvre) {

        $conds = [];
        $vals = [];
        foreach ($idsOeuvre as $idOeuvre) {
            $conds[] = "activity.idOeuvre = ?";
            $vals[] = $idOeuvre;
        }
        $conds = implode(" OR ", $conds);

        $req = "SELECT activity.idOeuvre, activity.libelle, MAX(activity.heure) AS heure, administrateur.name, administrateur.surname 
        FROM activity, administrateur 
        WHERE ($conds) AND administrateur.id = activity.idAdmin GROUP BY activity.idOeuvre;";

        return $this->query($req, $vals);
    }

    /**
     * @param $id
     * @param $type oeuvre / expo / type
     * @return list of activity
     */
    public function getActivity($id, $type) {
        $req = "SELECT activity.id, activity.libelle, activity.heure, administrateur.surname, administrateur.name 
        FROM activity, administrateur
        WHERE activity.id".ucfirst($type)." = ? AND administrateur.id = activity.idAdmin 
        ORDER BY heure DESC";
        return $this->query($req, [$id]);
    }
}