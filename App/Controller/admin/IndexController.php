<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 20/02/2018
 * Time: 10:52
 */
namespace App\Controller\Admin;
use App\Utils;

class IndexController extends AdminController {

    /**
     * Render the admin  calendar
     */
    public function calendar(){
        $data["fail"] = Utils::getTable('User')->query("SELECT nbFail FROM fail ", null, true);
        $data["types"] = Utils::getTable('User')->query("SELECT * FROM typeoeuvre ");

        $this->render('admin.calendar', $data);
    }

    /**
     * Logout an admin
     */
    public function logOut() {
        $this->auth->logOut();
        $this->session->setFlash('success', 'Vous avez bien été déconnecté');
        header('location: index.php');
    }
}