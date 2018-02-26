<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 20/02/2018
 * Time: 23:59
 */

namespace App\Table;
use App\Utils;
use Core\Auth\Session;
use \DateTime;

class ExpositionTable extends Table {

    protected $table = "exposition";

    /**
     * @param $data array
     */
    public function createExpo($data, $file) {
        extract($data);
        $contactT = Utils::getTable('Contact');
        $artistT = Utils::getTable('Artist');
        $contactT->insert(["nameContact" => $nameContact, "surnameContact" => $surnameContact, "email" => $email, "telephone" => $telephone, "address" => $address, "city" => $city]);
        $contactId = $this->bdd->getLastId();
        $date = new DateTime($data['week']);
        $week = $date->format("Y-W");
        $this->insert(["themeEn" => $themeEn, "themeFr" => $themeFr, "week" => $week, "generalDescrFR" => $generalDescrFr, "generalDescrEN" => $generalDescrEn, "idContact" => $contactId]);
        $idExpo = $this->bdd->getLastId();
        $artistT->insert(["nameArtist" => $nameArtist, "surnameArtist" => $surnameArtist, "birthDate" => $birthDate, "descrArtistFR" => $descrArtistFr,
            "descrArtistEN" => $descrArtisteEn, "idExpo" => $idExpo]);
        $idArtist = $this->bdd->getLastId();

        if(!empty($_FILES['file'])) {
            $artistT->writeFile($_FILES, $idArtist) ? true : Session::getSession()->setFlash('danger', "Erreur durant l'ecriture du fichier! Veuillez contacter un dev :/");
        }
        $this->bdd->query("UPDATE contact SET idExpo = $idExpo WHERE idContact = $contactId");
        $this->bdd->query("UPDATE exposition SET idArtist = $idArtist WHERE idExpo = $idExpo");
        Utils::getTable('Activity')->createAction("create", ["exposition" => $idExpo]);
    }

    /**
     * Get all infos needed for a expo form (expo + contact + artist)
     * @param $idExpo int
     * @return array 1 => contact  2 => artist  3 => expo
     */
    public function getExpo($idExpo) {
        $tables  = [$contactT = Utils::getTable('Contact'), $artistT = Utils::getTable('Artist'), $this];
        $data = [];
        foreach ($tables as $t) {
            $name = explode("\\", get_class($t));
            $name = strtolower(str_replace("Table", "", end($name)));
            $data[$name] = $t->findWithCond( ["idExpo"], [$idExpo], true);
        }
        return $data;
    }

    /**
     * Update an expo (expo + contact + artist)
     * @param $data array
     */
    public function updateExpo($data, $file) {
        extract($data);
        $contactT = Utils::getTable('Contact');
        $artistT = Utils::getTable('Artist');

        $date = new DateTime($data['week']);
        $week = $date->format("Y-W");

        $contactT->update(["nameContact" => $nameContact, "surnameContact" => $surnameContact, "email" => $email, "telephone" => $telephone, "address" => $address, "city" =>$city],
                ["idExpo" => $idExpo]);
        $artistT->update(["nameArtist" => $nameArtist, "surnameArtist" => $surnameArtist, "birthDate" => $birthDate, "descrArtistFR" => $descrArtistFr,
            "descrArtistEN" => $descrArtisteEn],
            ["idExpo" => $idExpo]);
        $this->update(["themeEn" => $themeEn, "themeFr" => $themeFr, "week" => $week, "generalDescrFR" => $generalDescrFr, "generalDescrEN" => $generalDescrEn],
            ["idExpo" => $idExpo]);
        $idArtist = $this->query("SELECT idArtist AS id FROM artist WHERE idExpo = ?", [$data['idExpo']], true);

        if(!empty($_FILES['file'])) {
            $artistT->writeFile($_FILES, $idArtist->id) ? true : Session::getSession()->setFlash('danger', "Erreur durant l'ecriture du fichier! Veuillez contacter un dev :/");
        }
    }

    public function deleteExpo($id) {
        $ids = $this->query("SELECT idOeuvre, urlFile AS url FROM oeuvre WHERE idExpo = ?", [$id]);
        $oeuvreT = Utils::getTable('Oeuvre');
        foreach ($ids as $url) {
            $oeuvreT->deleteOeuvre($url->idOeuvre, $url);
        }
        $idArtist = $this->query("SELECT idArtist FROM artist WHERE idExpo = ?", [$id], true);
        $url = glob(ROOT."/public/img/file_artist/image".$idArtist->idArtist.".*");
        $urls = str_replace("\\", "/", $url);
        foreach ($urls as $url) {
            unlink($url);
        }

        return $this->delete(['idExpo'], [$id]);
    }

    /**
     * Find a unique occurence in the table that match the id passed
     * @param $id
     * @return bool|mixed|\PDOStatement
     */
    public function findWithId($id) {
        return $this->query("SELECT * FROM ".$this->table." WHERE idExpo = ?", [$id], null, true);
    }

}