<div class="container">
    <h1 class="text-center m-5 bold">Réinitialiser le mot de passe</h1>

    <form method="POST" action="index.php?p=guest.resetPassword">

        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" name="email">
            <small id="emailHelp" class="form-text text-muted">Veuillez renseigner votre adresse mail<br>
            Un mail contenant un lien pour réinitialiser votre mot de passe vous sera envoyé</small>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-secondary">Envoyer</button>
        </div>
    </form>
</div>



