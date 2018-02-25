<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 21/02/2018
 * Time: 13:20
 */
namespace App\Table;

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


}