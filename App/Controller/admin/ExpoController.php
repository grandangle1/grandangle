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

class ExpoController extends AdminController {


    /**
     * For adding a new exhibition
     */
    public function add() {
        $this->render('admin.expo');
    }

    /**
     * For editing an exhibition
     * Create a day from the week saved in the DB
     */
    public function edit() {
        $expoT = Utils::getTable('Exposition');
        $data = $expoT->getExpo($_GET['id']);
        !empty($data['exposition']) ? true : $this->notFound("Cette exposition n'existe plus");

        $gendate = new \DateTime();
        $parts = explode("-", $data['exposition']->week);
        $gendate->setISODate($parts[0], $parts[1],1);
        $day =  $gendate->format('Y-m-d');
        $data['exposition']->week = $day;

        $this->render('admin.expo', $data);
    }

    public function pdf() {
        ExpositionEntity::createPdf();
    }

}