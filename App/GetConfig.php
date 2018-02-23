<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 20/02/2018
 * Time: 12:25
 */
namespace App;

class GetConfig {

    private $settings  = [];
    private static $instance;

    public static function getConfig() {
        if(is_null(self::$instance)) {
            self::$instance = new GetConfig(ROOT.'/config/config.php');
        }
        return self::$instance;
    }

    private function __construct($path_file) {
        $this->settings = require($path_file);
    }

    public function get($key) {
        return isset($this->settings[$key]) ? $this->settings[$key] : null;
    }
}