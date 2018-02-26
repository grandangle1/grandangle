<h1>Activités de <?= $admin->surname." ".$admin->name; ?></h1>

<ul>
<?php foreach ($activities as $a): ?>
    <?php if(!is_null($a->idExpo)) {
        $type = "de l'exposition $a->idExpo";
    } else if(!is_null($a->idOeuvre)){
        $type = "de l'oeuvre $a->idOeuvre";
    } else {
        $type = " du type $a->idType";
    } ?>
    <li>
        <span><?= \App\Utils::translateAction($a->libelle)." $type le ".\App\Utils::getDateFromDatetime($a->heure)." par ".$admin->surname ?></span>
    </li>

<?php endforeach; ?>
</ul>