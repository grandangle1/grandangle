<div class="container">
    <h1 class="text-center m-5 bold">Reset password</h1>

    <form method="POST" action="index.php?p=guest.resetPassword">

        <div class="form-group">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" name="email">
            <small id="emailHelp" class="form-text text-muted">Please enter your email address<br>
                An email containing a link to reset your password will be sent to you</small>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-secondary">Send</button>
        </div>
    </form>
</div>

