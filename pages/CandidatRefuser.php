<div class="card">
    <div class="car-header">
        <h2>Detail Offre (<?= $offeDetail['poste']?>)
        <button onclick="refuserPDF()" class="btn-sm btn-primary float-end mt-1 ">Imprimer</button></h2>
        
    </div>
    <div class="card-body">
    <a class="btn btn-sm btn-success offset-3"  href="?page=CandidatAccepter&idOffre=<?=$offeDetail['idOffre']?>">CAndidats Acccepter</a>
            <a class="btn btn-sm btn-warning" href="?page=CandidatEnAttente&idOffre=<?=$offeDetail['idOffre']?>">CAndidats En Attente</a>
            <a class="btn btn-sm btn-danger"  href="?page=CandidatRefuser&idOffre=<?=$offeDetail['idOffre']?>">CAndidats Refuser</a>
        
        <div class="row mt-2" id="table1">
            <h4>LISTES DES CANDIDATS REFUSER</h4>
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
                        if ($emp['etatC']==0) {?>
                  <tr>
                    <td><?= $key + 1?><td>
                    <td><?= $emp['prenom']?><td> 
                    <td><?= $emp['nom']?><td>
                    <td><?= $emp['tel']?><td>
                    <td><?= $emp['email']?><td>
                    

                    <td>
                        <a <?=$emp['ficherCV'] != "" ? "" : "hidden"?> class="btn btn-sm btn-warning">Voir CV
                        </a>
                        <a href="?page=infoCandidatPos&idCandidature=<?=$emp['idCandidature']?>&idOffre=<?=$emp['idOffreF']?>&action=accepter" <?=$emp['ficherCV'] != "" ? "" : "hidden"?> class="btn btn-sm btn-success" >Accepter
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js" integrity="sha512-GsLlZN/3F2ErC5ifS5QtgpiJtWd43JWSuIgh7mbzZ8zBps+dvLusV+eNQATqgA/HdeKFVgA5v3S/cIrLF7QnIg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    function refuserPDF() {
        let table=document.getElementById('table1');
        let option={
            margin : 1,
            filename:'listeCandidatrefuser.pdf',
            image:{
                type:'png',
                quality:1
            },
            html2cnvas:{
                scale:2,
            },
            jsPDF:{
                unit:'in',
                format:'A4',
                orientation:'landscape'
            }
        }
        html2pdf().from(table).set(option).save()
    }
</script>