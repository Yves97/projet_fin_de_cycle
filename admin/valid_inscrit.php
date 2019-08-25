<?php
session_start();
require '../php/database.php';
require '../php/functions.php';

$_POST=checkArray($_POST);
extract($_POST,EXTR_OVERWRITE);

$query=$connection->prepare("UPDATE etudiant SET etat='inscrit' WHERE matricule=?");
$check=$query->execute(array($valider));

if($check!=true){
  $_SESSION['success']=false;
}
header('Location:inscrit.php');