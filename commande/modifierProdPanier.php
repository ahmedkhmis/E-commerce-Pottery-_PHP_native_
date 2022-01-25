<?php

session_start();
$id=$_POST['id'];
$qte=$_POST['qte'];
$prix=$_POST['prix'];

$_SESSION['panier'][1]-=$_SESSION['panier'][3][$id][5];
$_SESSION['panier'][3][$id][5]=$qte*$prix;
$_SESSION['panier'][1]+=$_SESSION['panier'][3][$id][5];
$_SESSION['panier'][3][$id][4]=$qte;




header("location:../panier.php");





?>