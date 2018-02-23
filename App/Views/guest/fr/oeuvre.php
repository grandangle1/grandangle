<h1 style="text-align: center;"><?= $oeuvre->nomOeuvre; ?></h1>

<ul>
    <li><img src="<?= $oeuvre->urlFile ?>" height="200px"></li>
    <li>Cette oeuvre est à voir en salle <?= $oeuvre->salle ?><small>Vues : <?= $oeuvre->vues ?></small></li>
    <li><?= $oeuvre->descrOeuvreFr; ?></li>
</ul>