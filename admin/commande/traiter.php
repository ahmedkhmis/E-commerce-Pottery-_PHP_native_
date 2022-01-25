<?php 
include '../../templates/fonctions.php';
if(isset($_POST)){

$etat=$_POST['etat'];
$idpan=$_POST['idpan'];

    
try {
    $cn=connect_BD();

   $req="UPDATE `panier` SET etat='$etat' WHERE id =$idpan ;";
    $res=$cn->query($req);
    header("location:afficher.php?vd=ok");

    
}
catch( PDOException $Exception ) {
  echo  $Exception;
    
}
}





?>