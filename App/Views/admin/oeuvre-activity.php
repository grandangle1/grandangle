<h1>Activity</h1>

<table class="table table-dark">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Auteur</th>
        <th scope="col">Heure</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
<?php foreach ($infos as $info): ?>
        <tr>
            <th scope="row"><?= $info->id ?></th>
            <td><?= $info->surname." ".$info->name; ?></td>
            <td><?= "Le ".\App\Utils::getDateFromDatetime($info->heure); ?></td>
            <td><?= \App\Utils::translateAction($info->libelle)." de l'oeuvre."; ?></td>
        </tr>

<?php endforeach; ?>
        </tbody>
</table>
