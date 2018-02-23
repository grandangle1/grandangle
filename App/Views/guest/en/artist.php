<h1><?= ucfirst($artist->surnameArtist); ?> <?= ucfirst($artist->nameArtist); ?></h1>

<?php if(!is_null($artist->urlImg)): ?>
    <img src="<?= $artist->urlImg; ?>" height="200">
<?php endif; ?>
<small>Was born on the  <?= $artist->birthDate; ?></small>

<p><?= $artist->descrArtistEN; ?></p>