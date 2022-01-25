<?php
session_start();
include "../../templates/fonctions.php";
if(!isset($_SESSION['Adminnom'])){header("location:../connexion.php");}
//$req="SELECT * from ;";
$categorie=getAll("categorie");

if (isset($_POST['btsearch'])){
  $produits=getProduitByNom($_POST['search']);
}else{
  $produits=getAll("produit");
}


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
                <a class="nav-link active" href="#">
                  <span data-feather="file"></span>
                  Categoris
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../produit/afficher.php">
                  <span data-feather="shopping-cart"></span>
                  Produits
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="../users/afficher.php">
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
       <h1 class="h2">Liste des categories</h1>

       <div >
       <a href="" class="mt-4 btn btn-outline-primary " data-toggle="modal" data-target="#AjoutModal">Ajouter</a>
     </div>
     </div>

<div>
<?php 
    if(isset($_GET['aj']) && $_GET['aj']=="ok"){
        print ' <div class="alert alert-success"><a href="afficher.php" style="color:red;">x </a> Categorie a bien ajoutée </div>';
    }
    if(isset($_GET['del']) && $_GET['del']=="ok"){
        print ' <div class="alert alert-danger"><a href="afficher.php" style="color:red;">x </a> Categorie a bien supprimée </div>';
    }
    if(isset($_GET['mod']) && $_GET['mod']=="ok"){
        print ' <div class="alert alert-warning"><a href="afficher.php" style="color:red;">x </a> Categorie a bien modifiée </div>';
    }
    if(isset($_GET['erreur']) && $_GET['erreur']=="duplicate"){
        print ' <div class="alert alert-danger"><a href="afficher.php" style="color:red;">x </a> le nom de categorie dupliquée, Entrez un autre svp!! </div>';
    }
 ?>

     <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Discription</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php
            foreach($categorie as $categorie){
           
              print '<tr><th scope="row">'.$categorie['id'].'</th>
              <td>'.$categorie['nom'].'</td>
              <td>'.$categorie['description'].'</td>
              <td>
              <a href="" class="btn btn-outline-success" data-toggle="modal" data-target="#editModel'.$categorie['id'].'">Modifier</a>
              <a  href="" class="btn btn-outline-danger " data-toggle="modal" data-target="#Modelsupp'.$categorie['id'].'" >Supprimer</a>
             </td> </tr>
             <!-- Modal Supp -->
                <div class="modal fade" id="Modelsupp'.$categorie['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel'.$categorie['id'].'" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel'.$categorie['id'].'">Êtes-vous sûr de vouloir supprimer?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                    <a href="supprimer.php?idc='.$categorie['id'].'" class="btn btn-danger ">Oui</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                    </div>
                    </div>
                
                    </div>
                    </div>
                    <!-- Modal Modifier -->
                <div class="modal fade" id="editModel'.$categorie['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Modifier categorie </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <form  action="modifier.php" method="post">

                    <div class="form-group"> 
                    <input type="hidden" name="id" value='.$categorie['id'].'>
                <input type="text" class="form-control"  name="nom"  placeholder="Nom de categorie..." value='.$categorie['nom'].' required>
                </div>

                <div class="form-group"> 
                    <textarea  class="form-control" name="description"  placeholder="description de categorie ..." >'.$categorie['description'].' </textarea>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Modifier</button>

                </div>


                </form>
                
                

                    
                    </div>
                </div>
                </div>
                </div>

                ';
            }
            
            ?>
  </tbody>
</table>

</div>

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