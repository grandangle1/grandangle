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
$search = "%".$_POST['search']."%";

extract($_POST);
$forbiddens = Utils::getTable('Artist')->query("SELECT idArtist FROM participation WHERE idExpo = ?", [$idExpo]);

foreach ($forbiddens as $f) {
    $conds[] = "idArtist != ?";
    $ids[] = intval($f->idArtist);
}
$conds = implode(" AND ", $conds);
$req = "SELECT idArtist, surnameArtist, nameArtist FROM artist WHERE $conds";

$possibilities = Utils::getTable('Artist')->query($req, $ids);


$possibilities ? $resp = json_encode($possibilities) : $resp = json_encode(["false"]);
echo $resp;