<?php

session_start();
include "../../templates/fonctions.php";
if(!isset($_SESSION['Adminnom'])){header("location:../connexion.php");}
if(isset ($_POST)){

    $nom=$_POST['nom'];
    $desc=$_POST['description'];
    $createur=$_SESSION['Adminid'];
    $date_createur=date("Y-m-d");
    try {
        $cn=connect_BD();
        $req="INSERT INTO categorie (nom,description,createur,date_creation) VALUES ('$nom','$desc',$createur,'$date_createur');";
        $res=$cn->query($req);
        header("location:afficher.php?aj=ok");
    
    }
    catch( PDOException $Exception ) {
        header("location:afficher.php?erreur=duplicate");
    }



}
?>