<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 20/02/2018
 * Time: 10:52
 */
namespace App\Controller\guest;
use App\Controller\Controller;
use App\service\Calendar;
use App\Utils;
use Core\Auth\Session;
use DateTime;

class GuestController extends ParentGuestController {

    public function index(){
        $data["artists"] = Utils::getTable('Artist')->query("SELECT COUNT(idArtist) AS nb FROM artist", null, true);
        Session::getSession()->read('langue') == 'fr' ? $this->render('guest.fr.index') : $this->render('guest.en.index');

    }

    public function langue() {
        Session::getSession()->write('langue', $_GET['l']);
        $this->template = $_GET['l']."/default";
        header('location: index.php');
    }

    public function today() {
        if(!isset($_GET['w'])) {
            $now = new DateTime();
            $week = $now->Format("Y-W");
        } else {
            $week = $_GET['w'];
        }
        $oeuvreT = Utils::getTable('Oeuvre');
        $expoT = Utils::getTable('Exposition');
        $idExpo = $oeuvreT->query("SELECT idExpo AS id FROM exposition WHERE week = ?", [$week], true);
        if($idExpo) {
            $data["exist"] = true;
            $data["oeuvres"] = $oeuvreT->query("SELECT * FROM oeuvre WHERE idExpo = ?", [$idExpo->id]);
            $data['artists'] = Utils::getTable('Participation')->query("
            SELECT artist.idArtist, artist.surnameArtist, artist.nameArtist
            FROM artist, participation 
            WHERE participation.idExpo = ? AND participation.idArtist = artist.idArtist", [$idExpo->id]);

            $data["exposition"] = $expoT->query("SELECT idExpo, themeFr, themeEn, week, generalDescrFR, generalDescrEN FROM exposition WHERE idExpo = ?", [$idExpo->id], true);
            $data["types"] = Utils::getTable('Type')->query("SELECT typeoeuvre.type".ucfirst($this->curentLanguage).", typeoeuvre.id FROM typeoeuvre, oeuvre WHERE typeoeuvre.id = oeuvre.idType AND oeuvre.idExpo = ? GROUP BY typeoeuvre.id", [$idExpo->id]);
        } else {
            $data["exist"] = false;
        }
    
        $this->render("guest.{$this->curentLanguage}.today", $data);
    }

    public function oeuvre() {
        $oeuvreT = Utils::getTable('Oeuvre');
        $data["oeuvre"] = $oeuvreT->query("SELECT * FROM oeuvre WHERE idOeuvre = ?;", [$_GET['id']], true);
        $oeuvreT->query("UPDATE oeuvre SET vues = (vues + 1) WHERE idOeuvre = ?", [$data["oeuvre"]->idOeuvre], true);
        $data['oeuvre']->getFormat();

        $this->render("guest.{$this->curentLanguage}.oeuvre", $data);
    }

    public function artist() {
        $artistT = Utils::getTable('Artist');
        $data["artist"] = $artistT->query("SELECT * FROM artist WHERE idArtist = ?", [$_GET['id']], true);
        
        $this->render("guest.{$this->curentLanguage}.artist", $data);
    }

    /**
     * display art works of the current exibition depending of their types
     */
    public function type() {
        $week = $_GET['w'];
        $data["oeuvres"] = Utils::getTable('Oeuvre')->query("
        SELECT oeuvre.idOeuvre, oeuvre.nomOeuvre, oeuvre.vues, oeuvre.descrOeuvre".ucfirst($this->curentLanguage)."
        FROM oeuvre, exposition
        WHERE exposition.week = ? AND oeuvre.idType = ? AND oeuvre.idExpo = exposition.idExpo",
            [$week, $_GET['id']]);
        empty($data["oeuvres"]) ? $this->error() : true;
        $data["type"] = Utils::getTable('Type')->query("SELECT type".ucfirst($this->curentLanguage)." FROM typeoeuvre WHERE id = ?", [$_GET['id']], true);

        $this->render("guest.{$this->curentLanguage}.type", $data);
    }

    public function planning() {
        $parts = explode("-", $_GET['m']);
        $monthsFr = ["", "Janvier", "Fevrier", "Mars", "Avril", "Mai", "Juin", "Juillet", "Aout", "Septembre", "Octobre", "Novembre", "Decembre"];
        $monthsEn = ["", "January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
        $this->curentLanguage == "en" ? $data['month'] = $monthsEn[intval($parts[1])] : $data['month'] = $monthsFr[intval($parts[1])];
        $data["year"] = $parts[0];

        $data["calendar"] = Calendar::createCalendar($parts[1], $parts[0]);
        $this->render("guest.{$this->curentLanguage}.planning", $data);
    }
}