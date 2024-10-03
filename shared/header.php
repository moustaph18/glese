<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - SB Admin</title>
       <!-- <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />  -->
        <link href="http://localhost/glese/public/css/datatable.css" rel="stylesheet" />
        <link href="http://localhost/glese/public/css/styles.css" rel="stylesheet" />
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <script src="http://localhost/glese/public/js/fontawesome.js"></script>
        <script src="http://localhost/glese/public/js/chart.js"></script>
        <!-- <script>
            $(document).ready(function() {
                 $(document).on('click','a[data-role=update]',function() {
                //   alert('OK');
                // Chargement des champs a modifier pour l'offre
                var id = $(this).data('id');
                // alert(id);
                var poste = $('#'+id).children('td[data-target=poste]').text();
                var description = $('#'+id).children('td[data-target=description]').text();
                var competence = $('#'+id).children('td[data-target=competence]').text();
                var typeOffre= $('#'+id).children('td[data-target=typeOffre]').text();
                    $('#poste').val(poste);
                    $('#description').val(description);
                    $('#competence').val(competence);
                    $('#offreO').val(typeOffre);
                    $('#idOAM').val(id);
                    $('#exampleModal1').modal('toggle');
                });
                 $('#update').click(function(){
                     var id = $('#idOAM').val();
                     var poste = $('#poste').val();
                     var description = $('#description').val();
                     var typeOffre =  $('#offreO').val();

                     $.ajax({
                         url : 'gestionOffre.php',
                         method : 'POST',
                         data : {poste :poste, description :description, typeOffre :typeOffre , idOffre :id},
                         success : function(modification){
                            $('#'+id).children('td[data-target=poste]').text(poste);
                            $('#'+id).children('td[data-target=description]').text(description);
                            $('#'+id).children('td[data-target=competence]').text(competence);
                            $('#'+id).children('td[data-target=typeOffre]').text(typeOffre);

                            $('#exampleModal1').modal('toggle');
                         }
                     });
                });
            }); 
            
        </script>-->
        <!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
    </head>
    <body class="sb-nav-fixed">
