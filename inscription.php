<?php

include "templates/fonctions.php";
session_start();
if(isset($_SESSION["email"])){
  header("location:myaccount.php");
  exit(); 
}


if(!empty($_POST)){

  $_POST["mdp"]=sha1($_POST["mdp"]);
  //echo "apres".$_POST["mdp"];
  $_POST["cmdp"]=sha1($_POST["cmdp"]);

  $mail=$_POST['mail'];
  $psw=sha1($_POST['mdp']) ;
  $nom=$_POST['nom'];
  $prenom=$_POST['prenom'];
  $tel=$_POST['tel'];

  if(sha1($_POST["cmdp"])==$psw){
  
        if(AddUser($_POST)){
      
             /*  
                $arr=compact("mail","psw");

                $val=implode("mdpis", $arr);//ecrire l'email puis le password avec un separateur "mdpis"
                setcookie("account", $val, time()+ (86400 * 30),null,null,false,true); */

            session_start();
            $ $_SESSION['id']=userExiste($mail)['id'];
            $_SESSION['email']=$mail;
            $_SESSION['nom']=$nom;
            $_SESSION['prenom']=$prenom;
            $_SESSION['mdp']=$psw;
            $_SESSION['tel']=$tel;
            $_SESSION['alert']=1;

            header("location:myaccount.php");
            exit();

        } 
        else {
       echo "<div class=\"alert alert-danger\" role=\"alert\"><h6>L'email ou le numéro telephone déjà utilisé</h6></div> ";
        }

    
  
}

}

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
        padding-top: 10px;
        padding-bottom: 0px;
        width: 100%;
        height: 10%;
        text-align: center;
      }
    </style>
</head>
<body>
<div class="text-center"><img src="img/bg.png" class="img-circle " style="max-width:10%; height: 10%;"  alt="index.php"></div>
<legend><h1 class="text-center">Inscription</h1></legend>
<div class="col-12 p-5" >
<div class="alert alert-info alert-dismissable">
      
      <i class="fa fa-coffee"></i>
      Veuillez vérifier <strong>votre adresse e-mail et votre numéro de téléphone</strong> avant d'enregistrer les données.
    </div>
  <fieldset>
     <form action="inscription.php" method="POST" >

      <div class="mb-3">
        <label for="mail" class="form-label">Email </label>
        <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp"required>
        <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</div>
      </div>

      <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom"  name="nom" required>
      </div>

      <div class="mb-3">
        <label for="prenom" class="form-label">Prénom</label>
        <input type="text" class="form-control" id="prenom" name="prenom" required>
      </div>

      <div class="mb-3">
        <label for="telephone" class="form-label">Telephone</label>
        <input type="tel" class="form-control" id="telephone"placeholder="(+216) 22-345-678" aria-describedby="phoneHelp" name="tel"  required>
        <div id="phoneHelp" class="form-text">Format: (+216) 99-999-999</div>
      </div>

      <div class="mb-3">
        <label for="mdp" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="mdp" name="mdp" required >
      </div>
      <div class="mb-3">
        <label for="mdp" class="form-label">Confirmé votre mot de passe</label>
        <input type="password" class="form-control" id="cmdp" name="cmdp" required >
      </div>
      
      <button type="submit" class="btn btn-primary btn-lg" name="inscrit">Inscrit</button>
      <a href="index.php" type="button" class="btn btn-secondary btn-lg" >Annuler</a>
      <a href="connexion.php" class="d-grid gap-2 d-md-flex justify-content-md-end" >J'ai déjà un compte </a>

    </form>
  </fieldset>
</div> 

<?php

include "templates/footer.php";


?>
