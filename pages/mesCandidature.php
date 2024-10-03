<div class="card">
    <div class="card-header">Mes Candidatures (Offres Postulees)</div>
    <div class="card-body">
    <div class="row">
        <?php foreach ($listeCandidatureP as $candidat) { ?>
            <div class="col-md-4 mb-3">
            <div class="card border border primary bg-info">
                <div class="card-body bh-light text-primary">
                    <h4><?=$candidat['poste']?></h4>
                    <h6 class="text-warning" <?= ($candidat['etatC']==-1) ? "" : "hidden" ?>
                    >En attente de validation</h6>
                    <h6 class="text-primary" <?= ($candidat['etatC']==1) ? "" : "hidden" ?>
                    >Candidature Valider</h6>
                    <h6 class="text-danger" <?= ($candidat['etatC']==0) ? "" : "hidden" ?>
                    >Candidature Refuser</h6>
                </div>
                <div class="card-footer">
                    <a class="btn btn-primary btn-sm float-end" 
                    href="?page=detailOffre&idOffre=<?=$candidat['idOffre'] ?>">Detail</a>
                </div>
            </div>
            </div>
        <?php } ?>
</div>
</div>
</div>