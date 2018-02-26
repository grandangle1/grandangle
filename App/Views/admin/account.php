<style>
    .table-container {
        width: 70%;
        margin: auto;
    }

    form {
        text-align: center;
        width: 70%;
        margin: auto;
    }

    img.action {
        cursor: pointer;
    }
    
    .edit-form {
        display: none;
    }
    .mdp-form {
        display: none;
    }
    .badge-pill {
        float: right;
        cursor: pointer;
    }

</style>


<h1>les comptes</h1>
<div class="table-responsive table-container">
    <table class="table  table-striped">
        <caption>Liste des administrateurs</caption>
        <thead class="thead-dark">
            <tr>
                <th scope="col">ids</th>
                <th scope="col">Identifiant</th>
                <th scope="col">Nom</th>
                <th scope="col">Prenom</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
    <?php foreach ($admins as $admin): ?>
            <tr>
                <th class="info" scope="row"><?= $admin->id ?></th>
                <td><?= $admin->identifiant ?>
                    <a href="index.php?p=admin.account.activity&page=1&id=<?= $admin->id ?>">
                        <span class="badge badge-primary badge-pill">
                            <?php if (isset($admin->actions)):  ?>
                                <?= $admin->actions ?></span>
                            <?php else: ?>
                                0
                            <?php endif; ?>
                    </a>
                </td>
                <td class="info"><?= $admin->name ?></td>
                <td class="info"><?= $admin->surname ?></td>
                <td class="info"><?= $admin->email ?></td>
                <td id="<?= $admin->id ?>">
                    <img class="delete-admin action" src="img/admin/deleteExpo.png" alt="supprimer administrateur">
                    <img class="edit-admin action" src="img/admin/editExpo.png" alt="Modifier administrateur">
                    <?php if ($admin->id == \Core\Auth\Session::getSession()->read('auth')->id): ?><a class="btn btn-warning change-password">Changer de mot de passe</a><?php endif; ?>
                </td>
            </tr>

    <?php endforeach; ?>
        <tr>
            <td colspan="6" style="text-align: center;"><a href="index.php?p=admin.account.add" class="btn btn-light">Ajouter un nouvel administrateur</a></td>
        </tr>
        </tbody>
    </table>
</div>

<form class="edit-form" method="POST" action="index.php?p=admin.account.edit">
    <h3>Modifier les informations</h3>
    <div class="echo-error"></div>
    <input type="hidden" class="info" name="id">
    <div class="form-row">
        <div class="form-group col-lg-6">
            <label>Nom</label>
            <input type="text" class="form-control info" name="name" required>
        </div>
        <div class="form-group col-lg-6">
            <label>Prenom</label>
            <input type="text" class="form-control info" name="surname" required>
        </div>
        <div class="form-group col-lg-6">
            <label>Identifiant</label>
            <input type="text" class="form-control info" name="identifiant" required>
        </div>
        <div class="form-group col-lg-6">
            <label>Email</label>
            <input type="email" class="form-control info" name="email" required>
        </div>
    </div>
    <button type="submit" class="btn btn-light">Modifier</button>
    <a class="btn btn-danger close-form">Close</a>
</form>

<form class="mdp-form" method="POST" action="">
    <h3>Modifier le mot de passe</h3>
    <div class="echo-error-mdp"></div>
    <input type="hidden" class="info" name="id" value="<?= \Core\Auth\Session::getSession()->read('auth')->id; ?>">
    <div class="form-row">
        <div class="form-group col-lg-6">
            <label>Mode passe : </label>
            <input type="password" class="form-control info" name="password" required>
        </div>
        <div class="form-group col-lg-6">
            <label>Confirmer le mot de passe</label>
            <input type="password" class="form-control info" name="password-confirm" required>
        </div>
    </div>
        <button type="submit" class="btn btn-light">Changer ke mot de passe</button>
</form>

<script src="js/account.js"></script>




