<div class="card col-md-6 offset-3">
    <div class="card-header">
        <h1 class="text-success text-center">CREATION COMPTE</h1>
    </div>
    <div class="card-body"> 
        <form action="" method="POST" enctype="multipart/form-data">
            <label for="">Prenom</label>
            <input type="text" class="form-control" id="prenom" name="prenom">

            <label for="">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom">
            <label for="">Tel</label>
            <input type="text" class="form-control" id="tel" name="tel">

            <label for="">Email</label>
            <input type="Email" class="form-control" id="email" name="email">

            <label for="">Address</label>
            <input type="text" class="form-control" id="address" name="adresse">

            <label for="">Login</label>
            <input type="text" class="form-control" id="login" name="login">

            <label for="">Mot de passe</label>
            <input type="password" class="form-control" id="mot de passe" name="mdp">
            <label for="">Joindre votre CV </label>
            <input  type="file" name="fichier" id="CV" class="form-control mt-2">
            <div id="text"class="text-danger" hidden >Format non pris en compte</div>
            <label for="" hidden>Profil</label>
            <select name="idProfil" id="" class="form-control" hidden>
                <?php 
                foreach ($listeProfil as $profil) { ?>
                    <?php if ($profil['idProfil'] == 6) { ?>
                        <option value="<?= $profil['idProfil']?>"><?= $profil['nomProfil'] ?></option> 
                   <?php } ?>
                
            <?php }  ?>
            </select>
            <button type="" id="botton" class="btn btn-primary mt-2 float-end" onclick="enrigistrer()" name="CreerCandidat">Enrigistrer</button>
            <a type="submit" class="btn btn-warning mt-2 offset-7" href="?page=Connection">Annuler</a>
        </form>
    </div>
</div>