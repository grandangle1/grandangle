<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 21/02/2018
 * Time: 22:45
 */
namespace App\Controller\Admin;

use App\Entity\OeuvreEntity;
use App\Utils;
use Core\Auth\Session;


class TypeController extends AdminController {

    public function edit() {
        $type["type"] = Utils::getTable('Type')->query("SELECT * FROM typeoeuvre WHERE id = ?", [$_GET['id']], true);
        $this->render('admin.type',  $type);
    }


    public function add() {
        $this->render('admin.type');
    }

    /**
     * Handle both edition and creation of type
     */
    public function submit() {
        if(isset($_GET['id'])) {
            Utils::getTable('Type')->update($_POST, ["id" => $_GET['id']]);
            $this->session->setFlash('success', "Le type d'oeuvre à bien été modifié");
            Utils::getTable('Activity')->createAction("edit", ["idType" => $_GET['id']]);
            header("location: index.php?p=admin.index.calendar");
            exit();
        } else {
            Utils::getTable('Type')->insert($_POST);
            $this->session->setFlash('success', "Le type d'oeuvre à bien été enregistrée");
            Utils::getTable('Activity')->createAction("create", ["idType" => Utils::getDb()->getLastId()]);
            header("location: index.php?p=admin.index.calendar");
            exit();
        }
    }

    public function delete() {
        Utils::getTable('Oeuvre')->query("UPDATE oeuvre SET idType = NULL WHERE idType = ?", [$_GET['id']]);
        Utils::getTable('Type')->delete(["id" ], [$_GET['id']]);
        $this->session->setFlash('success', "Le type d'oeuvre à bien été supprimé");

        Utils::getTable('Activity')->createAction("delete", ["idType" => $_GET['id']]);
        header("location: index.php?p=admin.index.calendar");
        exit();
    }
}