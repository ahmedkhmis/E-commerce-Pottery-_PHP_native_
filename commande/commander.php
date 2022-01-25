<?php 
 include '../templates/fonctions.php';

session_start();
if(isset($_SESSION["email"])){


    if(isset ($_POST)){

        $produit_id = $_POST['idprod'];
        $qte = $_POST['qte'];
        $date_createur=date("Y-m-d");
        $visiteur = $_SESSION['id'];
        $prod = getProduitById($produit_id);
        
        $produit=$prod['nom'];
        $desc=$prod['description'];
        $PU=$prod['prix'];
        $total = $PU * $qte;
        $img=$prod['img'];
      
        if(!isset( $_SESSION['panier'])){
        $_SESSION['panier']=array($visiteur,0,$date_createur,array());
    }
    $_SESSION['panier'][1]+=$total;
        $_SESSION['panier'][3][]=array( $img,$produit,$desc, $PU,$qte,$total,$date_createur,$date_createur);
        header("location:../produit.php?id=$produit_id&comd=1");
        //var_dump( $_SESSION['panier']);

    } 

}else { header("location:../connexion.php");
    //echo "commande";
exit(); 
}
