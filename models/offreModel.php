<?php
    require_once("bd.php");
    function getOffres(){
        global $connexion;
        $sql="SELECT * FROM offre";
        return $connexion->query($sql)->fetchAll();
    }
    function addOffre($poste,$des,$comp,$type,$etat){
        global $connexion;
        $numero="OF_".date("dmYHis");
        $date=date("d-m-Y H:i");
        $datePub=$etat==1 ? $date : "";
        $sql="INSERT INTO offre(numero,dateOffre,poste,description,etatOffre,competence,typeOffre,DatePub)
        values(:numero,:date,:poste,:des,$etat,:comp,:type,:datePub)";
        $state=$connexion->prepare($sql);
        $state->bindValue("numero",$numero,PDO::PARAM_STR);
        $state->bindValue("date",$date,PDO::PARAM_STR);
        $state->bindValue("poste",$poste,PDO::PARAM_STR);
        $state->bindValue("des",$des,PDO::PARAM_STR);
        $state->bindValue("comp",$comp,PDO::PARAM_STR);
        $state->bindValue("type",$type,PDO::PARAM_STR);
        $state->bindValue("datePub",$datePub,PDO::PARAM_STR);
        return $state->execute();
    }
    function updateOffre($id,$poste,$des,$comp,$type,$etat){
        global $connexion;
        $date=date("d-m-Y H:i");
        $datePub=$etat==1 ? $date : "";
        $sql="UPDATE offre SET poste=:poste,description=:des,competence=:comp,typeOffre=:type,DatePub=:datePub where idOffre=$id";
        $state=$connexion->prepare($sql);
        // $state->bindValue("date",$date,PDO::PARAM_STR);
        $state->bindValue("poste",$poste,PDO::PARAM_STR);
        $state->bindValue("des",$des,PDO::PARAM_STR);
        $state->bindValue("comp",$comp,PDO::PARAM_STR);
        $state->bindValue("type",$type,PDO::PARAM_STR);
        $state->bindValue("datePub",$datePub,PDO::PARAM_STR);
        return $state->execute();
    }
    // function updateOffre($poste,$description,$competence,$typeOffre,$id){
    //    // $numero="OF_".date("dmYHis");
    //     // $sql="UPDATE offre SET poste='$poste' description='$des' competence='$comp' typeOffre='$type' etatOffre='$etat' where idOffre=$idOf ";
    //     $req ="UPDATE offre SET poste='$poste' description='$description',competence='$competence',typeOffre='$typeOffre' where idOffre=$id";
    // }
    function updateEtat($etat,$idOffre){
        $date=date("d-m-Y H:i");
        $datePub=$etat==1 ? $date : "";
        $sql="UPDATE offre SET DatePub='$datePub',etatOffre=$etat WHERE idOffre=$idOffre ";
        global $connexion;
        return $connexion->exec($sql);
    }

    function getOffrePub(){
        global $connexion;
        $sql="SELECT * FROM offre where etatOffre=1";
        return $connexion->query($sql)->fetchAll();
    }

    function findOffreById($id){
        global $connexion;
        $sql="SELECT * FROM offre WHERE idOffre=$id";
        return $connexion->query($sql)->fetch();
    }

    function addCandidature($idOffre,$idUser){
        global $connexion;
        $date=date("d-m-Y h:i");
        $sql="INSERT INTO candidature(idUserF,idOffreF,dateC)
        values($idUser,$idOffre,'$date')";
        return $connexion->exec($sql);
    }
    function updateCandidature($id,$etatC,$candi){
        global $connexion;
        $sql="UPDATE utilisateur,candidature,offre SET etatC='$etatC' where idOffreF=$id and idCandidature=$candi";
        return $connexion->exec($sql);
    }
    function verifierCandidature($idOffre,$idUser){
        global $connexion;
        $sql="SELECT * from candidature where idUserF=$idUser and idOffreF=$idOffre";
        return $connexion->query($sql)->fetch();
    }
    function getCandidatureByIdUser($idUser){
        global $connexion;
        $sql="SELECT * FROM offre o,utilisateur u,candidature c where c.idUserF=u.idUser and
        c.idOffreF=o.idOffre and u.idUser=$idUser";
        return $connexion->query($sql)->fetchAll();
    }
    function Candidat($idC){
        global $connexion;
        $sql="SELECT * FROM profil,utilisateur,candidature where idUserF=idUser and
        idProfilF='6' and idUser='$idC' /*and lower(nomProfil)='Candidat'*/";
        return $connexion->query($sql)->fetch();
    }
    function getCandidatureEnAttennte($idUser){
        global $connexion;
        $sql="SELECT * FROM offre,utilisateur,candidature where idUserF=idUser and
        idOffreF=idOffre and idUser=$idUser and etatC=-1";
        return $connexion->query($sql)->fetchAll();
    }
    function getOffrePostulees(){
        global $connexion;
        $sql="SELECT * ,count(idCandidature) AS nb from offre,candidature where idOffreF=idOffre group by idOffre ";
        return $connexion->query($sql)->fetchAll();
    }
    function getCandidatByOffre($idOffre){
        global $connexion;
        $sql="SELECT * from utilisateur,candidature where idUserF=idUser and idOffreF=$idOffre";
        return $connexion->query($sql)->fetchAll();
    }
    function getnvCandidat(){
        global $connexion;
        $sql="SELECT * FROM utilisateur u, profil p WHERE p.idProfil=u.idProfilF";
        return $connexion->query($sql)->fetchAll();
    }

    function getnvCandidatID(){
        global $connexion;
        $sql="SELECT * FROM utilisateur order by idUser desc limit 1 ";
        return $connexion->query($sql)->fetch();
    }

    function addCandidat($email,$login,$mdp,$prenom,$nom,$tel,$adresse,$idProfilF,$fichierCV){
        global $connexion;
        $sql="INSERT INTO utilisateur(email,login,mdp,prenom,nom,tel,adresse,idProfilF,ficherCV)
        values(:email,:login,:mdp,:prenom,:nom,:tel,:adresse,:idProfilF,:fichier)";
        $state=$connexion->prepare($sql);
        $state->bindValue("email",$email,PDO::PARAM_STR);
        $state->bindValue("login",$login,PDO::PARAM_STR);
        $state->bindValue("mdp",$mdp,PDO::PARAM_STR);
        $state->bindValue("prenom",$prenom,PDO::PARAM_STR);
        $state->bindValue("nom",$nom,PDO::PARAM_STR);
        $state->bindValue("tel",$tel,PDO::PARAM_STR);
        $state->bindValue("adresse",$adresse,PDO::PARAM_STR);
        $state->bindValue("idProfilF",$idProfilF,PDO::PARAM_INT);
        $state->bindValue("fichier",$fichierCV,PDO::PARAM_STR);
        return $state->execute();
    }
?>