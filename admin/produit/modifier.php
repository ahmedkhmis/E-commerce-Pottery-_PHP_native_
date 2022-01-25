
<?php 
var_dump($_POST);
echo $_POST['oldimg']. "    ".empty($_FILES["img1"]["name"]);


//$idc =  $_GET['idc'];
include "../../templates/fonctions.php";

if(isset ($_POST)){

    $id=$_POST['id'];
    $nom=$_POST['nom'];
    $desc=$_POST['description'];
    $prix=$_POST['prix'];
    $categ=$_POST['categorie'];
    $qte=$_POST['quantite'];

    $date_modification=date("Y-m-d");
    //recuperation image
    $target_dir = "../../img/";
    var_dump($_FILES);
    $target_file = $target_dir . basename($_FILES["img1"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    //verifier si est une image 
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";

    }else{
            //upload l'image dans le dossier img/
        if (move_uploaded_file($_FILES["img1"]["tmp_name"], $target_file)) {
            //retourner le nom d'image 
        $img=$_FILES["img1"]["name"];
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

   
    if(empty($_FILES["img1"]["name"])){
        $img=$_POST['oldimg'];
    }

    try {
        $cn=connect_BD();
   
       $req="UPDATE `produit` SET nom='$nom',description='$desc',prix=$prix,img='$img',categorie=$categ,date_modification='$date_modification',qte=$qte WHERE id ='$id' ;";
        $res=$cn->query($req);
        if( $res){

        header("location:afficher.php?mod=ok");
    }
        
    }
    catch( PDOException $Exception ) {
        echo $Exception;
        //header("location:afficher.php?erreur=duplicate");
        
    }



}

?>