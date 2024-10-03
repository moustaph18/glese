<div class="card">
    <div class="car-header">
        <h2>Detail Offre (<?= $offeDetail['poste']?>)</h2>
    </div>
    <div class="card-body">
            <a class="btn btn-sm btn-success offset-3"  href="?page=CandidatAccepter&idOffre=<?=$offeDetail['idOffre']?>&EtatC=1">CAndidats Acccepter</a>
            <a class="btn btn-sm btn-warning" href="?page=CandidatEnAttente&idOffre=<?=$offeDetail['idOffre']?>&EtatC=-1">CAndidats En Attente</a>
            <a class="btn btn-sm btn-danger"  href="?page=CandidatRefuser&idOffre=<?=$offeDetail['idOffre']?>&EtatC=0">CAndidats Refuser</a>
        
        <div class="row mt-2">
            <h4>LISTES DES CANDIDATS</h4>
            <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#<th>
                    <th>Prenom<th>
                    <th>Nom<th>
                    <th>Telephone<th>
                    <th>Email<th>
                    <th>Action<th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($listeCandidatPos as $key => $emp) { 
                        if ($emp['etatC']==-1) {?>
                  <tr>
                    <td><?= $key + 1?><td>
                    <td><?= $emp['prenom']?><td> 
                    <td><?= $emp['nom']?><td>
                    <td><?= $emp['tel']?><td>
                    <td><?= $emp['email']?><td>

                    

                    <td>
                        <a href="http://localhost/glese/public\documents/"<?=$emp['ficherCV'] != "" ? "" : "hidden"?> class="btn btn-sm btn-warning">Voir CV
                        </a>
                        <a href="?page=infoCandidatPos&idCandidature=<?=$emp['idCandidature']?>&idOffre=<?=$emp['idOffreF']?>&email=<?=$emp['email']?>&action=accepter" <?=$emp['ficherCV'] != "" ? "" : "hidden"?> class="btn btn-sm btn-success" >Accepter
                        </a>
                        <a href="?page=infoCandidatPos&idCandidature=<?=$emp['idCandidature']?>&idOffre=<?=$emp['idOffreF']?>&Email=<?= $emp['email']?>&action=refuser" <?=$emp['ficherCV'] != "" ? "" : "hidden"?> class="btn btn-sm btn-danger">Refuser
                        </a>
                    </td>
                </tr>
                       <?php }?>
                        
            
                <?php } ?>
            </tbody>
        </table>
        </div>
    </div>
</div>