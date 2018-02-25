<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 20/02/2018
 * Time: 10:16
 */
namespace App;
use App\Service\Validator;
use Core\Database\MysqlDatabase;
use \DateInterval;
use \DateTime;
use Core\Auth\Session;

class Utils {

    private static $intance;
    private static $bdd;

    public static function getInstance() {
        if(is_null(sefl::$intance)) {
            self::$intance = new Utils();
        }
        return self::$intance;
    }

    /**
     * Return an object containing PDO connexion with the défault config
     * @return MysqlDatabase
     */
    public static function getDb() {
        $conf= GetConfig::getConfig();
        if(is_null(self::$bdd)) {
            self::$bdd = new MysqlDatabase($conf->get('db_host'), $conf->get('db_name'), $conf->get('db_pass'), $conf->get('db_user'));
        }
        return self::$bdd;
    }

    /**
     * Ask the data to be tested and return the validator
     * @param $data
     * @return Validator
     */
    public static function getValidator($data) {
        return new Validator($data, self::getDb());
    }

    /**
     *
     * @param $name of the table
     * @return Table
     */
    public static function getTable($name) {
        $class_name = 'App\Table\\'.ucfirst($name).'Table';
        return new $class_name(self::getDb());
    }

    public static function load() {
        require 'Autoloader.php';
        Autoloader::register();
        Session::getSession();
    }

    static function getWeek($offset) {
        $now = new DateTime();
        $offset < 0 ? $now->sub(new DateInterval('P'.abs($offset).'W')) : $now->add(new DateInterval('P'.$offset.'W'));
        $now = $now->Format("Y-W");

        $data = false;
        $bdd = self::getDb();
        if($expo = $bdd->prepare("SELECT * FROM `exposition` WHERE week = ?", [$now], null, true)) {
            $data['expo'] = ["idExpo" => $expo->idExpo, "week" => $expo->week];
            $nb = $bdd->prepare("SELECT COUNT(*) AS nb FROM `oeuvre` WHERE idExpo= ?", [$data['expo']['idExpo']], null, true);
            $data['nbOeuvre'] = $nb->nb;
            $contact = $bdd->prepare("SELECT nameContact, email, telephone FROM `contact` WHERE idContact = ?", [$expo->idContact], null, true);
            $data['contact'] = [$contact->nameContact, $contact->telephone, $contact->email];
        }
        return $data;
    }

    static function getWeeks($week) {
        $date = [];
        for($i = 0; $i < 4; $i++) {
            $now = new DateTime();
            $offset = $week + $i;
            $offset < 0 ? $now->sub(new DateInterval('P'.abs($offset).'W')) : $now->add(new DateInterval('P'.$offset.'W'));
            $now = $now->Format("Y-W");
            $date[] = $now;
        }
        return $date;
    }

    /**
     * Methode utilisé pour les fichier ajax, charge l'autoloader et les variable de base de l'appliation
     */
    public static function start() {
        require 'Autoloader.php';
        Autoloader::register();
        define('ROOT', dirname(__DIR__));
    }

    /**
     * Return the first day of a week
     * @param $date
     * @param bool $fr format('d-m-Y') or format('Y-m-d')
     * @return string
     */
    public static function weekToDay($date, $fr = false) {
        $gendate = new \DateTime();
        $parts = explode("-", $date);
        $gendate->setISODate($parts[0], $parts[1],1);
        $fr ? $day =  $gendate->format('d-m-Y') : $day =  $gendate->format('Y-m-d');
        return $day;
    }

    public static function getLangue() {
        return Session::getSession()->read('langue') == "en" ? "en" : "fr";
    }

}