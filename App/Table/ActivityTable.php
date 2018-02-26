<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 21/02/2018
 * Time: 13:20
 */
namespace App\Table;

use App\Utils;
use Core\Auth\Session;

class ActivityTable extends Table {

    protected $table = "activity";

    /**
     * @param $libelle Type of action
     * @param table name + id
     */
    public function createAction($libelle, $target) {
        $idAdmin = Session::getSession()->read('auth')->id;
        $now = date("Y-m-d H:i:s");

        $this->insert(["libelle" => $libelle, "heure" => $now, "idAdmin" => $idAdmin, "target" => array_keys($target)[0], "idTarget" => $target[array_keys($target)[0]]]);
    }

    /**
     * @param array $idsOeuvre
     * @return array|bool|mixed|\PDOStatement
     */
    public function getListOeuvreActivity($idsOeuvre) {

        $conds = [];
        $vals = [];
        foreach ($idsOeuvre as $idOeuvre) {
            $conds[] = "activity.idTarget = ?";
            $vals[] = $idOeuvre;
        }
        $conds = implode(" OR ", $conds);

        $req = "SELECT activity.idTarget, activity.libelle, MAX(activity.heure) AS heure, administrateur.name, administrateur.surname 
        FROM activity, administrateur 
        WHERE ($conds) AND administrateur.id = activity.idAdmin AND target = 'oeuvre' GROUP BY activity.idTarget;";

        return $this->query($req, $vals);
    }

    /**
     * @param $id
     * @param $type oeuvre / expo / type
     * @return list of activity
     */
    public function getActivity($id, $target) {
        $req = "SELECT activity.id, activity.libelle, activity.heure, administrateur.surname, administrateur.name 
        FROM activity, administrateur
        WHERE activity.target = ? AND activity.idTarget = ? AND administrateur.id = activity.idAdmin 
        ORDER BY heure DESC";
        return $this->query($req, [$target, $id]);
    }

    /**
     * @param $vals array id-admin
     */
    public function selOr($vals) {
        foreach ($vals as $val) {
            $conds[] = " activity.idAdmin = $val ";
        }
        $conds = implode(" OR ", $conds);
        $req = "SELECT COUNT(activity.id) AS actions, activity.idAdmin FROM activity WHERE $conds GROUP BY activity.idAdmin";
        return $this->query($req, $vals);
    }
}