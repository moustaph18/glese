<div class="card">
    <div class="card-header">
        <span>GESTION D'OFFRES</span>
        <button class="btn btn-sm btn-primary float-end"data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter</button>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#<th>
                    <th>Poste<th>
                    <th>Date Creation<th>
                    <th>Date Publication<th>
                    <th>Action<th>

                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($listeOffre as $key => $offre) { ?>
                        
                <tr id="<?=$offre['idOffre']?>">
                   
                    <td><?=$key + 1?><td>
                    <td ><?= $offre['poste']?><td>
                    <td ><?= $offre['dateOffre']?><td>
                    <td ><?= $offre['DatePub']?><td>
                    <!-- <td ><?= $offre['competence']?><td>
                    <td ><?= $offre['description']?><td>
                    <td ><?= $offre['typeOffre']?><td> -->
                    <td>
                        <a href="?idOffre=<?=$offre['idOffre']?>&etat=1" class="btn btn-sm btn-success" 
                        <?=$offre['etatOffre']==1 ? 'hidden' : ""?>>
                        Publier</a>
                        <a href="?idOffre=<?=$offre['idOffre']?>&etat=0" class="btn btn-sm btn-dark" 
                        <?=$offre['etatOffre']==0 ? 'hidden' : ""?>>
                        Desactiver</a>
                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                        <button onclick="loadModal(<?=$offre['idOffre']?>)" class="btn btn-sm btn-info"data-bs-toggle="modal" data-bs-target="#exampleModal1"><i class="fas fa-edit"></i></button>
                    </td>
                </tr>
                
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<!-- modification -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 mt-2 text-primary" id="exampleModalLabel" >Modifier Offre</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST">
      <div class="modal-body">
      <input type="text" type="hidden" class="form-control" id="id" name="id">
        <label for="">POSTE</label>
        <input type="text" type="hidden" class="form-control" id="poste" name="poste">
        <label for="">Description</label>
        <textarea class="form-control" id="description" name="description"></textarea>
        <label for="">Competence</label>
        <textarea class="form-control" id="competence" name="competence"></textarea>
        <label for="">Type Offre</label>
        <select name="type" id="offreO" class="form-control">
            <option value="emploi">Emploi</option>
            <option value="stage">Stage</option>
        </select>
        <div class="mt-2 text-primary">
        <input type="checkbox" name="publier" id="publier">Publier
        </div>
      </div>
      <!-- <input id="idOAM" type="hidden" class="form-control"> -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary" name="ModOffre">Modifier</button>
      </div>
      </form>
    </div>
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
        <label for="">POSTE</label>
        <input type="text" class="form-control" name="poste">
        <label for="">Description</label>
        <textarea class="form-control" name="description"></textarea>
        <label for="">Competence</label>
        <textarea class="form-control" name="competence"></textarea>
        <label for="">Type Offre</label>
        <select name="type" id="" class="form-control">
            <option value="emploi">Emploi</option>
            <option value="stage">Stage</option>
        </select>
        <div class="mt-2 text-primary">
        <input type="checkbox" name="publier" id="">Publier
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary" name="ajoutOffre">Enrigistrer</button>
      </div>
      </form>
    </div>
  </div>
</div>
<script>
  function loadModal(id) {
    $.ajax({
      url : "http://localhost/glese/public/json/offre.php?action=findOffre&idOffre="+id,
      dataType : "json",
      method : "GET",
      success : function (dataResult) {
        if (dataResult!=0) {
          $("#id").val(dataResult.idOffre);
          $("#poste").val(dataResult.poste);
          $("#description").val(dataResult.description);
          $("#competence").val(dataResult.competence);
          $("#type").val(dataResult.typeOffre);
          var verif=dataResult.etatOffre==0 ? false : true;
          $("#publier").prop("checked",verif);
        }
      }
    });
  }
</script>