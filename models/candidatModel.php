<?php
    require_once("bd.php");
    function getCandidat(){
    global $connexion;
    $sql="SELECT * FROM utilisateur,candidature where idProfilF=6 and idUserF=idUser" ;
    return $connexion->query($sql)->fetchAll();
    }
?>