<div class="container">
    <h1 class="text-center mt-5 bold">Comptes des administrateurs</h1>
    <div class="row mt-5 mb-5 pb-5">
        <div class="card m-auto">
            <div class="card-header">
                <h2 class="center">Historique des dernières actions</h2>
            </div>
            <ul class="list-group list-group-flush">
                <?php foreach ($lastly as $a): ?>
                    <li class="list-group-item"><?= $a->translate(); ?></li>
                <?php endforeach; ?>

            </ul>
        </div>
    </div>

    <div class="row text-center mt-5">
        <h2 class="m-auto pb-3">Liste des administrateurs</h2>
        <div class="table-responsive table-container">
            <table class="table  table-striped">
                <thead>
                <tr>
                    <th class="text-center text-dark" scope="col">ID</th>
                    <th class="pl-3 text-dark" scope="col">HISTORIQUE</th>
                    <th class="pl-3 text-dark" scope="col">NOM</th>
                    <th class="pl-3 text-dark" scope="col">PRENOM</th>
                    <th class="pl-3 text-dark" scope="col">EMAIL</th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($admins as $admin): ?>
                    <tr>
                        <td class="info" scope="row"><?= $admin->id ?></td>
                        <td>
                            <h5>
                                <a href="index.php?p=admin.account.activity&page=1&id=<?= $admin->id ?>" class="badge badge-dark badge-pill ">
                                    <span >
                                        <?php if(isset($admin->actions)): ?>
                                            <?= $admin->actions ?>
                                        <?php else: ?>
                                            0
                                        <?php endif; ?>
                                    </span>
                                </a>
                            </h5>
                        </td>
                        <td class="info"><?= $admin->name ?></td>
                        <td class="info"><?= $admin->surname ?></td>
                        <td class="info pr-3"><?= $admin->email ?></td>
                        <td id="<?= $admin->id ?>">
                            <img class="delete-admin action salle float-left pr-3" src="img/admin/deleteUser.png" alt="Supprimer" title="Supprimer Admin">
                            <img class="edit-admin action salle float-left pr-3" src="img/admin/editUser.png" alt="Modifier administrateur" title="Modifier Admin">
                            <?php if ($admin->id == \Core\Auth\Session::getSession()->read('auth')->id): ?><img src="img/admin/editPassword.png" class="change-password float-left salle pr-3" title="Modifier mot de passe"><?php endif; ?>
                        </td>
                    </tr>

                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
    <div class="text-center mb-5 pb-5">
        <a href="index.php?p=admin.account.add" class="btn btn-dark ">Ajouter un nouvel administrateur</a>
    </div>
        <div class="text-center border border-secondary rounded p-3 mb-5 d-none">
            <form class="edit-form" method="POST" action="index.php?p=admin.account.edit">
                <h3 class="m-auto pt-2 pb-5">Modifier les informations de l'administrateur</h3>
                <div class="echo-error"></div>
                <input type="hidden" class="info" name="id">
                <div class="form-row pb-3">
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
                <button type="submit" class="btn btn-dark">Confirmer</button>
                <a class="btn btn-danger close-form">Fermer</a>
            </form>
        </div>
    <div class="row mb-5">
        <div class="m-auto">
            <form class="mdp-form text-center border border-secondary rounded p-4" method="POST" action="">
                <h3 class="m-auto pt-2 pb-5">Modifier le mot de passe</h3>
                <div class="echo-error-mdp"></div>
                <input type="hidden" class="info" name="id" value="<?= \Core\Auth\Session::getSession()->read('auth')->id; ?>">
                <div class="form-row pb-5">
                    <label>Mode passe : </label>
                    <input type="password" class="form-control info" name="password" required>
                    <label>Confirmer le mot de passe</label>
                    <input type="password" class="form-control info" name="password-confirm" required>
                </div>
                <button type="submit" class="btn btn-dark">Changer le mot de passe</button>
            </form>
        </div>
    </div>
</div>
<script src="js/account.js"></script>




