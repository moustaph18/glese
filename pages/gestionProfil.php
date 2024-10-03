<div class="card">
    <div class="card-header">
        <span>Profil</span>
        <button class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter</button>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom<th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($listeProfil as $key => $nomProfil) { ?>
                        
                <tr>
                    <td> <?= $key + 1 ?> </td>
                    <td><?= $nomProfil['nomProfil']?><td>
                    
                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        <button class="btn btn-sm btn-info"><i class="fas fa-info-circle"></i></button>
                        <!--<a class="btn btn-danger" href="?page=dele & id=<?= $nomProfil['idProfil'] ?>">❌</a>-->
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
        <h1 class="modal-title fs-5 mt-2 text-primary" id="exampleModalLabel" >Ajout Offre</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST">
      <div class="modal-body">
        <label for="">Profil</label>
        <input type="text" class="form-control" name="profil">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary" name="ajoutProfil">Enrigistrer</button>
      </div>
      </form>
    </div>
  </div>
</div>