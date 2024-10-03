<div class="card">
    <div class="card-header">
        <span>GESTION DES EMPLOYES</span>
        <button class="btn btn-sm btn-primary float-end"data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter</button>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#<th>
                    <th>Prenom<th>
                    <th>Nom<th>
                    <th>Telephone<th>
                    <th>Email<th>
                    <th>Profil<th>
                    <th>Action<th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($listeEmploye as $key => $emp) { ?>
                        
                <tr>
                    <td><?= $key + 1?><td>
                    <td><?= $emp['prenom']?><td>
                    <td><?= $emp['nom']?><td>
                    <td><?= $emp['tel']?><td>
                    <td><?= $emp['email']?><td>
                    <td><?= $emp['nomProfil']?><td>
                    <td>
                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i>
                        </button>
                        <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i>
                        </button>
                    </td>
                </tr>
                
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 mt-2 text-primary" id="exampleModalLabel" >Ajout Employes</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST">
      <div class="modal-body">
        <label for="">Prenom</label>
        <input type="text" class="form-control" name="prenom">

        <label for="">Nom</label>
        <input type="text" class="form-control" name="nom">
        
        <label for="">Tel</label>
        <input type="text" class="form-control" name="tel">

        <label for="">Email</label>
        <input type="Email" class="form-control" name="email">

        <label for="">Address</label>
        <input type="text" class="form-control" name="adresse">

        <label for="">Login</label>
        <input type="text" class="form-control" name="login">

        <label for="">Mot de passe</label>
        <input type="text" class="form-control" name="mdp">
       
        <label for="">Profil</label>
        <select name="idProfil" id="" class="form-control">
            <?php 
            foreach ($listeProfil as $key => $profil) { ?>
                <option value="<?= $profil['idProfil'] ?>"><?= $profil['nomProfil'] ?></option>
               
           <?php }  ?>
           
        </select>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary" name="ajoutEmployes">Enrigistrer</button>
      </div>
      </form>
    </div>
  </div>
</div>