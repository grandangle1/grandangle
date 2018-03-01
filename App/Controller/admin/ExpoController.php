<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 20/02/2018
 * Time: 18:48
 */
namespace App\Controller\Admin;


use App\Entity\ExpositionEntity;
use App\Table\ActivityTable;
use App\Utils;
use Core\Auth\Session;

class ExpoController extends AdminController {


    /**
     * For adding a new exhibition
     */
    public function add() {
        $this->render('Admin.expo');
    }

    /**
     * For editing an exhibition
     * Create a day from the week saved in the DB
     */
    public function edit() {
        $expoT = Utils::getTable('Exposition');
        $data = $expoT->getExpo($_GET['id']);
        !empty($data['exposition']) ? true : $this->notFound("Cette exposition n'existe plus");

        $gendate = new \DateTime();
        $parts = explode("-", $data['exposition']->week);
        $gendate->setISODate($parts[0], $parts[1],1);
        $day =  $gendate->format('Y-m-d');
        $data['exposition']->week = $day;

        $this->render('Admin.expo', $data);
    }

    public function pdf() {
        ExpositionEntity::createPdf();
    }


    public function artist() {
        $data["idExpo"] = $_GET['id'];
        $data["artists"] = Utils::getTable("Artist")->query("
        SELECT artist.surnameArtist, artist.nameArtist, artist.descrArtistFR, artist.urlImg, artist.idArtist
        FROM artist, participation, exposition 
        WHERE artist.idArtist = participation.idArtist AND participation.idExpo = ?
        GROUP BY artist.idArtist", [$_GET['id']]);

        $this->render('Admin.expo-list-artist', $data);
    }

    public function add_artist() {

        $this->render('Admin.expo-artist');
    }

    public function remove_artist() {
        Utils::getTable('Participation')->delete(["idExpo", "idArtist"], [$_GET['expo'], $_GET['artist']]);
        Session::getSession()->setFlash("success", "L'artiste à été enlever de l'exposition");
        Utils::getTable('Activity')->createAction("remove", ["artist%exposition" => $_GET['artist']."%".$_GET['expo']]);
        header("location: index.php?p=Admin.expo.artist&id=".$_GET['expo']);
    }

}