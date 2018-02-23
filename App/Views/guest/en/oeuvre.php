<h1 style="text-align: center;"><?= $oeuvre->nomOeuvre; ?></h1>

<ul>
    <li><img src="<?= $oeuvre->urlFile ?>" height="200px"></li>
    <li>This art work is on display in <?= $oeuvre->salle ?><small>Views : <?= $oeuvre->vues ?></small></li>
    <li><?= $oeuvre->descrOeuvreEn; ?></li>
</ul>