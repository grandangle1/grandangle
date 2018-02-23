<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 20/02/2018
 * Time: 10:52
 */
namespace App\Controller\guest;
use App\Controller\Controller;
use App\Utils;
use Core\Auth\Session;
use DateTime;

class GuestController extends ParentGuestController {

    public function index(){
        Session::getSession()->read('langue') == 'fr' ? $this->render('guest.fr.index') : $this->render('guest.en.index');
    }

    public function langue() {
        Session::getSession()->write('langue', $_GET['l']);
        $this->template = $_GET['l']."/default";
        header('location: index.php');
    }

    public function today() {
        $now = new DateTime();
        $week = $now->Format("Y-W");
        $oeuvreT = Utils::getTable('Oeuvre');
        $idExpo = $oeuvreT->query("SELECT idExpo AS id FROM exposition WHERE week = ?", [$week], true);
        $data["oeuvres"] = $oeuvreT->query("SELECT * FROM oeuvre WHERE idExpo = ?", [$idExpo->id]);
        $data['artist'] = $oeuvreT->query("SELECT nameArtist, surnameArtist, idArtist FROM artist WHERE idExpo = ?", [$data["oeuvres"][0]->idExpo], true);

        $this->render("guest.{$this->curentLanguage}.today", $data);
    }

    public function oeuvre() {
        $oeuvreT = Utils::getTable('Oeuvre');
        $data["oeuvre"] = $oeuvreT->query("SELECT * FROM oeuvre WHERE idOeuvre = ?;", [$_GET['id']], true);
        $oeuvreT->query("UPDATE oeuvre SET vues = (vues + 1) WHERE idOeuvre = ?", [$data["oeuvre"]->idOeuvre], true);

        $this->render("guest.{$this->curentLanguage}.oeuvre", $data);
    }

    public function artist() {
        $artistT = Utils::getTable('Artist');
        $data["artist"] = $artistT->query("SELECT * FROM artist WHERE idArtist = ?", [$_GET['id']], true);
        
        $this->render("guest.{$this->curentLanguage}.artist", $data);
    }
}