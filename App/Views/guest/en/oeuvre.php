<div class="container mt-5">
    <div class="card p-2 m-auto text-center">
        <?php if(!empty($oeuvre->urlFile)): ?>
            <?php if ($oeuvre->getFormat() == "image"): ?><img src="<?= $oeuvre->urlFile ?>" width="100%" height="100%" >
            <?php elseif($oeuvre->getFormat() == "video"): ?><video controls src="<?= $oeuvre->urlFile ?>" height="200px"></video >
            <?php elseif ($oeuvre->getFormat() == "audio"): ?><audio controls src="<?= $oeuvre->urlFile ?>"></audio><?php endif; ?>
        <?php endif; ?>
        <h3 class="bold mt-4"><?= $oeuvre->nomOeuvre; ?></h3>
        <p class="bold">This art work is on display in  <?= $oeuvre->salle ?></p>
        <p><?= $oeuvre->descrOeuvreFr; ?></p>
        <small class="text-center m-3">Views : <?= $oeuvre->vues ?></small>

    </div>
</div>