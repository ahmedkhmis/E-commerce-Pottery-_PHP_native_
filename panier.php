<?php

session_start();
if (isset($_SESSION['email'])) {

	include 'templates/headerAccount.php';
} else {
	include 'templates/header.php';
}
$commande=array();
$panier=array(null,0);
if (isset($_SESSION['panier'])) {
	$panier = $_SESSION['panier'];

	if (count($_SESSION['panier'][3]) > 0) {
		$commande = $_SESSION['panier'][3];
	}
}
/* echo count($_SESSION['panier'][3]);
var_dump($_SESSION['panier'][3]); */
if(isset($_GET['vide'])&& $_GET['vide']==1){
	print' <div class="sm-4 alert alert-warning alert-dismissible fade show " role="alert">
	Le panier est vide !!!!!
	  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	
	</div>
	';}


?>


<!-- Afficher les produit -->
<div class="row col-12 mt-5 p-4">

	<div class="container">
		<table id="cart" class="table table-hover table-condensed">
			<thead>
				<tr>
					<th style="width:9%">#</th>
					<th style="width:50%">Produits</th>
					<th style="width:10%">Prix</th>
					<th style="width:8%">Quantité</th>
					<th style="width:10%" class="text-center">Totale</th>
					<th style="width:10%"></th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($commande as $i => $cmd) {
					print '<tr>
					<td data-th="idprod">' . ($i + 1) . '</td>
					<td data-th="Product">
					<div class="row">
					<div class="flotte col-sm-6 hidden-xs"><img src="img/' . $cmd[0] . '" class="img-responsive"/></div>
					<div class="col-sm-4">
					<h4 class="nomargin" >' . $cmd[1] . '</h4>
					<p>' . $cmd[2] . '</p>
					</div>
					</div>
					</td>
					<td data-th="Price">' . $cmd[3] . ' DT</td>
					<form action="commande/modifierProdPanier.php" method="post">
					<input type="hidden" name="id"  value="'.$i.'" >
					<input type="hidden" name="prix"  value="'.$cmd[3].'" >
					<td data-th="Quantity">
					<input type="number" name="qte" class="form-control text-center" value="' . $cmd[4] . '">
					</td>
					<td data-th="Subtotal" class="text-center">' . $cmd[5] . ' DT</td>
					<td class="actions" data-th="">
					<button type="submit" class="btn btn-info btn-lg"  data-bs-toggle="tooltip" data-bs-placement="top" title="Modifier"><i class="fa fa-trash-o"></i></button>	</form>							
					<a href="commande/deleteProdPanier.php?index='.$i.'" class="btn btn-danger btn-lg"  data-bs-toggle="tooltip" data-bs-placement="top" title="Supprimer"><i class="fa fa-trash-o"></i></a>								
					</td>
					</tr>';
				}





				?>

			</tbody>
		</table>
		<tfoot></tfoot>
		<table class="mt-5 table table-condensed">
			<thead>
				<th style="width:20%"><h3>Totale </h3></th>
				<th style="width:50%"></th>
				<th style="width:0%"></th>
				<th style="width:20%" class="text-center"></th>
				<th style="width:10%"><h3><?php echo $panier[1]; ?> DT</h3></th>
				<thead>
				<tbody>
					<tr style="height:30px"></tr>
					<tr>
						<td><a href="myaccount.php" class="btn btn-warning btn-lg"><i class="fa fa-angle-left"></i><< Continuer vos achats</a></td>
						<td colspan="2" class="hidden-xs"></td>
						<td class="hidden-xs text-center"></td>
						<td><a href="commande/validerCmd.php" class="btn btn-success btn-block btn-lg">Commander <i class="fa fa-angle-right"></i></a></td>
					</tr>
				</tbody>
		</table>


	</div>
</div>


<?php
//footer
include "templates/footer.php";



?>