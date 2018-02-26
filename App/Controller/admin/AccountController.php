<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 20/02/2018
 * Time: 18:48
 */
namespace App\Controller\Admin;


use App\Entity\ExpositionEntity;
use App\Utils;
use Core\Auth\Session;

class AccountController extends AdminController {

    public function show() {
        $limitMonth = date("Y-m-d H:i:s", strtotime("-1 months"));
        $data["admins"] = Utils::getTable('User')->query("
       SELECT COUNT(activity.id) AS actions , administrateur.id, administrateur.identifiant, administrateur.email, administrateur.name, administrateur.surname 
       FROM administrateur, activity 
       WHERE activity.idAdmin = administrateur.id AND activity.heure > ?
       GROUP BY administrateur.id", [$limitMonth]);

        $this->render('admin.account', $data);
    }

    public function add() {

        $this->render('admin.add-account');
    }

    /**
     * Delete an admin accout
     */
    public function delete() {
        $user = Utils::getTable('User')->query("SELECT id FROM administrateur WHERE id = ?", [$_GET['id']], true);
        if($user) {
            Utils::getTable('User')->delete(["id"], [$_GET['id']]);
            $this->session->setFlash('success', "L'administrateur à bien été supprimé!");
        } else {
            $this->session->setFlash('warning', "Ne joue pas avec l'url s'il te plait!");
        }
        header('location: index.php?p=admin.account.show');
        exit();
    }

    /**
     * edit an acccout
     */
    public function edit() {
        Utils::getTable('User')->update($_POST, ["id" => $_POST['id']]);
        Session::getSession()->setFlash('success', "Les modifications ont été enregistrées");
        header('location: index.php?p=admin.account.show');
    }

    /**
     * create new admin
     */
    public function create() {
        unset($_POST['passwordConfirm']);
        $_POST['password'] = sha1($_POST['password']);
        Utils::getTable('User')->insert($_POST);
        Session::getSession()->setFlash('success', "Le compte à bien été créé");
        Utils::getTable('Activity')->createAction("create");
        header('location: index.php?p=admin.account.show');
    }

    public function activity() {
        $data["activities"] = Utils::getTable('Activity')->query("
        SELECT activity.id, activity.idExpo, activity.idType, activity.idOeuvre, activity.libelle, activity.heure 
        FROM `activity`, administrateur 
        WHERE administrateur.id = activity.idAdmin AND administrateur.id = ?
        ORDER BY heure DESC LIMIT 50 OFFSET ".(intval($_GET['page'] - 1) * 50), [$_GET['id']]);
        $data["admin"] = Utils::getTable('User')->query("SELECT name, surname FROM administrateur WHERE id = ?", [$_GET['id']], true);
        var_dump($data);
        $this->render('admin.account-activity', $data);
    }
}