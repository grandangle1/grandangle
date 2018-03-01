<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 21/02/2018
 * Time: 19:13
 */
namespace App\Entity;

class ActivityEntity extends Entity {


    public function translate() {
        if($this->target == "oeuvre") {
            return 'de l\'oeuvre <a href="index.php?p=Admin.oeuvre.edit&id='.$this->idTarget.'">'.$this->idTarget.'</a>';
        } else if($this->target == "type") {
            return 'du type <a href="index.php?p=Admin.type.edit&id='.$this->idTarget.'">'.$this->idTarget.'</a>';
        } else if($this->target == "exposition") {
            return 'l\'exposition <a href="index.php?p=Admin.expo.edit&id='.$this->idTarget.'">'.$this->idTarget.'</a>';
        } else if($this->target == "administrateur") {
            return 'de l\'administrateur <a href="index.php?p=Admin.account.activity&page=1&id='.$this->idTarget.'">'.$this->idTarget.'</a>';
        } else if($this->target == "artist") {
            return 'de l\'artiste <a href="index.php?p=Admin.artist.edit&id='.$this->idTarget.'">'.$this->idTarget.'</a>';
        } else if($this->target == "artist%exposition") {
            $targets = explode("%", $this->target);
            $ids = explode("%", $this->idTarget);
            if($this->libelle == "participate" ) {
                return 'Association de l\'artiste <a href="index.php?p=Admin.artist.edit&id='.$ids[0].'">'.$ids[0].'</a> à l\'exposition 
                        <a href="index.php?p=Admin.expo.edit&id='.$ids[1].'">'.$ids[1].'</a>';

            } else if ($this->libelle == "remove"){
                return 'Suppression de la participation de l\'artiste <a href="index.php?p=Admin.artist.edit&id='.$ids[0].'">'.$ids[0].'</a> à l\'exposition 
                        <a href="index.php?p=Admin.expo.edit&id='.$ids[1].'">'.$ids[1].'</a>';
            }
        }
    }

}