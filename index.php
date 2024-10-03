<?php
session_start();
ob_start();
include_once("shared/header.php");
include_once("shared/topbar.php");
include_once("shared/sidebar.php");
require_once("models/offreModel.php");
require_once("models/profilModelProfil.php");
require_once("models/employeModel.php");
require_once("models/candidatModel.php");
require('fpdf/fpdf.php');

$listeOffre=getOffres();
$listeOffresP=getOffrePub();
$listeProfil=getProfil();
$offeDetail=isset($_GET['idOffre']) ? findOffreById($_GET['idOffre']) : null;
$listeEmploye=getEmploye();
$listeCandidature=getCandidat();
$listeOffrePostule=getOffrePostulees();
$nvCandidat=getnvCandidat();
 //$_SESSION=null;
if (!(empty($_SESSION))) {
    $verifierCandidature = ($offeDetail!=null) ?verifierCandidature($offeDetail['idOffre'],
    $_SESSION['user']['idUser']) : 0 ;
    $listeCandidatureP = getCandidatureByIdUser($_SESSION['user']['idUser']);
    // if (isset($_GET['id'])) {
    //     $candidaturePers = Candidat($_GET['id']);
    //     $candidatureEnAttentes = getCandidatureEnAttennte($_GET['id']);
    // }
    // if (isset($_GET['action'])) {
        
    // }
    
}
if (isset($_POST['CreerCandidat']) and empty($_SESSION)){
  extract($_POST);
  if (isset($_FILES['fichier']) and $_FILES['fichier']['error']==0) {
    $idF=getnvCandidatID()[0]+1;
   $_FILES['fichier']['name']="CV_".$idF.".pdf";
   $direction='C:\xampp\htdocs\glese\public\documents/';
   $tmp=$_FILES['fichier']['tmp_name'];
   move_uploaded_file( $tmp,$direction.$_FILES['fichier']['name']);
   $res=addCandidat($email,$login,$mdp,$prenom,$nom,$tel,$adresse,$idProfil,$_FILES['fichier']['name']);
   if ($res==1) {
        header("location: http://localhost/glese/?page=Connection");
   }
}
}
if (isset($_GET['idOffre'])) {
    extract($_GET);
    $listeCandidatPos=getCandidatByOffre($idOffre);
}
if (isset($_POST['Connecter'])) {
    extract($_POST);
    $user=findUserByLogin($login,$mdp);
    if ($user) {
        $_SESSION['user']=$user;
        header("location:http://localhost/glese/");
    }else {
     $erreurConnexion="Login ou Mot de passe incorrecte";
    }
}
if (isset($_GET['deconnexion'])) {
    $_SESSION=[];
    session_destroy();
    header("location:http://localhost/glese/?page=Connection");
}
$page=isset($_GET['page']) ? $_GET['page'] : "Acceuil";
if($page !=""){
    if(file_exists("pages/$page.php")){
    include_once("pages/$page.php");
    }else {
        include_once("pages/error.php");
    }
}
if (isset($_POST['ajoutOffre'])){
    extract($_POST);
    $etat=isset($publier) ? 1 : 0;
    $res=addOffre($poste,$description,$competence,$type,$etat);
    if($res==1){
    header("location:http://localhost/glese/?page=gestionOffre");
    }else{
        echo"Erreur lors de l'insertion ";
    }
}
if (isset($_POST['ModOffre'])) {
    extract($_POST);
    $etat=isset($publier) ? 1 : 0;
    $res=updateOffre($id,$poste,$description,$competence,$type,$publier);
    if($res==1) {
        header("location:http://localhost/glese/?page=gestionOffre");
    }else {
        echo"Erreur";
    }
}
if (isset($_POST['ajoutProfil'])){
    extract($_POST);
    $res=addProfil($profil);
    if($res==1){
    header("location:http://localhost/glese/?page=gestionProfil");
    }else{
        echo"Erreur lors de l'insertion ";
    }
}

