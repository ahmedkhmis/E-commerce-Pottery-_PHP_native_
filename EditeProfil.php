<?php
session_start();
include "templates/headerAccount.php";

if(isset($_SESSION["email"])){
  //echo $_SESSION["email"];

   $nom=$_SESSION['nom'];
   $prenom =$_SESSION['prenom'];
   $email= $_SESSION['email'];
   $telephone=$_SESSION['tel'];

//var_dump(empty($_POST['nom']));

if(!empty($_POST)){
 

  if(ChangerUser($_POST,$email)){
    $nom=$_POST['nom'];
    $_SESSION['nom']=$nom;
    //echo $_SESSION['nom'];
   


    $email=$_POST['mail'];
    $_SESSION['email']= $email;
   // var_dump($_SESSION['email']) ;
 

    $prenom=$_POST['prenom'];
     $_SESSION['prenom']=$prenom;

    $telephone=$_POST['tel'];
     $_SESSION['tel']=$telephone;

     header("Refresh: 0"); //pour refrech la page 
    
    }

    
  } 
}



?>
<style>
    .footer {
  position: absolute;
  bottom: 1%;
  width: 100%;
 
  
    }

</style>
  <div class="container bootstrap snippets bootdey">
    <h1 class="text-primary">Edite Profil</h1>
      <hr>
	<div class="row">
      <!-- left column -->
      <div class="col-md-3">
        <div class="text-center">
        <h3> <?php echo $nom." ".$prenom;?> </h3>
          <h6><?php echo $_SESSION['email'];?></h6>
          
          
        </div>
      </div>
      
      <!-- edit form column -->
      <div class="col-md-9 personal-info">
        <div class="alert alert-info alert-dismissable">
      
          <i class="fa fa-coffee"></i>
          Veuillez vérifier <strong>votre adresse e-mail et votre numéro de téléphone</strong> avant d'enregistrer des données.
        </div>
        <h3>Informations personnelles</h3>
        
        <form class="form-horizontal" role="form" action="EditeProfil.php" method="POST">
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="mail" value=<?php echo $email;?> required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Nom:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="nom" value=<?php echo $nom;?>>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Prénom:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="prenom" value=<?php echo $prenom;?>>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Telephone:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="tel" value=<?php echo $telephone;?> required>
            </div>
          </div>
          <br>
          <button type="submit" class="btn btn-primary" name="inscrit">Enregistrer</button>
        </form>
      </div>
  </div>
</div>
<hr>

<?php

include "templates/footer.php";


?>
