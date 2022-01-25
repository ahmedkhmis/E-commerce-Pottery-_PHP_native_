<?php
//nav barre
session_start();
if(isset($_SESSION['email'])){

include 'templates/headerAccount.php';
}else{
  include 'templates/header.php';
}
//fin 

if(isset($_GET['id'])){
 $prod=getProduitById($_GET['id']) ;  
 $promo=getElementById('promo',$prod['promo']);
}
if(isset($_GET['comd'])){
  print' <div class="alert alert-success" role="alert">
  <strong>'.$prod['nom'].'</strong> bien ajouté au panier.<a href="myaccount.php" class="btn btn-warning " >Continuer vos achats</a>
</div>
';
}

 ?>
 <div class="position-fixed bottom-0 end-0 p-3" style="z-index: 11">
<div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
  <div class="toast-header">
    <img src="..." class="rounded me-2" alt="...">
    <strong class="me-auto">Panier</strong>
    <small>juste maintenant</small>
    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
  </div>
  <div class="toast-body">
    ajouté au panier
  </div>
</div>
</div>
<div class="row col-12 mt-2">

    <div class="card col-7 offset-2   " >
  <img src="img/<?php echo $prod['img']?>" class="card-img-top" >
  <div class="card-body">
    <h2 class="card-title"><?php echo $prod['nom']?></h2>
    <p class="card-text"><b><I> Description:</I></b> <?php  echo $prod['description'] ?></p>
    <p class="card-text"><b><I>Categorie:</I> </b> 
      <?php 
    $cats = getElementById('categorie',$prod['categorie']) ;
    echo $cats['nom'];   
    
    ?></p>
  </div>
  <ul class="list-group list-group-flush">
  <li class="list-group-item"><b><I>Prix:</I> </b> 
  <?php 
  if($prod['promo']==0){echo $prod['prix'];}
  else{echo $prod['prix']."DT avec remise ".($prod['prix']-($prod['prix']*$promo['remise']/100));}
  
  ?> DT</li>
</ul>
<div class="card-body" >
  <form action="commande/commander.php" method="POST">
    

  <div class=" d-grid gap-2 mb-2" >
    <input type="hidden" name="idprod" value=<?php echo $prod['id']?>>
    <label for="qte">Qauntité :</label>
<input type="number" step="1" id="qte" name="qte"  placeholder="Quantité a commandée..." value=1 ></div>


<div class="d-grid gap-4 ">
<button class="btn btn-primary" type="submit">Ajouter Panier</button></div></form>

</div>

    </div>


    </div>

<?php


//footer
include "templates/footer.php";

?>