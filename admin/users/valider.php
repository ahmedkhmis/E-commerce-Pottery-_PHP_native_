<?php
include "../../templates/fonctions.php";
$idUser=$_GET['id'];


try {
    $cn=connect_BD();

   $req="UPDATE `user` SET etat=1 WHERE id =$idUser ;";
    $res=$cn->query($req);
    header("location:afficher.php?vd=ok");

    
}
catch( PDOException $Exception ) {
  
    
}

?>