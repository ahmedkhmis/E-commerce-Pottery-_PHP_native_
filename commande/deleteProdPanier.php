<?php
session_start();


$indx=$_GET['index'];

$_SESSION['panier'][1]-=$_SESSION['panier'][3][$indx][5];
unset($_SESSION['panier'][3][$indx]);


header("location:../panier.php");






?>