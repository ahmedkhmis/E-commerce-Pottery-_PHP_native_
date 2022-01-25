<?php

//echo "id de categorie ".$_GET['id-cat'];

$idc = $_GET['idc'];


include "../../templates/fonctions.php";
$conn=connect_BD();

$requette = "DELETE FROM categorie WHERE id='$idc'";

$result = $conn->query($requette);

if($result){
    header('location:afficher.php?del=ok');
}

?>
