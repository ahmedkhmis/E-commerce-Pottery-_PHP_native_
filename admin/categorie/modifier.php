<?php 

//$idc =  $_GET['idc'];
include "../../templates/fonctions.php";

if(isset ($_POST)){
    $id=$_POST['id'];
    $nom=$_POST['nom'];
    $desc=$_POST['description'];
    $date_modification=date("Y-m-d");
    try {
        $cn=connect_BD();
   
       $req="UPDATE `categorie` SET nom='$nom',description='$desc',date_modification='$date_modification' WHERE id ='$id' ;";
        $res=$cn->query($req);
        header("location:afficher.php?mod=ok");
    
        
    }
    catch( PDOException $Exception ) {
        header("location:afficher.php?erreur=duplicate");
        
    }



}

?>