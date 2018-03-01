<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 20/02/2018
 * Time: 18:48
 */
namespace App\Controller\Admin;


use App\Entity\ExpositionEntity;
use App\Utils;
use Core\Auth\Session;

class ArtistController extends AdminController {


    public function edit() {
        $data["artist"] = Utils::getTable('Artist')->query("SELECT * FROM artist WHERE idArtist = ?", [$_GET['id']], true);
        $data["artist"] ? true : $this->notFound("L'artiste n'existe plus.");

        $this->render('Admin.artist', $data);
    }

    public function add() {

        $this->render('Admin.artist');
    }


    public function assign() {

        Utils::getTable('Participation')->create($_GET['expo'], $_GET['artist']);
        header("location: index.php?p=Admin.expo.artist&id=".$_GET['expo']);
        exit();
    }


}