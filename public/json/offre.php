<?php
    require_once "../../models/offreModel.php";
    $action = isset($_GET['action'])? $_GET['action'] : "";
    if ($action!="") {
        if ($action=="liste") {
            $liste=getOffres();
            echo json_encode($liste);
        }
        if ($action=="findOffre") {
            $id = $_GET['idOffre'];
            $offre=findOffreById($id);
            echo json_encode($offre);
        }
    }
?>