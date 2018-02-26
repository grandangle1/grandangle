<h1 style="text-align: center;"><?= $oeuvre->nomOeuvre; ?></h1>

<ul>
    <?php if(!empty($oeuvre->urlFile)): ?>
        <?php if ($oeuvre->getFormat() == "image"): ?><li><img src="<?= $oeuvre->urlFile ?>" height="200px"></li>
        <?php elseif($oeuvre->getFormat() == "video"): ?><li><video controls src="<?= $oeuvre->urlFile ?>" height="200px"><video ></li>
        <?php elseif ($oeuvre->getFormat() == "audio"): ?><li><audio controls src="<?= $oeuvre->urlFile ?>"></audio></li><?php endif; ?>
    <?php endif; ?>
    <li>This art work is on display in <?= $oeuvre->salle ?><small>Views : <?= $oeuvre->vues ?></small></li>
    <li><?= $oeuvre->descrOeuvreEn; ?></li>
</ul>