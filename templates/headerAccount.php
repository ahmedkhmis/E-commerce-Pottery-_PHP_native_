<?php

include "templates/fonctions.php";

//$req="SELECT * from ;";
$categorie=getAll("categorie");

if (isset($_POST['btsearch'])){
  $produits=getProduitByNom($_POST['search']);
}else{
  $produits=getAll("produit");
}
if(isset($_SESSION['panier'])){
$nbr=count($_SESSION['panier'][3]);
}else{$nbr=0;}
//var_dump($categorie);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khmis_Pottery</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.3.3/sweetalert2.css" integrity="sha512-fSWkjL6trYj6KvdwIga30e8V4h9dgeLxTF2q2waiwwafEXD+GXo5LmPw7jmrSDqRun9gW5KBR+DjvWD+5TVr8A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
      html, body {
  min-height: 100%
}

body {
  padding-bottom: 88px;
}
.footer {
  position:absolute ;
  height: 10%;
  padding-top: 10px;
  padding-bottom: 0px;
  width: 100%;
  text-align: center;
}
</style>
</head>
<body>
  
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">

  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><b><big>5</big></b>MIS_POTTERY</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link " aria-current="page" href="index.php">Accueil</a>
      </li>
       
        <li class="nav-item dropdown">
          <button type="button" class="btn nav-link dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
            Categories
          </button>
            
          <ul class="dropdown-menu " aria-labelledby="navbarDropdown">

            <!-- afficher des categorie de base de données dans les items -->
            <?php
            foreach($categorie as $categ){
              print ' <li><a class="dropdown-item " href="#">'.$categ['nom'].'</a></li>';
            }
            ?>
          </ul>
         
                            
         
      </ul>
   

    
    <div class="navbar-nav me-2 mb-2 mb-lg-0">
      <li class="nav-item dropdown">
          <button type="button" class="btn nav-link dropdown-toggle " data-bs-toggle="dropdown" aria-expanded="false">
         

          <?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?> 
          </button>
   
          <ul class="dropdown-menu " aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item " href="#"><?php echo $_SESSION['email']; ?></a> </li>
          <li><a class="dropdown-item " href="EditeProfil.php">Editer </a></li>
          <li><hr class="dropdown-divider"></li>
          <li><a class="dropdown-item " href="inc/logout.php">Se deconnecter</a></li>
          </ul></li>  
        </div>
      <div class="mh-100 navbar-nav me-5 mb-2 mb-lg-0" >
        <a href="panier.php" >
          <img src="img/panier.png" style="width: 30px; height: 30px;"alt=""></a> <p class="text-warning"><small>( <?php echo $nbr;?> )</small></p> 
      
          </div>


      <form class="d-flex" action="index.php" method="POST" >
      
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search" >
        <button class="btn btn-light " type="submit" name="btsearch">Search</button>
      </form>
    </div>
  </div>
  

</nav>
