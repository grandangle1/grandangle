<div class="container">
    <h1 class="text-center m-5 bold">Ajouter des artistes</h1>
    <div class="text-center">
        <a class="btn btn-secondary" href="index.php?p=admin.expo.add_artist&id=<?= $idExpo ?>">Ajouter un artiste à cette expo</a>
    </div>
    <h2 class="text-center m-5">Liste des artistes</h2>

    <?php foreach ($artists as $artist): ?>
    <div class="m-4">
        <div class="card border-secondary m-4 m-auto" style="width: 18rem;">
            <?php if (!is_null($artist->urlImg)): ?>
                <img class="card-img-top" src="<?= $artist->urlImg; ?>" alt="Card image cap">
            <?php endif; ?>
            <div class="card-body">
                <h5 class="card-title"><?= $artist->nameArtist." ".$artist->surnameArtist; ?></h5>
                <small>Resume : <?= $artist->getResume(); ?></small>
                <div class="action-container text-center" id="<?= $artist->idArtist ?>">
                    <img  class="m-4 salle" id="remove" src="img/admin/deleteUser.png" title="Supprimer l'artiste">
                    <img  class="m-4 salle" id="edit" src="img/admin/editUser.png" title="Modifier l'artiste">
                </div>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
</div>
<script src="js/list-artist-expo"></script>


