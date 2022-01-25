<?php
include '../templates/fonctions.php';
session_start();

if(isset($_SESSION['panier']) && count($_SESSION['panier'][3])>0){
$visiteur = $_SESSION['id'];
//$date_createur=date("Y-m-d");

$total = $_SESSION['panier'][1];

$pan = compact("visiteur", "total");
$panier=addPanier($pan);


$commandes=$_SESSION['panier'][3];
foreach ($commandes as $i => $cmd) {
    $qte=$cmd[4];
    $total=$cmd[5];
    $produit_id=$cmd[1];
    $comd=compact("produit_id","qte", "panier", "total");
    addCommande($comd);



  }
  $_SESSION['panier']=null;
  header("location:../index.php");
}else{
    

    header("location:../panier.php?vide=1");

}
      
?>