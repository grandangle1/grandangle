<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 22/02/2018
 * Time: 16:08
 */
namespace App\Controller\guest;

use App\Controller\Controller;
use Core\Auth\Session;

class ParentGuestController extends Controller {

    protected $curentLanguage;

    /**
     * In charge of managing language
     * ParentGuestController constructor.
     */
    public function __construct() {
        parent::__construct();
        Session::getSession()->read('langue') == "fr" ? true : $this->template = "en/default";
        $this->curentLanguage = Session::getSession()->read('langue');
        is_null($this->curentLanguage) ? $this->curentLanguage = "fr" : true;

    }

    /**
     * Use while trying to force an url and disconnected
     */
    protected function error() {
        $this->session->setFlash('info', "N'essayez pas de forcer les urls...");
        header('location: index.php');
        exit();
    }


}