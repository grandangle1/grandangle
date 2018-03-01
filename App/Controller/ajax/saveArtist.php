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

    $validator = Utils::getValidator($_POST);
    $validatorFile = Utils::getValidator($_FILES);
    $validator->isLongEnough('descrArtistFr', 10);
    $validator->isLongEnough('descrArtisteEn', 10);
    $validator->isLetter('nameArtist');
    $validator->isLetter('surnameArtist');
    $validator->isShortEnough('nameArtist', 100);
    $validator->isShortEnough('surnameArtist', 100);
    $validator->isShortEnough('descrArtistFr', 5000, "La description doit faire moins de 5000 charactere.");
    $validator->isShortEnough('descrArtisteEn', 5000, "La description doit faire moins de 5000 charactere.");

    if(!empty($_FILES['urlImg'][0])) {
        $validatorFile->isValidFormat('file', ["image"], "Seul les images sont accéptés.");
    }

    if($validator->isValid() && $validatorFile->isValid()) {

        if($action == "add") {
            Utils::getTable('Artist')->create($_POST, $_FILES);
            Utils::getTable('Activity')->createAction("create", ["artist" => Utils::getDb()->getLastId()]);
            Session::getSession()->setFlash("success", "L'artiste a bien été créé.");
        } else if($action == "edit") {
            Utils::getTable('Artist')->updateArtist($_POST, $_FILES);
            Utils::getTable('Activity')->createAction("edit", ["artist" => $_POST['idArtist']]);
            Session::getSession()->setFlash("success", "L'artiste a bien été modifié.");
        }

        echo json_encode(["resp" => "success"]);

    } else {
        echo json_encode([$validatorFile->getErrors(), $validator->getErrors()]);
    }

