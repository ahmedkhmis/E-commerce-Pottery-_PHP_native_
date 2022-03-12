<?php
include "../../templates/fonctions.php";
session_start();
if(!isset($_SESSION['Adminnom'])){header("location:../connexion.php");}



 if (isset($_POST['filter']) && !($_POST['f_etat']=="choisir") ){
  $paniers=getPanierByEtat($_POST['f_etat']);
}else{
  $paniers=getAll("panier");
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
      <!-- <div class="row"> -->

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
                <a class="nav-link " href="../users/afficher.php">
                  <span data-feather="users"></span>
                  Users
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">
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
       <h1 class="h2">Liste des commandes</h1>

     </div>

<div>
<?php 
    if(isset($_GET['vd']) && $_GET['vd']=="ok"){
        print ' <div class="alert alert-success"><a href="afficher.php" style="color:red;">x </a> L\'etat a changé</div>';
    }
   
 ?>
  <form  action=<?php echo $_SERVER['PHP_SELF'] ?> method="post">
 
                  <div class="form-group d-flex ">
                 

                  <select class="form-select" name="f_etat"style=" width:100%" >
                  <option selected value="choisir">--- Choisir l'etat ---</option>
                  <option  value="En cours">En cours</option>
                  <option  value="En Livraison">En Livraison</option>
                  <option value="Livraison terminéé">Livraison terminéé</option>
                 
                </select>
                <button type="submit" class="btn btn-primary ml-2" name="filter">Filtrer</button>
                  </div>



     <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Id Client</th>
      <th scope="col">Client</th>
      <th scope="col">Prix Totale</th>
      <th scope="col">Date</th>
      <th scope="col">Etat</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody> 
    <?php 
            foreach($paniers as $p){

            $user=getElementById('user',$p['visiteur']);
            $commandes=getAllCommandes();

           
              print '<tr><th scope="row">'.$p['id'].'</th>
              <td>'.$p['visiteur'].'</td>
             
              <td>'.$p['total'].' DT</td>
              <td>'.$p['date_creation'].'</td>
              <td>'.$p['etat'].'</td>
              <td>
              <a href="" class="btn btn-outline-info" data-toggle="modal" data-target="#editModel'.$p['id'].'">Afficher</a>
              <a href="unvalide.php?id='.$p['id'].'" class="btn btn-outline-success" data-toggle="modal" data-target="#traiter'.$p['id'].'">Traiter</a>
              
             
              <div class="modal fade" id="editModel'.$p['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel3">Afficher Commandes </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body">
                  <table class="table">
                  <thead>
                    <tr>
                      <th scope="col">Nom produit</th>
                      <th scope="col">Image</th>
                      <th scope="col">Quantité</th>
                      <th scope="col">Totale</th>
                      <th scope="col">Panier</th>

                    </tr>
                  </thead>
                  <tbody>
                  ';
                  foreach($commandes as $c){
                    if($p['id']==$c['panier']){
              print '
                    <tr>
                      <th scope="row">'.$c['nom'].'</th>
                      <td><img src="../../img/'.$c['img'].'" width="100" /></td>
                      <td>'.$c['qte'].'</td>
                      <td>'.$c['total'].'</td>
                      <td>'.$c['panier'].'</td>
                    </tr>';}}

                   print'</tbody>
                </table>

              <div class="modal-footer">
                  <button type="button" class="btn btn-primary" data-dismiss="modal" aria-label="Close" >OK</button>

              </div>


              </form>
              
              

                  
                  </div>
              </div>
              </div>
              </div>';

              print ' <!-- Modal Modifier -->
              <div class="modal fade" id="traiter'.$p['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
              <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel3">Traiter Panier </h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
                  </div>
                  <div class="modal-body mt-2 mb-2">
                  <form  action="traiter.php" method="post">
                  <input type="hidden" value='.$p['id'].' name="idpan"/>
                  <div class="form-group">

                  <select class="form-select form-select-lg mb-3" name="etat" style="width:100%" >
                  <option selected value="En cours">En cours</option>
                  <option  value="En Livraison">En Livraison</option>
                  <option value="Livraison terminéé">Livraison terminéé</option>
                 
                </select>
                  </div>


              <div class="modal-footer">
                  <button type="submit" class="btn btn-primary">Sauvgarder</button>

              </div>


              </form>
              
              

                  
                  </div>
              </div>
              </div>
              </div>';
             
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