<?php
namespace App\Controller\Ajax;
use App\Table\UserTable;
use App\Utils;
use Core\Auth\Auth;
use Core\Auth\Session;

require '../../Utils.php';
Utils::start();

$session = Session::getSession();
$auth = new Auth($session);
$auth->loggedOnly();

extract($_POST);
isset($idExpo) ? true : $idExpo = -1;
$forbiddens = Utils::getTable('Artist')->query("SELECT idArtist FROM participation WHERE idExpo = ?", [$idExpo]);

$conds = ["(nameArtist LIKE ? OR surnameArtist LIKE ?)"];
$ids = ["%".$_POST['search']."%", "%".$_POST['search']."%"];

if(!empty($forbiddens)) {
    foreach ($forbiddens as $f) {
        $conds[] = "idArtist != ?";
        $ids[] = intval($f->idArtist);
    }
    $conds = implode(" AND ", $conds);
    $req = "SELECT idArtist, surnameArtist, nameArtist, urlImg FROM artist WHERE $conds";
} else {
    $req = "SELECT idArtist, surnameArtist, nameArtist, urlImg FROM artist WHERE $conds[0]";
}

$possibilities = Utils::getTable('Artist')->query($req, $ids);

$possibilities ? $resp = json_encode($possibilities) : $resp = json_encode(["false"]);
echo $resp;