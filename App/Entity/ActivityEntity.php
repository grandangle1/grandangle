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
            return 'de l\'oeuvre <a href="index.php?p=admin.oeuvre.edit&id='.$this->idTarget.'">'.$this->idTarget.'</a>';
        } else if($this->target == "type") {
            return 'du type <a href="index.php?p=admin.type.edit&id='.$this->idTarget.'">'.$this->idTarget.'</a>';
        } else if($this->target == "exposition") {
            return 'de l\'exposition <a href="index.php?p=admin.expo.edit&id='.$this->idTarget.'">'.$this->idTarget.'</a>';
        } else if($this->target == "administrateur") {
            return 'de l\'administrateur <a href="index.php?p=admin.account.activity&page=1&id='.$this->idTarget.'">'.$this->idTarget.'</a>';
        }
    }

}