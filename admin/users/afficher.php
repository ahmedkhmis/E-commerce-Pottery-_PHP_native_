<?php
include "../../templates/fonctions.php";
session_start();
if(!isset($_SESSION['Adminnom'])){header("location:../connexion.php");}
$users=getAll("user");

/* if (isset($_POST['btsearch'])){
  $produits=getProduitByNom($_POST['search']);
}else{
  $produits=getAll("produit");
} */


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
    <link href="../../css/bitnami.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../css/dashboard.css" rel="stylesheet">

  </head>

  <body>
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
      <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#"><b><big>5</big></b>MIS_POTTERY</a>
      <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
      <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
          <a class="nav-link" href="../logout.php">Deconnexion</a>
        </li>
      </ul>
    </nav>


    <div class="container-fluid">
      <div class="row">

<nav class="col-md-2 d-none d-md-block bg-light sidebar">
          <div class="sidebar-sticky">

            <ul class="nav flex-column">
              <li class="nav-item">
                <a class="nav-link " href="../home.php">
                  <span data-feather="home"></span>
                  Home <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../categorie/afficher.php">
                  <span data-feather="file"></span>
                  Categoris
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link " href="../produit/afficher.php">
                  <span data-feather="shopping-cart"></span>
                  Produits
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">
                  <span data-feather="users"></span>
                  Users
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../commande/afficher.php">
                  <span data-feather="bar-chart-2"></span>
                  Commnades
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link " href="../profile.php">
                  <span data-feather="layers"></span>
                  Profile
                </a>
              </li>
            </ul>
          </div>
          
        </nav>
 
 
 
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
       <h1 class="h2">Liste des visiteurs</h1>

     </div>

<div>
<?php 
    if(isset($_GET['vd']) && $_GET['vd']=="ok"){
        print ' <div class="alert alert-success"><a href="afficher.php" style="color:red;">x </a> Le visiteur a bien validé </div>';
    }
    if(isset($_GET['unvd']) && $_GET['unvd']=="ok"){
        print ' <div class="alert alert-danger"><a href="afficher.php" style="color:red;">x </a> Le visiteur a bien unvalidé </div>';
    }
 ?>

     <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom et Prénom</th>
      <th scope="col">E-mail</th>
      <th scope="col">Telephone</th>
      <th scope="col">Etat</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody> 
    <?php 
            foreach($users as $p){
            
           
              print '<tr><th scope="row">'.$p['id'].'</th>
              <td>'.$p['nom'].' '.$p['prenom'].'</td>
           
              <td>'.$p['email'].'</td>
              <td>'.$p['telphone'].'</td>
              <td>'.$p['etat'].'</td>
              <td>
              <a href="valider.php?id='.$p['id'].'" class="btn btn-outline-success" ">Valider</a>
              <a href="unvalide.php?id='.$p['id'].'" class="btn btn-outline-danger" ">Unvalider</a>';
             
            }
            
            ?>
  </tbody>
</table>

</div>

   </main>
   
 </div>
</div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../js/popper.min.js"></script>
    <script src="../../js/bootstrap.min.js"></script>

    <!-- Icons -->
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <script>
      feather.replace()
    </script>

    <!-- Graphs -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>

  </body>
</html>