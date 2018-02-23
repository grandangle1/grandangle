<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 20/02/2018
 * Time: 20:01
 */
namespace Core\Auth;

class Session {

    private static $instance;

    public static function getSession() {
        if(is_null(self::$instance)) {
            self::$instance = new Session();
        }
        return self::$instance;
    }

    private function __construct() {
        session_start();
    }

    public function setFlash($key, $message) {
        $_SESSION['flash'][$key] = $message;
    }

    public function write($key, $data) {
        $_SESSION[$key] = $data;
    }

    public function hasFlash() {
        return isset($_SESSION['flash']);
    }

    public function getFlash() {
        $flash = $_SESSION['flash'];
        unset($_SESSION['flash']);
        return $flash;
    }

    public function delete($key) {
        if(isset($_SESSION[$key])) {
            unset($_SESSION[$key]);
        }
    }

    public function read($key) {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }

}