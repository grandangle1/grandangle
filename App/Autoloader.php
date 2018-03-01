<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 20/02/2018
 * Time: 09:47
 */
namespace App;

class  Autoloader {

    public static function register() {
        spl_autoload_register(array(__CLASS__, 'myloader'));
    }

    public static function myloader($class) {

        $path = str_replace("\\", "/",ROOT.'/'.$class.'.php');
        require $path;
    }
}