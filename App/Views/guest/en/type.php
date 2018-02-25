<h1>Art work of type <?= $type->typeEn ?></h1>

<ul style="display: flex; flex-wrap: wrap; list-style: none; justify-content: space-around;">

    <?php foreach ($oeuvres as $oeuvre): ?>
        <li style="width: 48%;">
            <a href="?p=guest.oeuvre&id=<?= $oeuvre->idOeuvre ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1"><?= $oeuvre->nomOeuvre; ?></h5>
                    <small>Vues : <?= $oeuvre->vues; ?></small>
                </div>
                <p class="mb-1"><?= $oeuvre->getExtrait(); ?></p>
                <small class="text-info">More</small>
            </a>
        </li>
    <?php endforeach; ?>
</ul>