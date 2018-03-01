<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 21/02/2018
 * Time: 19:13
 */
namespace App\Entity;

class ArtistEntity extends Entity {


    public function getResume() {
        return substr($this->descrArtistFR, 0, 100)."...";
    }
}