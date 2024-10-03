<div class="row alert alert-success"<?= ($verifierCandidature !=0 && $verifierCandidature !=false) ? 
    "" : "hidden" ?>>
   <h3>Vous avez deja postuler a cette offre(<?= $verifierCandidature['dateC']?>)</h3>
   <h2 class="text-warning" <?= ($verifierCandidature['etatC']==-1) ? "" : "hidden" ?>
   >En attente de validation</h2>
   <h2 class="text-primary" <?= ($verifierCandidature['etatC']==1) ? "" : "hidden" ?>
   >Candidature Valider</h2>
   <h2 class="text-danger" <?= ($verifierCandidature['etatC']==0) ? "" : "hidden" ?>
   >Candidature Refuser</h2>
</div>
<div class="card">
    <div class="card-header">
        <h3><?= $offeDetail['poste']?></h3>
    </div>
    <div class="card-body">
        <div class="row">
            <form action="" method="POST">
        <input type="hidden" name="idOffre" value="<?= $offeDetail['idOffre']?>">

                <button <?= ($verifierCandidature !=0 && $verifierCandidature !=false) ? 
                "hidden" : "" ?> <?= ($_SESSION['user']['nomProfil']!="Candidat") ? "hidden":"" ?> class="btn btn-primary bt-sm float-end"  class="btn btn-sm btn-primary float-end" name="postuler">Postuler
                </button>
                <a <?= ($_SESSION['user']['nomProfil']=="RH") ? 
                "" : "hidden" ?>  class="btn btn-primary bt-sm float-end"  class="btn btn-sm btn-primary float-end" data-bs-toggle="modal" data-bs-target="#exampleModal" >Modifier
                </a>
                
            </form>
        </div>
        <p class="text-justify"><?= $offeDetail['description']?></p>
        <h3>COMPETENCE</h3>
        <p class="text-justify"><?= $offeDetail['competence']?></p>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 mt-2 text-primary" id="exampleModalLabel" >Modifier Offre</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form method="POST" value="<?= $offeDetail['idOffre']?>">
      <div class="modal-body">
        <label for="">POSTE</label>
        <input type="text" class="form-control" value="<?= $offeDetail['poste']?>"  name="poste">
        <label for="">Description</label>
        <textarea value="" class="form-control"  name="description"><?= $offeDetail['description']?></textarea>
        <label for="">Competence</label>
        <textarea class="form-control" value="" name="competence"><?= $offeDetail['competence']?></textarea>
        <label for="">Type Offre</label>
        <select name="type" value="<?= $offeDetail['typeOffre']?>" id="" class="form-control">
            <option value="emploi">Emploi</option>
            <option value="stage">Stage</option>
        </select>
        <div class="mt-2 text-primary">
        <input type="checkbox" name="publier" id="">Publier
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary" name="Modifier">Modifier</button>
      </div>
      </form>
    </div>
  </div>
</div>