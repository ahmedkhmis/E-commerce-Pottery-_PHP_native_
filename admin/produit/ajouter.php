<?php

session_start();
include "../../templates/fonctions.php";

if(isset ($_POST)){
//recuperation les données
    $nom=$_POST['nom'];
    $desc=$_POST['description'];
    $prix=$_POST['prix'];
    $qte=$_POST['quantite'];
    $categ=$_POST['categorie'];
    $createur=$_SESSION['Adminid'];
    $date_createur=date("Y-m-d");

    //recuperation image
        $target_dir = "../../img/";
        //var_dump($_FILES);
        $target_file = $target_dir . basename($_FILES["img"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        //verifier si est une image 
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    
        }else{
                //upload l'image dans le dossier img/
            if (move_uploaded_file($_FILES["img"]["tmp_name"], $target_file)) {
                //retourner le nom d'image 
            $img=$_FILES["img"]["name"];
            } else {
                echo "Sorry, there was an error uploading your file.";
            }
        }

    // enregistrer les données dans le BD

    try {
        $cn=connect_BD();
        $req="INSERT INTO produit (nom,description,prix,img,categorie,createur,date_creation,qte) VALUES ('$nom','$desc',$prix,'$img',$categ,$createur,'$date_createur',$qte);";
        $res=$cn->query($req);
        header("location:afficher.php?aj=ok");
    
    }
    catch( PDOException $Exception ) {
        echo $Exception;
       
      //header("location:afficher.php?erreur=duplicate");
    }



}
?>