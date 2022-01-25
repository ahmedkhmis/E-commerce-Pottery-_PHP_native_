<?php
session_start();

include "templates/fonctions.php";
if(isset($_SESSION["email"])){
  header("location:myaccount.php");
  exit(); 
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


<div class="col-12 p-5" >
<fieldset>
<div class="text-center"><img src='img/bg.png' class="img-circle " style="max-width:10%; height: 10%;" ></div>
         <legend><h1 class="text-center">Connexion</h1></legend>
<form action="inc/login.php" method="post">
<div class="mb-3">
    <label for="mail" class="form-label"><h4>Email </h4></label>
    <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp"required>
    <div id="emailHelp" class="form-text">Nous ne partagerons jamais votre e-mail avec quelqu'un d'autre.</div>
  </div>

  <div class="mb-3">
    <label for="mdp" class="form-label"><h4>Mot de passe</h4></label>
    <input type="password" class="form-control" id="mdp" name="mdp" required >
  </div>

  <button type="submit" class="btn btn-primary btn-lg" name="login">connecter</button>
  <a href="index.php" type="button" class="btn btn-secondary btn-lg" >Annuler</a>
  <a href="inscription.php" class="d-grid gap-2 d-md-flex justify-content-md-end" >Créer nouveau compte</a>
  
</form>
</fieldset>

</div>

<?php
include "templates/footer.php";
if(isset($_GET["res"]) ){
        //echo $_GET["res"];      
  print "<script id='res'>
  Swal.fire({
    icon: 'error',
    title: 'utilisateur n\'existe pas!!',
    text: ' Email ou Mot de passe erroné ou votre compte non validée',
    footer: '<a href=\"inscription.php\">Pouvez vous inscrire?</a>'
  })
  </script>";
}

?>