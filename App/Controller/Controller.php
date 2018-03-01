<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 20/02/2018
 * Time: 11:52
 */
namespace App\Controller;

use App\Utils;
use Core\Auth\Session;
use Core\Auth\Auth;

class Controller {

    protected $viewpath = ROOT.'/App/Views/';
    protected $template = "fr/default";
    protected $auth, $session;

    public function __construct() {
        $this->session = Session::getSession();
        $this->auth = new Auth($this->session);
    }

    /**
     * Render the whole page, assembling templates with the content
     * @param $view Path from the 'Views' folder to the html content
     * @param array $data
     */
    protected function render($view ,$data = []) {
        ob_start();
        !empty($data) ? extract($data) : false;
        require($this->viewpath.str_replace('.', '/', $view).'.php');
        $content = ob_get_clean();
        require $this->viewpath.'/template/'.$this->template.'.php';
    }

    /**
     * To load the models required to make DB requests
     * @param $model_name
     */
    protected function loadModel($model_name) {
        $this->$model_name = Utils::getTable($model_name);
    }

    /**
     * Use when the user try to access an Admin page while not connected
     */
    protected function forbidden() {
        $this->session->setFlash('danger', 'Vous n\'avez pas les droits requis pour accéder à cette page');
        header('location: index.php');
        exit();
    }

    /**
     * Use while trying to force an url and connected
     */
    protected function error() {
        $this->session->setFlash('info', "N'essayez pas de forcer les urls...");
        header('location: ?p=Admin.index.calendar');
        exit();
    }
}