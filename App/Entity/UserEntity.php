<?php
/**
 * Created by PhpStorm.
 * User: Lavigne Theo
 * Date: 20/02/2018
 * Time: 22:21
 */
namespace App\Entity;

use App\Utils;

class UserEntity Extends Entity{


    public function checkExistence($data) {
        $user = Utils::getTable('User')->query("SELECT id, email, identifiant FROM administrateur WHERE id != ? AND (identifiant = ? OR email = ?)",
            [$data['id'], $data['identifiant'], $data['email']], true);
        $errors = [];

        if($user) {
            $user->email == $data['email'] ? $errors[] = "Email deja pris": false;
            $user->identifiant == $data["identifiant"] ? $errors[] = "Identifiant deja pris" : false;

            }
        return $user ? $errors : false;
    }

}