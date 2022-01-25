<?php


$idc = $_GET['idc'];


include "../../templates/fonctions.php";

$p=getElementById('produit',$idc);
$nomImg=$p['img'];

$conn=connect_BD();

$requette = "DELETE FROM produit WHERE id='$idc'";

$result = $conn->query($requette);

if($result && unlink("../../img/$nomImg")){
    

    header('location:afficher.php?del=ok');
}

?>
