<style>


</style>


        <h2 class="center p-4 bold mt-5">Comptes des administrateurs</h2>
        <div class="table-responsive table-container">
            <table class="table  table-striped">
                <caption>Liste des administrateurs</caption>
                <thead class="thead-dark">
                    <tr>
                        <th class="text-center" scope="col">ID</th>
                        <th class="pl-3" scope="col">IDENTIFIANT</th>
                        <th class="pl-3" scope="col">HISTORIQUE</th>
                        <th class="pl-3" scope="col">NOM</th>
                        <th class="pl-3" scope="col">PRENOM</th>
                        <th class="pl-3" scope="col">EMAIL</th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
            <?php foreach ($admins as $admin): ?>
                    <tr>
                        <th class="info" scope="row"><?= $admin->id ?></th>
                        <td class="pl-5" scope="row"><?= $admin->identifiant ?></td>
                        <td class="pl-5"><a href="index.php?p=admin.account.activity&page=1&id=<?= $admin->id ?>"><span class="badge badge-dark badge-pill"><?= $admin->actions ?></span></a></td>
                        <td class="pl-5 info"><?= $admin->name ?></td>
                        <td class="info"><?= $admin->surname ?></td>
                        <td class="info"><?= $admin->email ?></td>
                        <td id="<?= $admin->id ?>">
                            <img class="delete-admin action salle" src="img/admin/deleteExpo.png" alt="Supprimer">
                            <img class="edit-admin action salle" src="img/admin/editExpo.png" alt="Modifier administrateur">
                            <?php if ($admin->id == \Core\Auth\Session::getSession()->read('auth')->id): ?><a class="btn btn-warning change-password">Changer de mot de passe</a><?php endif; ?>
                        </td>
                    </tr>

            <?php endforeach; ?>

                </tbody>
            </table>
        </div>
        <div class="text-center">
            <a href="index.php?p=admin.account.add" class="btn btn-dark ">Ajouter un nouvel administrateur</a>
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
                <button type="submit" class="btn btn-light">Changer le mot de passe</button>
        </form>

<script src="js/account.js"></script>




