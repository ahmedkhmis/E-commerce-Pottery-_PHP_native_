<?php
include "../../templates/fonctions.php";
session_start();
//$req="SELECT * from ;";
$categorie=getAll("categorie");
$produits=getAll("produit");
if(!isset($_SESSION['Adminnom'])){header("location:../connexion.php");}

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
                <a class="nav-link active" href="#">
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
       <h1 class="h2">Liste des produits</h1>

       <div >
       <a href="" class="mt-4 btn btn-outline-primary " data-toggle="modal" data-target="#AjoutModal">Ajouter</a>
     </div>
     </div>
     <div >
       <a href="" class="mb-4 btn btn-outline-warning btn-block " data-toggle="modal" data-target="#AjoutPromo">Ajouter Promo</a>
     </div>
<div>
<?php 
    if(isset($_GET['aj']) && $_GET['aj']=="ok"){
        print ' <div class="alert alert-success"><a href="afficher.php" style="color:red;">x </a> Produit a bien ajoutée </div>';
    }
    if(isset($_GET['del']) && $_GET['del']=="ok"){
        print ' <div class="alert alert-success"><a href="afficher.php" style="color:red;">x </a> Produit a bien supprimée </div>';
    }
    if(isset($_GET['mod']) && $_GET['mod']=="ok"){
        print ' <div class="alert alert-success"><a href="afficher.php" style="color:red;">x </a> Produit a bien modifiée </div>';
    }
    if(isset($_GET['erreur']) && $_GET['erreur']=="duplicate"){
        print ' <div class="alert alert-danger"><a href="afficher.php" style="color:red;">x </a> le nom de Produit dupliquée, Entrez un autre svp!! </div>';
    }
 ?>

     <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Discription</th>
      <th scope="col">Prix</th>
      <th scope="col">Quantité</th>
      <th scope="col">Id_Categorie</th>
      <th scope="col">Nom_Categorie</th>
      <th scope="col">promo</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody> 
    <?php 
            foreach($produits as $p){
              $cats=getElementById('categorie',$p['categorie']);
              $marque='';
            
              $prom=getElementById('promo',$p['promo']);

              if($prom['date_fin']>date("Y-m-d")){
                $cn=connect_BD();

                $req="UPDATE `produit` SET promo=0 WHERE id =".$p['id'].";";
                $res=$cn->query($req);
                $user=$res->fetch();
              }
              else{
                $pri=($p['prix']-(($prom['remise']*$p['prix'])/100));
                $cn=connect_BD();

                $req="UPDATE `produit` SET prix= $pri WHERE id =".$p['id'].";";
                $res=$cn->query($req);
                $user=$res->fetch();
              }
              if($p['promo']==0){
                $btn='<button  class="btn btn-danger "  ><i class="fa fa-trash-o"></i></button>	</form>';

              }else{
                $btn='<button  class="btn btn-success "  ><i class="fa fa-trash-o"></i></button>	</form>';

              }

              if(!produitOnStock($p['id'])){
                $marque='style="color:red";';
                
              }
           
              print '<tr '.$marque.'><th scope="row">'.$p['id'].'</th>
              <td>'.$p['nom'].'</td>
              <td>'.$p['description'].'</td>
              <td>'.$p['prix'].'</td>
              <td >'.$p['qte'].'</td>
              <td>'.$p['categorie'].'</td>
              <td>'.$cats['nom'].'</td>
              <td>'. $btn.'</td>
              
              
              <td>
              <a href="" class="btn btn-outline-success" data-toggle="modal" data-target="#editModel'.$p['id'].'">Modifier</a>
              <a  href="" class="btn btn-outline-danger " data-toggle="modal" data-target="#Modelsupp'.$p['id'].'" >Supprimer</a>
             </td> </tr>';

             print'<!-- Modal Supp -->
                <div class="modal fade" id="Modelsupp'.$p['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel'.$p['id'].'" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel'.$p['id'].'">Êtes-vous sûr de vouloir supprimer?</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-footer">
                    <a href="supprimer.php?idc='.$p['id'].'" class="btn btn-danger ">Oui</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Non</button>
                    </div>
                    </div>
                    </div>
                    </div>';
              

                    print '<!-- Modal Modifier -->
                    <div class="modal fade" id="editModel'.$p['id'].'" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                                  <div class="modal-dialog">
                                  <div class="modal-content">
                                      <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel3">Modifier Produit </h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                      </div>
                                      <div class="modal-body">
                                      <form  action="modifier.php" method="post" enctype="multipart/form-data" >
                  
                                      <div class="form-group"> 
                                      <input type="hidden" name="id" value='.$p['id'].'>
                                  <input type="text" class="form-control"  name="nom"  placeholder="Nom de categorie..." value='.$p['nom'].' required>
                                  </div>
                  
                                  <div class="form-group"> 
                                      <textarea  class="form-control" name="description"  placeholder="description de categorie ..." >'.$p['description'].' </textarea>
                                  </div>
                                  <div class="form-group"> 
                                  <div class="input-group"> 
                                  <input type="number" step="0.01" class="form-control"  name="prix"  placeholder="prix de produit..." aria-label="Dollar amount "  value='.$p['prix'].'>
                                  <div class="input-group-append">
                                  <span class="input-group-text">Dt</span>
                                  </div>
                                  </div>
                                  </div>
                                  <div class="form-group"> 
                                  <input type="number" class="form-control"  name="quantite"   placeholder="Quantité de stock ..." value='.$p['qte'].'>
                                  </div>
                                  <div class="form-group"> 
                                  <div class="custom-file">
                                  <input type="hidden" name="oldimg" value='.$p['img'].'>
                                  <input type="file" class="form-control"  name="img1" class="custom-file-input" id="inputGroupFile01"  value='.$p['img'].' >
                                  <label class="custom-file-label"  for="inputGroupFile01">'.$p['img'].'</label>
                                </div>
                                  
                                  </div>
                                  <div class="form-group"> 
                                  <select class="form-control" name="categorie" >
                                          
                                          <option selected value="'.$cats['id'].'"> '.$cats['nom'].'</option>';
                                          
                                         
                                          foreach($categorie as $c){
                                            if($c['nom']==$cats['nom']){continue;}
                                            print ' <option value="'.$c['id'].'">'.$c['nom'].'</option>';
                                          }
                                         
                                
                                          print '</select>
                  
                                  <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary">Modifier</button>
                  
                                  </div></form>                      
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
        <form  action="ajouter.php" method="post" enctype="multipart/form-data">

                  <div class="form-group"> 
                <input type="text" class="form-control"  name="nom"  placeholder="Nom de produit..." required>
                </div>

                <div class="form-group"> 
                    <textarea  class="form-control" name="description"  placeholder="Description de produit..."></textarea>
                </div>
                <div class="form-group"> 
                <div class="input-group"> 
                <input type="number" step="0.01" class="form-control"  name="prix"  placeholder="Prix de produit..." aria-label="Dollar amount ">
                <div class="input-group-append">
                <span class="input-group-text">Dt</span>
                </div>
                </div>
                </div>
                <div class="form-group"> 
                <input type="number" class="form-control"  name="quantite"  step="10" placeholder="Quantité de stock ...">
                </div>
                <div class="form-group"> 
                <input type="file" class="form-control"  name="img"  >
                </div>
                <div class="form-group"> 
                <select class="form-control" name="categorie" >
                        
                        <option selected>Categories...</option>
                        
                        <?php
                        foreach($categorie as $c){
                          print ' <option value="'.$c['id'].'">'.$c['nom'].'</option>';
                        }
                        ?> 
              
              </select>
              <input type="hidden" name="createur" value=<?php echo $_SESSION['Adminid']; ?>>
                      </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Enregistrer</button>
            
                </div>


          </form>
          
          

              
        </div>
    </div>
  </div>
</div>
 
 
<!-- Modal2 Ajout Promo-->
<div class="modal fade" id="AjoutPromo" tabindex="-1" aria-labelledby="exampleModalLabel5" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel5">Ajout Promo </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form  action="promo.php" method="post" enctype="multipart/form-data">
        

                  <div class="form-group"> 
                    
                <input type="text" class="form-control"  name="nom"  placeholder="Nom de promo..." >
                </div>

                <div class="form-group">
                   <div class="input-group"> 
                <input type="number" step="1" max="100" class="form-control"  name="promo"  placeholder=" promo..." >
                <div class="input-group-append">
                <span class="input-group-text">%</span>
                </div>
                </div>
                </div>
                <div class="form-group"> 
                
                <div class="input-group"> 
                <input type="date" class="form-control"  name="date_db"  >
                
                </div>
                </div>
                <div class="form-group"> 
                <input type="date" class="form-control"  name="date_fin"  >
                </div>
               
                <div class="dropdown form-group"> 
             
                
                        <?php
                        $i=0;
                        foreach($produits as $c){
                          print '  <div class=" form-group form-check">
                          <input class="form-check-input " type="checkbox" value="'.$c['id'].'" name="prod[]" id="flexCheckIndeterminate">
                          <label class="form-check-label" for="flexCheckIndeterminate">'.$c['id'].': '.$c['nom'].'</label></di>
                       ';
                        }
                        ?> 
              
                </div>
              
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name='ajPromo'>Ajouter</button>
            
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