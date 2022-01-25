<?php 
include '../templates/fonctions.php';
session_start();
if(isset($_SESSION['Adminid'])){

 $id= $_SESSION['Adminid'];
  $nom=$_SESSION['Adminnom'];
 $email= $_SESSION['Adminemail'];


if(isset($_POST['inscrit'])){
  ChangerAdmin($_POST,$id);
  $nom=$_POST['nom'];
  $_SESSION['Adminnom']=$nom;
  //echo $_SESSION['nom'];
 


  $email=$_POST['email'];
  $_SESSION['Adminemail']= $email;
 // var_dump($_SESSION['email']) ;




 
 $_SESSION['Adminmdp']=sha1($_POST['mdp']);

  // header("Refresh: 0"); //pour refrech la page 
  
  }  

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
                <a class="nav-link " href="home.php">
                  <span data-feather="home"></span>
                  Home <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="categorie/afficher.php">
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
                  Commandes
                </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link active" href="#">
                  <span data-feather="layers"></span>
                  Profile
                </a>
              </li>
            </ul>
          </div>
          
        </nav>

<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

     <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Profil</h1>

           <div >
           
          <?php
          

              echo "<span data-feather=\"user\"></span> ".strtoupper($_SESSION['Adminnom']);
          ?>
           
           
           </div>
          </div>
          <div class="text-center " ><img src="../img/bg.png" class="img-circle " id="img" style="max-width:10%; height: 10%;"  alt="#"></div>  
          <div class="alert alert-info alert-dismissable">
      
      <i class="fa fa-coffee"></i>
      Veuillez vérifier <strong>votre adresse e-mail et votre numéro de téléphone</strong> avant d'enregistrer des données.
    </div>
          <div class="col-md-9 personal-info ">
        
        <h3>Informations personnelles</h3>
        
        <form class="form-horizontal" role="form" action=<?php echo $_SERVER['PHP_SELF'] ?>  method="POST">
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="email" value=<?php echo $email;?>>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Nom:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="nom" value=<?php echo $nom;?>>
            </div>
          </div>
         
          <div class="form-group">
            <label class="col-lg-3 control-label">Nouveau mot de passe:</label>
            <div class="col-lg-8">
              <input class="form-control" type="password" name="mdp" value=<?php echo $_SESSION['Adminmdp']?> >
            </div>
          </div>
          <br>
          <button type="submit" class="btn btn-primary" name="inscrit">Enregistrer</button>
        </form>
      </div>

        </main>
        
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
<?php
}else{
  //header("location:connexion.php");

}
?>