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
        Utils::getTable('User');
        $this->render('admin.calendar');
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