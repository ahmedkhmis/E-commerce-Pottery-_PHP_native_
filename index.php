
<?php
//nav barre


include "templates/header.php";

session_start();
if(isset($_SESSION["email"])){
  header("location:myaccount.php");
  exit(); 
}


?>


<!-- Afficher les produit -->
<div class="row col-12 mt-5 p-3">

<?php
  foreach($produits as $prod){
    $promo=getElementById('promo',$prod['promo']);
    if($prod['promo']==0){$lbl=$prod['prix'];}
  else{$lbl=$prod['prix']."DT avec remise ".($prod['prix']-($prod['prix']*$promo['remise']/100));}
    print '
    <div class="col-3 mt-2" >
    <div class="card" style="width: 18rem;">
    <a href="produit.php?id='.$prod['id'].'" >
  <img src="img/'.$prod['img'].'" class="card-img-top"  ></a>
  <div class="card-body">
    <h4 class="card-title">'.$prod['nom'].'</h4>
    <p class="card-text"><b><I>Desription:</I> </b>'.$prod['description'].'</p>
  </div>
  <ul class="list-group list-group-flush">
  <li class="list-group-item"><b><I>Prix:</I> </b> '.$lbl.' DT</li>
</ul>
<div class="card-body">
  <a href="produit.php?id='.$prod['id'].'" class="card-link btn btn-primary">Plus détails</a>
</div>
</div>
    </div>';

  }
?>

</div>


<?php
//footer
include "templates/footer.php";



?>
