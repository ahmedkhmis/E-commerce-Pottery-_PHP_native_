<?php
include "../../templates/fonctions.php";
$idUser=$_GET['id'];


try {
    $cn=connect_BD();

   $req="UPDATE `user` SET etat=0 WHERE id =$idUser ;";
    $res=$cn->query($req);
    header("location:afficher.php?unvd=ok");

    
}
catch( PDOException $Exception ) {
  
    
}

?>