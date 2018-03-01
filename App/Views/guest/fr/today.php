<div class="container">
    <?php if ($exist): ?>
        <h1 class="text-center m-5 bold">En ce moment : <?= $exposition->themeFr ?></h1>


        <p class="text-center mb-5"><?= $exposition->generalDescrFR ?></p>

        <ul class="list-inline-group">
            <li class="list-inline-item mt-4"><h4>Les types d'oeuvres exposées : </h4></li>
            <?php foreach ($types as $type): ?>
            <li class="list-inline-item"><h5><a href="?p=guest.type&id=<?= $type->id ?>&w=<?= $exposition->week; ?>" class="badge badge-pill badge-dark"><?= $type->typeFr ?></a></h5></li>
            <?php endforeach; ?>
        </ul>
        <ul class="list-inline-group">
            <li class="list-inline-item mt-4"><h4>Les artistes :</h4></li>
            <?php foreach ($artists as $ar): ?>
                <li class="list-inline-item"><h5><a href="?p=guest.artist&id=<?= $ar->idArtist; ?>" class="badge badge-pill badge-secondary"><?= $ar->nameArtist;?> <?= $ar->surnameArtist; ?></a></h5>
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
            <polygon style="stroke:black;fill:#CECECE;stroke-width:1px;" class="salle" id="salle1" points="3 128 219 128 447 246 449 468 3 470"/>
            <polygon style="stroke:black;fill:#CECECE;stroke-width:1px;" class="salle"  id="salle2" points="219 4 217 128 447 246 653 246 653 4" />
            <rect x="449" y="402" style="fill:#CECECE;stroke:black;stroke-width:1px;" class="salle"  id="couloir" width="204" height="68"/>
            <rect x="653" y="4" style="fill:#CECECE;stroke:black;stroke-width:1px;" class="salle"  id="hall" width="416" height="466"/>
            <text style="fill:black;font-family:Arial;font-size:20px;" x="121" y="312" id="e10_texte" >Salle DE VINCI</text>
            <text style="fill:black;font-family:Arial;font-size:20px;" x="389" y="72" id="e11_texte" >Salle VAN GOGH</text>
            <text style="fill:black;font-family:Arial;font-size:20px;" x="785" y="160" id="e12_texte" >Salle PICASSO</text>
            <text style="fill:black;font-family:Arial;font-size:20px;" x="509" y="432" id="e13_texte" >
                <tspan x="509">Salle RENOIR</tspan></text>
        </svg>
    </div>
    <?php if(!empty($oeuvres)) : ?>
        <div class="oeuvre-container salle1">
        <h2 class="text-center m-5">Salle DE VINCI</h2>
            <ul style="display: flex; flex-wrap: wrap; list-style: none; justify-content: space-around;">

                <?php foreach ($oeuvres as $oeuvre): ?>
                    <?php if($oeuvre->salle == "salle1"): ?>
                        <li class="mb-3 w-100 mr-5">
                            <a href="?p=guest.oeuvre&id=<?= $oeuvre->idOeuvre ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="m-2 mb-4"><?= $oeuvre->nomOeuvre; ?></h5>
                                    <small>Vues : <?= $oeuvre->vues; ?></small>
                                </div>
                                <p class="m-2"><?= $oeuvre->getExtrait(); ?></p>
                                <small class="text-info ml-2">Voir la suite</small>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="oeuvre-container salle2">
            <h2 class="text-center m-5">Salle VAN GOGH</h2>
            <ul style="display: flex; flex-wrap: wrap; list-style: none; justify-content: space-around;">

                <?php foreach ($oeuvres as $oeuvre): ?>
                    <?php if($oeuvre->salle == "salle2"): ?>
                        <li class="mb-3 w-100 mr-5">
                            <a href="?p=guest.oeuvre&id=<?= $oeuvre->idOeuvre ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="m-2 mb-4"><?= $oeuvre->nomOeuvre; ?></h5>
                                    <small>Vues : <?= $oeuvre->vues; ?></small>
                                </div>
                                <p class="m-2"><?= $oeuvre->getExtrait(); ?></p>
                                <small class="text-info ml-2">Voir la suite</small>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="oeuvre-container couloir">
            <h2 class="text-center m-5">Salle RENOIR</h2>
            <ul style="display: flex; flex-wrap: wrap; list-style: none; justify-content: space-around;">

                <?php foreach ($oeuvres as $oeuvre): ?>
                    <?php if($oeuvre->salle == "couloir"): ?>
                        <li class="mb-3 w-100 mr-5">
                            <a href="?p=guest.oeuvre&id=<?= $oeuvre->idOeuvre ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="m-2 mb-4"><?= $oeuvre->nomOeuvre; ?></h5>
                                    <small>Vues : <?= $oeuvre->vues; ?></small>
                                </div>
                                <p class="m-2"><?= $oeuvre->getExtrait(); ?></p>
                                <small class="text-info ml-2">Voir la suite</small>
                            </a>
                        </li>
                    <?php endif; ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="oeuvre-container hall">
            <h2 class="text-center m-5">Salle PICASSO</h2>
            <ul style="display: flex; flex-wrap: wrap; list-style: none; justify-content: space-around;">

                <?php foreach ($oeuvres as $oeuvre): ?>
                    <?php if($oeuvre->salle == "hall"): ?>
                        <li class="mb-3 w-100 mr-5">
                            <a href="?p=guest.oeuvre&id=<?= $oeuvre->idOeuvre ?>" class="list-group-item list-group-item-action flex-column align-items-start">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="m-2 mb-4"><?= $oeuvre->nomOeuvre; ?></h5>
                                    <small>Vues : <?= $oeuvre->vues; ?></small>
                                </div>
                                <p class="m-2"><?= $oeuvre->getExtrait(); ?></p>
                                <small class="text-info ml-2">Voir la suite</small>
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
</div>

<script src="js/today.js"></script>