<?php
session_start();
require 'database.php';
$para_RsInfo = "-1";
if (isset($_SESSION['matricule'])) {$para_RsInfo = $_SESSION['matricule'];}
$request =  $connection->prepare("SELECT etudiant.*,classe.nom_classe as classe,filiere.nom_filiere as filiere,annee_scolaire.annee as Annee_scolaire  FROM etudiant,classe,filiere,annee_scolaire WHERE etudiant.id=? AND etudiant.classe_id=classe.id and etudiant.filiere_id=filiere.id");
$succ=$request->execute(array($_SESSION['id']));
if($succ){
    $tab = $request->fetch(PDO::FETCH_ASSOC);
    //var_dump($tab);
}
?>
<?php
include("../fpdf/fpdf.php");
$pdf = new fpdf();

$pdf->AddPage('L');
$pdf->SetFont('Arial',"B",24);
$pdf->Text(10,30," ******************************  RECU D'INSCRIPTION  **************************\n\n\n\n\n \n\n");
$pdf->SetFont('Arial',"B",18);
$pdf->Text(10,50," MATRICULE :  $tab[matricule] \n");
$pdf->Text(10,58," NOM              :  $tab[nom]\n");
$pdf->Text(10,66," PRENOM       :  $tab[prenom]\n");
$pdf->Text(10,74," TELEPHONE :  $tab[tel]   \n");
$pdf->Text(10,82," EMAIL            :  $tab[email]  \n");
$pdf->Text(10,90," ANNEE SCOLAIRE       :  $tab[Annee_scolaire]  \n");
$pdf->Text(10,98," FILIERE         :  $tab[filiere]   \n");
$pdf->Text(10,106," CLASSE         :  $tab[classe]  \n");
$pdf->SetFont('Arial',"B",13);
$pdf->Text(10,120," CES INFORMATIONS SERONT EVALUEES PAR L'ADMINISTRATION \n");
$nom='doc-'.$_SESSION['matricule'];
$pdf->Output($nom,'I');
//header('localtion:../index.php');
;
?>
