<div class="container pt-5">
    <h2 id="php" class="text-center bold p-4">Liste des oeuvres de l'expo du <?php echo $date ?></h2>

    <div class="col-lg-8 m-auto">
        <div class="list-group">
            <?php foreach ($oeuvres as $oeuvre): ?>
                <a class="list-group-item list-group-item-action flex-column align-items-start oeuvre mt-3 border border-secondary rounded-top" id="<?= $oeuvre->idOeuvre ?>">
                    <div class="d-flex w-100 justify-content-between">
                        <h4 class="mb-1"><?= $oeuvre->nomOeuvre ?></h4>
                        <small class="salle" id="index.php?p=admin.oeuvre.activity&id=<?= $oeuvre->idOeuvre ?>">
                            <?php foreach ($activities as $activity): ?>
                                <?php if ($activity->idOeuvre == $oeuvre->idOeuvre): ?>
                                    Derniere modification le <?php $date = new DateTime($activity->heure); echo $date->format("d")." ".
                                        \App\Utils::getMonthWrittenFr(intval($date->format("m")))." à ".$date->format("H:i");?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </small>
                    </div>
                    <p class="float-right bold"><?= $oeuvre->salle; ?></p>
                    <p class="mb-4 mt-5"><?= $oeuvre->descrOeuvreFr; ?></p>
                    <?php if (isset($oeuvre->urlFile)): ?>
                        <?php if(!empty($oeuvre->urlFile)): ?>
                            <?php if ($oeuvre->getFormat() == "image"): ?><div class="text-center mt-5 mb-5"><img src="<?= $oeuvre->urlFile ?>" height="200px"></div>
                            <?php elseif($oeuvre->getFormat() == "video"): ?><div class="text-center mt-5 mb-5"><video controls src="<?= $oeuvre->urlFile ?>" height="200px"><video ></div>
                            <?php elseif ($oeuvre->getFormat() == "audio"): ?><div class="text-center mt-5 mb-5"><audio controls src="<?= $oeuvre->urlFile ?>"></audio></div><?php endif; ?>

                        <?php endif; ?>
                    <?php else: ?>
                        <span>Il n'y a pas de photo pour cette oeuvre</span>
                    <?php endif; ?>
                    <a class="btn btn-dark" href="?p=admin.oeuvre.delete&id=<?= $oeuvre->idOeuvre; ?>&expo=<?= $oeuvre->idExpo ?>">Supprimer</a>
                    <a class="btn btn-secondary" href="?p=admin.oeuvre.edit&id=<?= $oeuvre->idOeuvre; ?>">Modifier</a>
                    <a class="btn btn-outline-secondary mb-5" href="?p=admin.oeuvre.code&id=<?= $oeuvre->idOeuvre; ?>">Générer un QrCode</a>
                </a>
            <?php endforeach; ?>
        </div>

        <nav aria-label="Page navigation example" class="paginer">
          <ul class="pagination" max="<?= $nbPage ?>">
            <?php if($nbPage > 1): ?>
                <li class="page-item">
                    <div class="pagi" dir="-1">
                      <a class="page-link" dir="-1" aria-label="Previous">
                        <span aria-hidden="true" dir="-1">&laquo;</span>
                        <span class="sr-only">Previous</span>
                      </a>
                 </div>
                </li>
            <?php endif; ?>
            <li class="page-item number <?php if($focus == $pages[0]) echo'active'; ?>" num="1"><a class="page-link"><?= $pages[0]; ?></a></li>
            <?php if($nbPage > 1): ?>
                <li class="page-item number <?php if($focus == $pages[1]) echo"active"; ?>" num="2" ><a class="page-link"><?= $pages[1]; ?></a></li>
            <?php endif; ?>
            <?php if($nbPage > 2): ?>
                <li class="page-item number <?php if($focus == $pages[2]) echo"active"; ?>" num="3" ><a class="page-link"><?= $pages[2]; ?></a></li>
            <?php endif; ?>
            <?php if($nbPage > 3): ?>
                <li class="page-item number <?php if($focus == $pages[3]) echo"active"; ?>" num="4" ><a class="page-link"><?= $pages[3]; ?></a></li>
            <?php endif; ?>
            <?php if($nbPage > 4): ?>
                <li class="page-item number <?php if($focus == $pages[4]) echo"active"; ?>" num="5"><a class="page-link"><?= $pages[4]; ?></a></li>
            <?php endif; ?>
            <?php if($nbPage > 1): ?>
                <li class="page-item" >
                    <div class="pagi" dir="1">
                        <a class="page-link" dir="1" aria-label="Next">
                        <span aria-hidden="true" dir="1">&raquo;</span>
                        <span class="sr-only">Next</span>
                      </a>
                    </div>
                </li>
            <?php endif; ?>
          </ul>
        </nav>
    </div>
</div>
<script type="text/javascript" src="js/listOeuvre.js"></script>