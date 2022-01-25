<?php 

include '../../templates/fonctions.php';
session_start();
if(isset($_POST['ajPromo'])){
  $nom=$_POST['nom'];
  $promo=$_POST['promo'];
  $date_debut=$_POST['date_db'];
  $date_fin=$_POST['date_fin'];
  $produits=$_POST['prod'];
  $id=0;
  //creation de promo
  try {
    echo 'fffff;';
    $cn=connect_BD();
    $req="INSERT INTO promo (nom,date_debut, date_fin,remise) VALUES ('".$nom."','".$date_debut."','".$date_fin."',".$promo.");";
    $res=$cn->query($req);
    $id=$cn->lastInsertId();
  

}catch( PDOException $Exception ) {
  echo "erreeuuuur".$Exception;

}

//changer les promo de produit 

try {
  
  foreach($produits as $p){
    echo 'ssssss';
 $req="UPDATE `produit` SET promo=$id WHERE id =".$p.";";
      $res=$cn->query($req);
      $user=$res->fetch(); }
  

}
catch( PDOException $Exception ) {
  echo "erreeuuuur".$Exception;
}
header("location:afficher.php");
}


?>