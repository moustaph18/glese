
<?php

    require_once("bd.php");
    function getEmploye(){
    global $connexion;
    $sql="SELECT * FROM utilisateur u, profil p WHERE p.idProfil=u.idProfilF";
    return $connexion->query($sql)->fetchAll();
    }
    function addEmploye($email,$login,$mdp,$prenom,$nom,$tel,$adresse,$idProfilF){
        global $connexion;
        $sql="INSERT INTO utilisateur(email,login,mdp,prenom,nom,tel,adresse,idProfilF)
        values(:email,:login,:mdp,:prenom,:nom,:tel,:adresse,:idProfilF)";
        $state=$connexion->prepare($sql);
        $state->bindValue("email",$email,PDO::PARAM_STR);
        $state->bindValue("login",$login,PDO::PARAM_STR);
        $state->bindValue("mdp",$mdp,PDO::PARAM_STR);
        $state->bindValue("prenom",$prenom,PDO::PARAM_STR);
        $state->bindValue("nom",$nom,PDO::PARAM_STR);
        $state->bindValue("tel",$tel,PDO::PARAM_STR);
        $state->bindValue("adresse",$adresse,PDO::PARAM_STR);
        $state->bindValue("idProfilF",$idProfilF,PDO::PARAM_INT);
        return $state->execute();
    }
    function findUserByLogin($login,$mdp){
        global $connexion;
        $sql="SELECT * from utilisateur,profil where login='$login' and mdp='$mdp' and etatUser=1 and idProfilF=idProfil";
        $state=$connexion->prepare($sql);
        $state->execute();
        return $state->fetch();
    }



?>

