<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 20/02/2018
 * Time: 23:57
 */
namespace App\Entity;
use App\Service\PDF_Expo;

class ExpositionEntity extends Entity {


    public static function createPdf() {
        new PDF_Expo();

    }

}