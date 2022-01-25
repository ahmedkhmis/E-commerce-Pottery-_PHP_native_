<?php
session_start();
include "../templates/fonctions.php";
if(!isset($_SESSION['Adminnom'])){header("location:connexion.php");}
//$req="SELECT * from ;";
$categorie=count(getAll("categorie"));
$produit=count(getAll("produit"));
$user=count(getAll("user"));
$commande=count(getAll("panier"));
/* 
if (isset($_POST['btsearch'])){
  $produits=getProduitByNom($_POST['search']);
}else{
  $produits=getAll("produit");
}
 */



//var_dump($categorie);

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.1/assets/img/favicons/favicon.ico">

    <title>Admin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.1/examples/dashboard/">

    <!-- Bootstrap core CSS -->
    <link href="../css/bitnami.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/dashboard.css" rel="stylesheet">

  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><b><big>5</big></b>MIS_POTTERY</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="logout.php">Deconnexion</a>
        </li>
      </ul>
    </nav>


    <div class="container-fluid">
      <div class="row">

<nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">

            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link active " href="#">
                  <span data-feather="home"></span>
                  Home <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="categorie/afficher.php">
                  <span data-feather="file"></span>
                  Categoris
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="produit/afficher.php">
                  <span data-feather="shopping-cart"></span>
                  Produits
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="users/afficher.php">
                  <span data-feather="users"></span>
                  Users
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="commande/afficher.php">
                  <span data-feather="bar-chart-2"></span>
                  Commnades
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="profile.php">
                  <span data-feather="layers"></span>
                  Profile
                </a>
              </li>
            </ul>
          </div>
          
        </nav>
 
 
 
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
       <h1 class="h2">Dashboard</h1></div>
       <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
         <div  class=" mb-5" ><button  class="btn btn-outline-primary p-5 mr-5"style="width:30%; " >Produits ( <?php echo $produit ?> )</button>
         <button class="btn btn-outline-secondary p-5"style="width:30%; ">Categories ( <?php echo $categorie ?> )</button></div>
         <div><button  class="btn btn-outline-success p-5  mr-5"style="width:30%;">Users ( <?php echo $user ?> )</button>
         <button  class="btn btn-outline-danger p-5"style="width:30%;">Commandes ( <?php echo $commande ?> )</button></div>






   </main>
   
 </div>
</div>

<!-- Modal2 Ajout-->
<div class="modal fade" id="AjoutModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajout categorie </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form  action="ajouter.php" method="post">

      <div class="form-group"> 
    <input type="text" class="form-control"  name="nom"  placeholder="Nom de categorie..." required>
    </div>

    <div class="form-group"> 
        <textarea  class="form-control" name="description"  placeholder="description de categorie..."></textarea>
    </div>
 
    <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Enregistrer</button>
 
    </div>


    </form>
     
     

        
      </div>
    </div>
  </div>
</div>

 
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

  </body>
</html>