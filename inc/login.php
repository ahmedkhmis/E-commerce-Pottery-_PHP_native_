<?php

include "../templates/fonctions.php";

if(isset ($_POST['login'])){

    $mail=$_POST['mail'];
    $mdp1=sha1( $_POST['mdp']);

    
if ($mdp1 & $mail) {

    $connexion=connect_BD();
    $req="SELECT * from user where email='$mail' and mdp='$mdp1'";
    $result=$connexion->query($req);
    $row = $result->fetch(PDO::FETCH_ASSOC); 
    $res=true;
    if(is_array($row) && count($row)>0 && $row['etat']==1  ){    
    
         session_start();
         $_SESSION['id']=$row['id']; 
         $_SESSION['nom']=$row['nom'];
         $_SESSION['prenom']=$row['prenom'];
         $_SESSION['mdp']=$mdp1;
         $_SESSION['tel']=$row['telphone'];
         $_SESSION['email']=$mail;
           
             header("location:../myaccount.php");
             exit(); 
            
            } 
    else{

        $res=false;
     
        header("location:../connexion.php?res=$res");
        
    
       

} 
}
}

?>