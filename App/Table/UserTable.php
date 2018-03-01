<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 20/02/2018
 * Time: 09:58
 */
namespace App\Table;

use Core\Auth\Auth;
use Core\Auth\Session;

class UserTable extends Table {

    protected $table = "administrateur";

    public function resetToken($data) {
        $exist = $this->query("SELECT name, id, surname FROM administrateur WHERE email = ?", [$data["email"]], true);
        if($exist) {
            $token = bin2hex(random_bytes(50));
            $now =  strtotime("now");

            $url = "http://dev-theo.fr/poo/public/index.php?p=guest.changePassword&token=".$token;
            $this->query("UPDATE administrateur 
            SET token = ?, timeToken = ? 
            WHERE id =  ?;", [$token, $now, $exist->id]);

            $message = "Bonjour $exist->surname $exist->name. Nous avons bien reçus votre demande de changement de mot de passe. Vous trouverez ci-joint un lien pour le
            regenerer.\r\n Lien : $url";
            $message = wordwrap($message, 70, "\r\n");
            mail($data['email'], 'Grand-angle : changement de mot de passe', $message);
            Session::getSession()->setFlash('success', "Un mail vous à été envoyé.");
            header('location: index.php?p=guest.index');

            exit();
        }
    }

    public function checkToken($data) {
        $exist = $this->query("SELECT id, timeToken  FROM administrateur WHERE token = ?", [$data["token"]], true);

        if($exist) {
            $time = intval($exist->timeToken);
            $now = intval(strtotime("now"));
            if($now - $time > 1800) {
                Session::getSession()->setFlash("success", "Le token à expiré veuillez recommencé.");
                header("location: index.php?p=guest.resetPassword");
                $exist();
            }
            return $exist->id;
        } else {
            Session::getSession()->setFlash('danger', 'Token invalide');
            header("location: index.php?p=guest.index");
            exit();
        }
    }

    public function saveAndConnect($data) {
        $newPass = sha1($data["password"]);
        $this->query("UPDATE administrateur SET token = NULL, password = ? WHERE id = ?", [$newPass, $data["id"]]);
        Session::getSession()->setFlash("success", "Mot de passe changé avec succès!");
        $auth = new Auth(Session::getSession());
        $auth->login($data["id"]);
        header("location: index.php?p=admin.index.calendar");
        exit();
    }
}