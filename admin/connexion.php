<?php


include "../templates/fonctions.php";
session_start();
if(isset($_SESSION["Adminemail"])){
  header("location:profile.php");
  exit(); 
}
if(isset ($_POST['login'])){

    $mail=$_POST['mail'];
    $mdp1=sha1( $_POST['mdp']);

    
if ($mdp1 & $mail) {

    $connexion=connect_BD();
    $req="SELECT * from admin where mail='$mail' and mdp='$mdp1'";
    $result=$connexion->query($req);
    $row = $result->fetch(PDO::FETCH_ASSOC); 
    $res=true;
    if(is_array($row) && count($row)>0){    

        
         $_SESSION['Adminid']=$row['id'];
         $_SESSION['Adminnom']=$row['nom'];

         $_SESSION['Adminmdp']=$mdp1;

         $_SESSION['Adminemail']=$mail;
          
            header("location:home.php");
             exit(); 
     

            } 
    else{

        $res=false;
     
        header("location:connexion.php?res=$res");
        
    
       

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
   
    .footer {
      margin-bottom: 0%;
  position: absolute;
  bottom: 1%;
  width: 100%;
 
  
    }

</style>

</head>
<body>


<div class="col-12 p-5" >

<fieldset>
<div class="text-center"><img src="../img/bg.png" class="img-circle " style="max-width:10%; height: 10%;"  alt="#"></div>
         <legend><h1 class="text-center">Espace Admin :Connexion</h1></legend>
<form  method="post">
<div class="mb-3">
    <label for="mail" class="form-label">Email </label>
    <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp"required>
  </div>

  <div class="mb-3">
    <label for="mdp" class="form-label">Mot de passe</label>
    <input type="password" class="form-control" id="mdp" name="mdp" required >
  </div>

  <button type="submit" class="btn btn-primary" name="login">connecter</button>
</form>
</fieldset>
</div>

<?php
include "../templates/footer.php";
if(isset($_GET["res"]) ){
        //echo $_GET["res"];      
  print "<script>
  Swal.fire({
    icon: 'error',
    title: 'Oops...',
    text: 'utilisateur n\'existe pas!',
    footer: '<a href=\"inscription.php\">Pouvez vous inscrire?</a>'
  })
  </script>";
}
?>