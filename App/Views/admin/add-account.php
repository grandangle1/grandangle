<style>
    .edit-form {
        text-align: center;
        width: 70%;
        margin: auto;
    }

    img.action {
        cursor: pointer;
    }

</style>

<h1>Ajouter un compte</h1>

<form class="edit-form" method="POST" action="index.php?p=admin.account.create">
    <h3>Modifier les informations</h3>
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
    <button type="submit" class="btn btn-light">Ajouter</button>
</form>

<script src="js/account.js"></script>
