<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 21/02/2018
 * Time: 22:42
 */

namespace App\Table;

use App\Table\Table;

class OeuvreTable extends Table {

    protected $table = "oeuvre";

    public function writeFile($file, $idOeuvre) {
        $path = ROOT."/public/img/file_oeuvre/";
        $dbPath = "img/file_oeuvre/";
        $path = str_replace('\\', "/", $path);
        $idFile = str_replace("/", "$".$idOeuvre.".", $file['file']['type']);

        $exist = glob($path."*$".$idOeuvre.".*");
        foreach ($exist as $e) {
            unlink($e);
        }

        if(move_uploaded_file($file['file']['tmp_name'], $path.$idFile)){
            $this->update(["urlFile" => $dbPath.$idFile], ["idOeuvre" => $idOeuvre]);
            return true;
        }
        return false;
    }

    public function deleteOeuvre($id, $url = null) {
        is_null($url) ? $url = $this->query("SELECT urlFile AS url FROM oeuvre WHERE idOeuvre = ?", [$id], true) : true;
        $url = str_replace("\\", "/", ROOT."/public/".$url->url);
        unlink($url);
        $qrCode= str_replace("\\", "/", ROOT."/public/img/qr_code_oeuvre/");
        $qrCode = $qrCode."code_oeuvre$id.png";
        unlink($qrCode);
        $this->delete(['idOeuvre'], [$id]);
    }


}