<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 mt-2 text-primary" id="exampleModalLabel" >Modifier Offre</h1>
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
        <button type="submit" class="btn btn-primary" name="ModOffre">Modifier</button>
      </div>
      </form>
    </div>
  </div>
</div>