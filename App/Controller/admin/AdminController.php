<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 20/02/2018
 * Time: 20:57
 */
namespace App\Controller\Admin;
use App\Controller\Controller;

class AdminController extends Controller {

    /**
     * AdminController constructor.
     * Automatically checked for Auth
     */
    public function __construct() {
        parent::__construct();
        $this->auth->logged() ? true : $this->forbidden();
    }
}