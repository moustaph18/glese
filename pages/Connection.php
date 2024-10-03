<div class="card col-md-6 offset-3">
    <div class="card-header">
        <h1 class="text-success text-center">AUTHENTIFICATION</h1>
    </div>
    <div class="card-body">
        <div class="row alert alert-danger" <?= isset($erreurConnexion) ? "" : "hidden" ?> ><?= $erreurConnexion?></div>
        <form action="" method="POST">
            <label>Login</label>
            <input type="text" name="login" class="form-control">
            <label>Mot de passe</label>
            <input type="password" name="mdp" class="form-control">
            <h6 class="mt-2 text-center">vous n'avez pas de compte? <a href="?page=creationCompte"><u>Click ici</u></a> </h6>
            <button class="btn btn-sm btn-info float-end mt-2 text-white fw-bold" name="Connecter">Se Connecter</button>
        </form>
    </div>
</div>