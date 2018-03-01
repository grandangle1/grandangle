<div class="container">
    <form class="edit-form" method="POST" action="index.php?p=admin.account.create">
        <h1 class="text-center m-5 bold">Ajouter ou modifier un compte</h1>
        <div class="echo-error"></div>
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
            <div class="form-group col-lg-6">
                <label>Mot de passe</label>
                <input type="password" class="form-control info" name="password" required>
            </div>
            <div class="form-group col-lg-6">
                <label>Confirmation mot de passe</label>
                <input type="password" class="form-control info" name="passwordConfirm" required>
            </div>
        </div>
        <div class="text-center m-auto pt-3">
            <button type="submit" class="btn btn-dark text-center">Ajouter/modifier</button>
        </div>
    </form>
</div>
<script src="js/account.js"></script>
