<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 20/02/2018
 * Time: 14:28
 */
namespace Core\Auth;

use App\Utils;

class Auth {

    private $session;

    public function __construct(Session $session) {
        $this->session = $session;
    }

    public function logged() {
        return isset($_SESSION['auth']) ? true : false;
    }

    public function logOut() {
        $this->session->delete('auth');
    }

    public function login($user) {
        $this->session->write('auth', $user);
    }

    public function loggedOnly() {
        if(!$this->logged()) {
            $this->session->setFlash('danger', 'Vous n\'avez pas le droit d\'accedé à cette page');
            header('location: index.php');
            exit();
        }
        return true;
    }
}