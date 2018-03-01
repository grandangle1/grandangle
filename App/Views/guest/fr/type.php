<div class="container">
    <h1 class="text-center m-5 bold">Les oeuvres de type <?= $type->typeFr ?></h1>

    <ul style="display: flex; flex-wrap: wrap; list-style: none; justify-content: space-around;">

        <?php foreach ($oeuvres as $oeuvre): ?>
            <li class="mb-3 w-100 mr-5">
                <a href="?p=guest.oeuvre&id=<?= $oeuvre->idOeuvre ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                    <div class="d-flex w-100 justify-content-between">
                        <h5 class="m-2 mb-4"><?= $oeuvre->nomOeuvre; ?></h5>
                        <small>Vues : <?= $oeuvre->vues; ?></small>
                    </div>
                    <p class="m-2"><?= $oeuvre->getExtrait(); ?></p>
                    <small class="text-info ml-2">More</small>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</div>    