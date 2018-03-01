<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 20/02/2018
 * Time: 09:58
 */
namespace App\Table;
use \App\Utils;
use Core\Auth\Session;
class ParticipationTable extends Table {

    protected $table = "participation";


    public function create($idExpo, $idArt) {
        $exist = $this->query("SELECT idExpo FROM participation WHERE idExpo = ? AND idArtist = ?", [$idExpo, $idArt], true);
        if(!isset($exist->idExpo)) {
            $this->insert(["idExpo" => $idExpo, "idArtist" => $idArt]);
            Utils::getTable('Activity')->createAction("participate", ["artist%exposition" => $idArt."%".$idExpo]);
            Session::getSession()->setFlash("info", "L'artiste à bien été ajouté à l'exposition");
        }
    }
}