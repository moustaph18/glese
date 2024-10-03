<div class="row">
    <?php
        foreach ($listeOffresP as $key => $offre) { ?>
        <div class="col-md-4 mb-3">
        <div class="card border border primary">
            <div class="card-body bh-light text-primary">
                <h4><?=$offre['poste']?></h4>
            </div>
            <div class="card-footer">
                <a class="btn btn-primary btn-sm float-end" 
                href="?page=detailOffre&idOffre=<?=$offre['idOffre'] ?>">Detail</a>
            </div>
        </div>
    </div>
    <?php } ?>
</div>