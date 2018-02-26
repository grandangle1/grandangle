<h1>Activités de <?= $admin->surname." ".$admin->name; ?></h1>

<ul>
<?php foreach ($activities as $a): ?>
    <li>
        <span><?= \App\Utils::translateAction($a->libelle)." ".$a->translate()." le ".\App\Utils::getDateFromDatetime($a->heure)." par ".$admin->surname ?></span>
    </li>
<?php endforeach; ?>
</ul>

<?php if($pagination['current'] > 1): ?>
    <a href="index.php?p=admin.account.activity&page=<?= (intval($pagination["current"]) - 1) ?>&id=<?= $admin->id ?>">precedent</a>
<?php endif; ?>
<?php if($pagination['max'] > $pagination['current']): ?>
    <a href="index.php?p=admin.account.activity&page=<?= (intval($pagination["current"]) + 1) ?>&id=<?= $admin->id ?>">suivant</a>
<?php endif; ?>