if (isset($_GET['idOffre'],$_GET['etat'])) {
    $id=$_GET['idOffre'];
    $etat=$_GET['etat'];
    if (updateEtat($etat,$id)==1) {
        header("location:http://localhost/glese/?page=gestionOffre");
    }else{
        $erreur="Erreur lors de la publication";
    }
}
//Employe
if (isset($_POST['ajoutEmployes'])){
    extract($_POST);
    $res=addEmploye($email,$login,$mdp,$prenom,$nom,$tel,$adresse,$idProfil);
    if($res==1){
    header("location:http://localhost/glese/?page=gestionEmployes");
    }else{
        echo"Erreur lors de l'insertion ";
    }
}

if (isset($_POST['postuler'])) {
    extract($_POST);
   $res=addCandidature($idOffre,$_SESSION['user']['idUser']);
   if($res==1){
    header("location:http://localhost/glese/?page=detailOffre&idOffre=$idOffre");
   }
}

if (isset($_GET['idOffre'],$_GET['idCandidature'])) {
        extract($_GET);
        if (($_GET['action'])=="accepter") {
            $id=$_GET['idOffre'];
            $candi=$_GET['idCandidature'];
            $etatC=1;
            $email=$_GET['email'];
            // $email=$_GET['email'];
        $res=updateCandidature($id,$etatC,$candi);
        if ($res==1) {
        header("location: http://localhost/glese/?page=infoCandidatPos&idOffre=$id");
        $to="$email";
        $subject="Entreprise GLESE";
        $poste=findOffreById($id)['poste'];
        $message = "Bonjour! Votre demande sur le poste de $poste a ete approuve. Rendez-vous au plus vite dans nos locaux.";
        $headers = "Content-type : text/plain; charset=utf-8\r\n";
        $headers .= "From: moustaf478@gmail.com\r\n";
        if (mail($to,$subject,$message,$headers)){
            echo"Mail envoyee!!!";
        }else{
            echo"Erreur !!!";
        }
        }else {
         echo"Erreur !!!!!!!!!!!!";
       }
    }else if(($_GET['action'])=="refuser") {
        $id=$_GET['idOffre'];
        $candi=$_GET['idCandidature'];
        $etatC=0;
        $res=updateCandidature($id,$etatC,$candi);
        if ($res==1) {
        header("location: http://localhost/glese/?page=infoCandidatPos&idOffre=$id");
        $to="$email";
        $subject="Entreprise GLESE";
        $message = "Bonjour! Votre demande sur le poste de $poste n'a ete approuve desole.";
        $headers = "Content-type : text/plain; charset=utf-8\r\n";
        $headers .= "From: moustaf478@gmail.com\r\n";
        if (mail($to,$subject,$message,$headers)){
            echo"Mail envoyee!!!";
        }else{
            echo"Erreur !!!";
        }
        }else {
            echo"Erreur !!!!!!!!!!!!";
        }
    }
}
// if (isset($_GET['idOffre'])) {
//     extract($_GET);
//         // $id=$_GET['idOffre'];
//         // $idCandidat=getCandidatByOffre($id)['etatC'];
//         // $req="SELECT * from candidature where etatC=$idCandidat";
//         class PDF extends FPDF{}
//         $pdf = new PDF('P','mm','A4');
//         $pdf->AddPage();
//         $pdf->SetFont('Arial','B',14);
//         $pdf->Cell(130,5,'#',1,0);
//         $pdf->Cell(130,5,'Prenom',1,1);
//         $pdf->Cell(130,5,'Nom',1,0);
//         $pdf->Cell(130,5,'Telephone',1,1);
//         $pdf->Cell(130,5,'Email',1,0);
    
//     $pdf->Output();
// }     


// if (isset($_POST['poste'])) {
//     $poste = $_POST['poste'];
//     $description = $_POST['description'];
//     $typeOffre = $_POST['typeOffre'];
//     $id = $_POST['id'];
//     $req = updateOffre($poste,$description,$competence,$typeOffre,$id);
//     if ($req==1) {
//        echo 'data updated';
//     }else {
//         echo"Erreur!!!!!!!!!!!!!";
//     }
// }


include_once("shared/footer.php");
?>