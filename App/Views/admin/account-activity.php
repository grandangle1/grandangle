<div class="container ">
    <div class="col-lg-12">
        <h1 class="text-center mt-5 bold">Historique</h1>
        <div class="row mt-5 mb-5 pb-5">
            <div class="card m-auto">
                <div class="card-header">
                    <h2 class="center">Activités de <?= $admin->surname." ".$admin->name; ?></h2>
                </div>
                <ul class="list-group list-group-flush">
                <?php foreach ($activities as $a): ?>
                    <li class="list-group-item">
                        <span><?= \App\Utils::translateAction($a->libelle)." ".$a->translate()." le ".\App\Utils::getDateFromDatetime($a->heure)." par ".$admin->surname ?></span>
                    </li>
                <?php endforeach; ?>
                </ul>
                <div class="text-center p-3">
                <?php if($pagination['current'] > 1): ?>
                    <a href="index.php?p=admin.account.activity&page=<?= (intval($pagination["current"]) - 1) ?>&id=<?= $admin->id ?>"><button type="button" class="btn btn-secondary btn-lg">Précédent</button></a>
                <?php endif; ?>
                <?php if($pagination['max'] > $pagination['current']): ?>
                    <a href="index.php?p=admin.account.activity&page=<?= (intval($pagination["current"]) + 1) ?>&id=<?= $admin->id ?>"><button type="button" class="btn btn-secondary btn-lg">Suivant</button></a>
                <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
