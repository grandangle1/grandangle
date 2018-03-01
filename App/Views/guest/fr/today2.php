<style>
    h1 {
        text-align: center;
    }
</style>
<?php if ($exist): ?>
    <h1 style="text-align: center;">En ce moment : <?= $exposition->themeFr ?></h1>


    <p><?= $exposition->generalDescrFR ?></p>

    <ul style="list-style: none;">
        <li><h3>Ca vous interesse : </h3></li>
        <?php foreach ($types as $type): ?>
        <li><a href="?p=guest.type&id=<?= $type->id ?>&w=<?= $exposition->week; ?>"><?= $type->typeFr ?></a></li>
        <?php endforeach; ?>
    </ul>
    <ul>
        <?php foreach ($artists as $ar): ?>
            <li>
                <h3 style="text-align: center;">De l'artiste <a href="?p=guest.artist&id=<?= $ar->idArtist; ?>"><?= $ar->nameArtist;?> <?= $ar->surnameArtist; ?></a></h3>
            </li>
        <?php endforeach; ?>
    </ul>
<?php else: ?>
    <h1>Il n'y a pas d'exposition à cette date</h1>
<?php endif; ?>

<div class="svg-container" style="width: 100%; display: flex; justify-content: center;">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="1080px" height="480px" viewBox="0 0 1080 480" preserveAspectRatio="xMidYMid meet" >
        <rect id="svgEditorBackground" x="0" y="0" width="1080" height="480" style="fill: none; stroke: none;"/>
        <rect x="3" y="4" style="fill:none;stroke:black;stroke-width:1px;" id="e1_rectangle" width="1066" height="466"/>
        <rect x="3" y="4" style="fill:black;stroke:black;stroke-width:1px;" id="e2_rectangle" width="216" height="124"/>
        <rect x="447" y="246" style="fill:black;stroke:black;stroke-width:1px;" id="e4_rectangle" width="206" height="156"/>
        <polygon style="stroke:black;fill:khaki;stroke-width:1px;" class="salle" id="salle1" points="3 128 219 128 447 246 449 468 3 470"/>
        <polygon style="stroke:black;fill:khaki;stroke-width:1px;" class="salle"  id="salle2" points="219 4 217 128 447 246 653 246 653 4" />
        <rect x="449" y="402" style="fill:khaki;stroke:black;stroke-width:1px;" class="salle"  id="couloir" width="204" height="68"/>
        <rect x="653" y="4" style="fill:khaki;stroke:black;stroke-width:1px;" class="salle"  id="hall" width="416" height="466"/>
        <text style="fill:black;font-family:Arial;font-size:20px;" x="121" y="312" id="e10_texte" >Salle Picasso</text>
        <text style="fill:black;font-family:Arial;font-size:20px;" x="389" y="72" id="e11_texte" >Salle 2</text>
        <text style="fill:black;font-family:Arial;font-size:20px;" x="785" y="160" id="e12_texte" >Hall Principal</text>
        <text style="fill:black;font-family:Arial;font-size:20px;" x="509" y="432" id="e13_texte" >
            <tspan x="509">Couloir</tspan></text>
    </svg>
</div>
<?php if(!empty($oeuvres)) : ?>
    <div class="oeuvre-container salle1">
    <h2>Salle Picasso</h2>
        <ul style="display: flex; flex-wrap: wrap; list-style: none; justify-content: space-around;">

            <?php foreach ($oeuvres as $oeuvre): ?>
                <?php if($oeuvre->salle == "salle1"): ?>
                    <li style="width: 48%;">
                        <a href="?p=guest.oeuvre&id=<?= $oeuvre->idOeuvre ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?= $oeuvre->nomOeuvre; ?></h5>
                                <small>Vues : <?= $oeuvre->vues; ?></small>
                            </div>
                            <p class="mb-1"><?= $oeuvre->getExtrait(); ?></p>
                            <small class="text-info">Voir la suite</small>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="oeuvre-container salle2">
        <h2>Salle Léonardo da Vonca</h2>
        <ul style="display: flex; flex-wrap: wrap; list-style: none; justify-content: space-around;">

            <?php foreach ($oeuvres as $oeuvre): ?>
                <?php if($oeuvre->salle == "salle2"): ?>
                    <li style="width: 48%;">
                        <a href="?p=guest.oeuvre&id=<?= $oeuvre->idOeuvre ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?= $oeuvre->nomOeuvre; ?></h5>
                                <small>Vues : <?= $oeuvre->vues; ?></small>
                            </div>
                            <p class="mb-1"><?= $oeuvre->getExtrait(); ?></p>
                            <small class="text-info">Voir la suite</small>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="oeuvre-container couloir">
        <h2>Galerie des arts appliqués</h2>
        <ul style="display: flex; flex-wrap: wrap; list-style: none; justify-content: space-around;">

            <?php foreach ($oeuvres as $oeuvre): ?>
                <?php if($oeuvre->salle == "couloir"): ?>
                    <li style="width: 48%;">
                        <a href="?p=guest.oeuvre&id=<?= $oeuvre->idOeuvre ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?= $oeuvre->nomOeuvre; ?></h5>
                                <small>Vues : <?= $oeuvre->vues; ?></small>
                            </div>
                            <p class="mb-1"><?= $oeuvre->getExtrait(); ?></p>
                            <small class="text-info">Voir la suite</small>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
    <div class="oeuvre-container hall">
        <h2>Hall principal</h2>
        <ul style="display: flex; flex-wrap: wrap; list-style: none; justify-content: space-around;">

            <?php foreach ($oeuvres as $oeuvre): ?>
                <?php if($oeuvre->salle == "hall"): ?>
                    <li style="width: 48%;">
                        <a href="?p=guest.oeuvre&id=<?= $oeuvre->idOeuvre ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                            <div class="d-flex w-100 justify-content-between">
                                <h5 class="mb-1"><?= $oeuvre->nomOeuvre; ?></h5>
                                <small>Vues : <?= $oeuvre->vues; ?></small>
                            </div>
                            <p class="mb-1"><?= $oeuvre->getExtrait(); ?></p>
                            <small class="text-info">Voir la suite</small>
                        </a>
                    </li>
                <?php endif; ?>
            <?php endforeach; ?>
        </ul>
    </div>
<?php else: ?>
    <?php if ($exist): ?>
        <h1>Aucune oeuvre n'a encore été renseigner pour cette exposition</h1>
    <?php endif; ?>
<?php endif; ?>


<script src="js/today.js"></script>