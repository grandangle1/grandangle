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
        $idFile = str_replace("/", $idOeuvre.".", $file['file']['type']);

        if(move_uploaded_file($file['file']['tmp_name'], $path.$idFile)){
            $this->update(["urlFile" => $dbPath.$idFile], ["idOeuvre" => $idOeuvre]);
            return true;
        }
        return false;
    }


}