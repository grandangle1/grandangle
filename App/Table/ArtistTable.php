<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 21/02/2018
 * Time: 13:20
 */
namespace App\Table;

use App\Utils;

class ArtistTable extends Table {

    protected $table = "artist";

    public function writeFile($file, $idArtist) {

        $path = ROOT."/public/img/file_artist/";
        $dbPath = "img/file_artist/";
        $path = str_replace('\\', "/", $path);
        $idFile = str_replace("/", $idArtist.".", $file['file']['type']);

        $exist = glob($path."image$idArtist.*");
        !empty($exist) ? unlink($exist[0]) : true;


        if(move_uploaded_file($file['file']['tmp_name'], $path.$idFile)){
            $this->update(["urlImg" => $dbPath.$idFile], ["idArtist" => $idArtist]);

            return true;
        }
        return false;

    }
    public function create($data, $file) {
        extract($data);
        Utils::getTable('Artist')->insert(["nameArtist" => $nameArtist, "surnameArtist" => $surnameArtist, "birthDate" => $birthDate, "descrArtistFR" => $descrArtistFr,
            "descrArtistEN" => $descrArtisteEn]);
        $idArtist = Utils::getDb()->getLastId();
        if(!empty($_FILES['file'])) {
            Utils::getTable('Artist')->writeFile($_FILES, $idArtist) ? true : Session::getSession()->setFlash('danger', "Erreur durant l'ecriture du fichier! Veuillez contacter un dev :/");
        }

        if(isset($data['idExpo'])) {
            Utils::getTable('Participation')->create($data['idExpo'],$idArtist);
        }
    }

    public function updateArtist($data, $file) {
        extract($data);
        $this->update(["nameArtist" => $nameArtist, "surnameArtist" => $surnameArtist, "birthDate" => $birthDate, "descrArtistFR" => $descrArtistFr,
            "descrArtistEN" => $descrArtisteEn], ["idArtist" => $idArtist]);
        if(!empty($_FILES['file'])) {
            $this->writeFile($_FILES, $idArtist) ? true : Session::getSession()->setFlash('danger', "Erreur durant l'ecriture du fichier! Veuillez contacter un dev :/");
        }
    }

}