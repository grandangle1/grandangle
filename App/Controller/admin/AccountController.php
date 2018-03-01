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
       SELECT administrateur.id, administrateur.identifiant, administrateur.email, administrateur.name, administrateur.surname 
       FROM administrateur ", [$limitMonth]);
        $acts = Utils::getTable('Activity')->selOr(Utils::extractObj("id",$data["admins"]));
        $data["admins"] = Utils::fuseOnMatch([$data['admins'], $acts], ["id", "idAdmin"]);
        $data["lastly"] = Utils::getTable('Activity')->query("SELECT id, libelle, heure, target, idTarget  FROM activity ORDER BY heure DESC LIMIT 10");

        $this->render('Admin.account', $data);
    }

    public function add() {

        $this->render('Admin.add-account');
    }

    /**
     * Delete an Admin accout
     */
    public function delete() {
        $user = Utils::getTable('User')->query("SELECT id FROM administrateur WHERE id = ?", [$_GET['id']], true);
        if($user) {
            Utils::getTable('User')->delete(["id"], [$_GET['id']]);
            $this->session->setFlash('success', "L'administrateur à bien été supprimé!");
        } else {
            $this->session->setFlash('warning', "Ne joue pas avec l'url s'il te plait!");
        }
        header('location: index.php?p=Admin.account.show');
        exit();
    }

    /**
     * edit an acccout
     */
    public function edit() {
        Utils::getTable('User')->update($_POST, ["id" => $_POST['id']]);
        Session::getSession()->setFlash('success', "Les modifications ont été enregistrées");
        header('location: index.php?p=Admin.account.show');
    }

    /**
     * create new Admin
     */
    public function create() {
        unset($_POST['passwordConfirm']);
        $_POST['password'] = sha1($_POST['password']);
        Utils::getTable('User')->insert($_POST);
        Session::getSession()->setFlash('success', "Le compte à bien été créé");
        Utils::getTable('Activity')->createAction("create", ["administrateur" => Utils::getDb()->getLastId()]);
        header('location: index.php?p=Admin.account.show');
    }

    public function activity() {
        $pagination = 50;

        $data["activities"] = Utils::getTable('Activity')->query("
        SELECT activity.id, activity.target, activity.idTarget, activity.libelle, activity.heure 
        FROM `activity`, administrateur 
        WHERE administrateur.id = activity.idAdmin AND administrateur.id = ?
        ORDER BY heure DESC LIMIT $pagination OFFSET ".(intval($_GET['page'] - 1) * $pagination), [$_GET['id']]);
        $data["admin"] = Utils::getTable('User')->query("
        SELECT COUNT(activity.id) AS total, administrateur.name, administrateur.surname, administrateur.id
        FROM administrateur, activity 
        WHERE administrateur.id = ? AND activity.idAdmin = administrateur.id",
            [$_GET['id']], true);
        $data["pagination"] = ["current" => $_GET['page'], "max" => ceil(intval($data["admin"]->total)/$pagination)];

        !empty($data["admin"]->id) ? true : $this->notFound("Ce compte n'existe plus");
        $this->render('Admin.account-activity', $data);
    }
}