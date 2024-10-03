<div class="card">
    <div class="card-header">
        <span>Tableau des Candidats</span>
        <!--<button class="btn btn-sm btn-primary float-end"data-bs-toggle="modal" data-bs-target="#exampleModal">Ajouter</button>-->
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#<th>
                    <th>Poste<th>
                    <th>Type<th>
                    <th>Date<th>
                    <th>Nombre Candidature<th>
                </tr>
            </thead>
            <tbody>
            <?php
                    foreach ($listeOffrePostule as $key => $cad) { ?>
                        
                <tr>
                    <td><?= $key + 1?><td>
                    <td><?= $cad['poste']?><td>
                    <td><?= $cad['typeOffre']?><td>
                    <td><?= $cad['dateOffre']?><td>
                    <td><?= $cad['nb']?><td>
                    
                    <td>
                    <a href="?page=infoCandidatPos&idOffre=<?=$cad['idOffre']?>" class="btn btn-sm btn-info">Detail</a>
                    </td>
                </tr>
                
                <?php } ?>
            </tbody>
        </table>
    </div>
</div> 
 <!-- <div class="col-lg-6 mt-2">
    <div class="card mb-4">
        <div class="card-header">
            <svg class="svg-inline--fa fa-chart-pie me-1" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chart-pie" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" data-fa-i2svg=""><path fill="currentColor" d="M304 16.58C304 7.555 310.1 0 320 0C443.7 0 544 100.3 544 224C544 233 536.4 240 527.4 240H304V16.58zM32 272C32 150.7 122.1 50.34 238.1 34.25C248.2 32.99 256 40.36 256 49.61V288L412.5 444.5C419.2 451.2 418.7 462.2 411 467.7C371.8 495.6 323.8 512 272 512C139.5 512 32 404.6 32 272zM558.4 288C567.6 288 575 295.8 573.8 305C566.1 360.9 539.1 410.6 499.9 447.3C493.9 452.1 484.5 452.5 478.7 446.7L320 288H558.4z"></path></svg><i class="fas fa-chart-pie me-1"></i> Font Awesome fontawesome.com
            Pie Chart Example
        </div>
        <div class="card-body"><div class="chartjs-size-monitor"><div               class="chartjs-size-monitor-expand"><div class=""></div></div><div  class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <canvas id="myPieChart" width="285" height="142" style="display: block; height: 129px; width: 259px;" class="chartjs-render-monitor"></canvas>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
</div> -->
<div class="col-lg-6 mt-2 offset-3">
      <div class="card mb-4">
          <div class="card-header">
              <i class="fas fa-chart-pie me-1"></i>
              Diagramme des postes en fonction du nombre de candidature
          </div>
          <div class="card-body">
              <canvas id="myPieChart" width="100%" height="50"></canvas>
          </div>
         
      </div>
  </div>
  
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
<?php
    foreach ($listeOffrePostule as $cd) {
        $poste[]=$cd['poste'];
        $nombre[]=$cd['nb'];
    }
    ?>

<script>
   // // Set new default font family and font color to mimic Bootstrap's default styling
   
   // Pie Chart Example
   const labels=<?php echo json_encode($poste) ?>;
   var ctx = document.getElementById("myPieChart");
   var myPieChart = new Chart(ctx, {
     type: 'pie',
     data: {
       labels: labels,
       datasets: [{
         data:<?php echo json_encode($nombre) ?> ,
         backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
        }],
      },
    });
</script>

<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->

<!-- <script>
  var ctx = document.getElementById('myPieChart');

  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2, 3],
        borderWidth: 1
      }]
    },
    // options: {
    //   scales: {
    //     y: {
    //       beginAtZero: true
    //     }
    //   }
    // }
  });
</script> -->
