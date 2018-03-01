<h1>New mot de passe</h1>

<form class="new-pass" method="POST" action="">

    <div class="form-group">
        <input type="hidden" name="id" value="<?= $id; ?>">
        <label for="exampleInputEmail1">Mot de passe</label>
        <input type="password" id="p1" name="password">
        <label for="exampleInputEmail1">Confirmez le mot de passe</label>
        <input type="password" id="p2">
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>
<script src="js/newPassword.js"></script>