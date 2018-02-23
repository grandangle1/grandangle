<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 21/02/2018
 * Time: 22:45
 */
namespace App\Controller\Admin;

use App\Utils;
use Core\Auth\Session;

class OeuvreController extends AdminController {

    /**
     * Add a new art work to the specified exposition
     */
    public function add() {
        $expoT = Utils::getTable('Exposition');
        $expoT->findWithId($_GET['id']) ? true : $this->error();

        $this->render('admin.oeuvre');
    }

    public function liste() {
        $perPage = 2;
        $data = [];
        $data['idExpo'] = $_GET['id'];
        $oeuvreT = Utils::getTable('Oeuvre');
        $date = $oeuvreT->query("SELECT week FROM exposition WHERE idExpo = ?", [$_GET['id']], true);
        $data["date"] = Utils::weekToDay($date->week);
        $nbOeuvre = $oeuvreT->query("SELECT COUNT(*) AS nb FROM oeuvre WHERE idExpo = ?", [$_GET['id']], true);
        $data["nbPage"] = floor(intval($nbOeuvre->nb) / $perPage);
        $nbOeuvre->nb % $perPage == 0 ? true : $data["nbPage"] += 1;
        $data["oeuvres"] = $oeuvres = $oeuvreT->query("SELECT * FROM oeuvre WHERE idExpo = ? ORDER BY idOeuvre ASC LIMIT ".$perPage." OFFSET ".($_GET['page']-1)*$perPage.";", [$_GET['id']]);
        $currentPage = $_GET['page'];
        $data["focus"] = $currentPage;
        $nbPage = $data["nbPage"];
        if($currentPage <= 3) {
            $data["pages"] = [1, 2, 3, 4, 5];
        } else if($currentPage >= ($nbPage - 2)){
            if($nbPage > 5) {
                $data["pages"] = [$nbPage-4, $nbPage-3, $nbPage-2, $nbPage-1, $nbPage];
            } else {
                $data["pages"] = [$nbPage-3, $nbPage-2, $nbPage-1, $nbPage];
            }

        } else {
            $data["pages"] = [$currentPage - 2, $currentPage -1, $currentPage, $currentPage + 1, $currentPage + 2];
        }

        $this->render('admin.listOeuvre', $data);
    }

    public function edit() {
        $oeuvreT = Utils::getTable('Oeuvre');
        $data["oeuvre"] = $oeuvreT->query("SELECT * FROM oeuvre WHERE idOeuvre = ?", [$_GET['id']], true);

        $this->render('admin.oeuvre', $data);
    }

    public function delete() {
        $oeuvreT = Utils::getTable('Oeuvre');
        $oeuvreT->delete(['idOeuvre'], [$_GET['id']]);
        $exist = $oeuvreT->query("SELECT COUNT(*) AS nb FROM oeuvre WHERE idExpo = ?", [$_GET['expo']], true);
        $sesssion = Session::getSession();
        $sesssion->setFlash('success', "L'oeuvre à bien été supprimée.");
        $exist->nb > 0 ? header('location: ?p=admin.oeuvre.liste&page=1&id='.$_GET['expo']) : header('location: ?p=admin.index.calendar');
    }

}