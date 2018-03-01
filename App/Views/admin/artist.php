<?php if(empty($data)): ?>
    <h1 class="text-center m-5 bold">Ajouter un artiste</h1>
<?php else: ?>
    <h1 class="text-center m-5 bold">Modifier un artiste</h1>
<?php endif; ?>
<div class="container">
    <form id="artist-form" class="form-group">
        <ul class="list-group-item">
            <li class="list-inline m-3">
                <label class="list-inline-item">Nom : </label>
                <input <?php if(!empty($data)): ?> value="<?= $data['artist']->nameArtist ?>" <?php endif; ?> class="list-inline-item form-control" type="text" name="nameArtist">
                <span class="alert nameArtist"></span>
            </li>

            <li class="list-inline m-3">
                <label class="list-inline-item">Prenom : </label>
                <input <?php if(!empty($data)): ?> value="<?= $data['artist']->surnameArtist ?>" <?php endif; ?> class="list-inline-item form-control" type="text" name="surnameArtist">
                <span class="alert surnameArtist"></span>
            </li>
            <li class="list-inline m-3">
                <label class="list-inline-item">Date de naissance : </label>
                <input <?php if(!empty($data)): ?> value="<?= $data['artist']->birthDate ?>" <?php endif; ?> class="list-inline-item form-control" type="date" name="birthDate">
                <span class="alert birthDate"></span>
            </li>
            <li class="list-inline m-3">
                <label class="list-inline-item">Description en Français : </label>
                <textarea class="list-inline-item form-control" name="descrArtistFr"><?php if(!empty($data)): ?><?= $data['artist']->descrArtistFR ?><?php endif; ?></textarea>
                <span class="alert descrArtistFr"></span>
            </li>
            <li class="list-inline m-3">
                <label class="list-inline-item">Description en Anglais: </label>
                <textarea class="list-inline-item form-control" name="descrArtisteEn"><?php if(!empty($data)): ?><?= $data['artist']->descrArtistEN ?><?php endif; ?></textarea>
                <span class="alert descrArtisteEn"></span>
            </li>
            <li class="list-inline m-3">
                <label class="list-inline-item">Photo (facultatif):  </label>
                <input type="file" id="file-artist" class="list-inline-item form-control" name="urlImg">
                <span class="alert urlImg"></span>
            </li>
            <?php if(!empty($data) && isset($artist->urlImg)): ?>
                <li class="list-inline m-3">
                    <p>Image courante</p>
                    <img src="<?= $artist->urlImg; ?>" height="100">
                </li>

            <?php endif; ?>
            <?php if(empty($data)): ?>
                <button type="submit" class="btn btn-dark btn-lg btn-block mt-4 mb-5" action="add">Envoyer</button>
            <?php else: ?>
                <button type="submit" class="btn btn-dark btn-lg btn-block mt-4 mb-5" action="edit">Modifier</button>
            <?php endif; ?>
        </ul>
    </form>
</div>
<script src="js/add-artist.js"></script>