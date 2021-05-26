<?php
	session_start();
	function c(){
    	try{$bdd = new PDO('mysql:host=91.216.107.183;dbname=ciate1497620','ciate1497620','aon13mfu1r');return $bdd;}
    	catch(Exception $e){die('Erreur : '.$e->getMessage());};
  	}
	$_SESSION["path_racine"] = "http://localhost/SiteGeoCom";
	function longueur_text($texte,$taille=100){
		$max_caracteres=$taille;
		// Test si la longueur du texte dépasse la limite
		if (strlen($texte)>$max_caracteres){   
		  	// Séléction du maximum de caractères
		  	$texte = substr($texte, 0, $max_caracteres);    
		  	// Récupération de la position du dernier espace (afin déviter de tronquer un mot)
		  	$position_espace = strrpos($texte, " ");    
		  	$texte = substr($texte, 0, $position_espace);    
		  	// Ajout des "..."$texte = $texte."...";}?
		  	return $texte;
		}
		return $texte;
	}
?>
<!DOCTYPE>
<html lang="fr">
<head>
	<?php
		echo "<title>Dashboard-".strtoupper($_SESSION["user_nom"])."</title>";
	?>
	<?php require "../Param_head_page_web.php";?>
</head>
<body class="col-lg-12">	
	<?php
		/*
			ZONE DE GESTION DE LA BALISE ENTETE DU SITE
		 */
		require "../header.php";
		/*
			FIN DE LA ZONE DE GESTION DE LA BALISE ENTETE DU SITE
		 */
	?>
	<div class="col-lg-12 py-2" style="background-color:#111">
		<div class="row">
			<div class="col-lg-2 bg-secondary text-light">
				<legend><b>Information de la Boutique</b></legend>
				<?php
					echo "
						Id : ".$_SESSION["user_id"]."<br>
						Email : ".$_SESSION["user_mail"]."<br>
						Nom : ".$_SESSION["user_nom"]."<br>
						Prénom : ".$_SESSION["user_pre"]."<br>
						Tel : ".$_SESSION["user_tel"]."<br>
						
					";
				?>
			</div>
				
			<div class="col-lg-3 bg-light">
				<legend><b>Ajouter un produit</b></legend>
				<form method="post" action="index.php" enctype="multipart/form-data">
					<input type='text' class="form-control" name='nom_produit' placeholder="Nom du produit" required><br>
					<input type='file' class="form-control" name='img_produit' id='img_produit' required><br>
					<input type='number' class="form-control" name='prix_produit' placeholder="Entrez lz prix du produit" required><br>
					<button class="btn btn-info btn-sm disabled" name='ok_send' id='ok_send'>Publier</button>
					<input type='button' class="btn btn-dark btn-sm" value='Verifez' onclick="verification_type_fichier()" />
					<script type="text/javascript">
						
						
						function verification_type_fichier(){
							var image_name = $("#img_produit").val();

							if(image_name == ""){
								alert("Le conténu de l'image est vide");
								document.getElementById("ok_send").className="btn btn-info btn-sm disabled"
								return false;
							}else{
								var extension = $("#img_produit").val().split(".").pop().toLowerCase();								
								if(jQuery.inArray(extension,["gif","png","jpg","jpeg"]) == -1){
									document.getElementById("ok_send").className="btn btn-info btn-sm disabled"
									alert("L'extenssion invalide")
									return false
								}else{
									if(document.getElementById("img_produit").files[0]["size"] >524288){
										alert("Fichier trop grand")
										document.getElementById("ok_send").className="btn btn-info btn-sm disabled"
									}else{
										document.getElementById("ok_send").className="btn btn-info btn-sm"
										alert("Fichier valide")
									}
								}
							}
						}

					</script>
				</form>
				<?php
					if(isset($_POST["ok_send"])){
						$image_file = addslashes(file_get_contents($_FILES["img_produit"]["tmp_name"]));
						if($req = c()->prepare("INSERT INTO OM_produit VALUES(null,:a,:b,:c,:d,:e,:f,:g,:h)")){
							$req->execute(array(
								"a"=>$_SESSION["user_id"],
								"b"=>trim($_POST["nom_produit"]),
								"c"=>trim($_POST["prix_produit"]),
								"d"=>time(),
								"e"=>time()+2592000, //Plus 30 jours
								"f"=>0,//zone de la zone
								"g"=>0, //point de booste
								"h"=>$image_file
							));
							$req->closeCursor();
							echo "<script>document.location='index.php'</script>";
						}else{
							echo "<script>alert('Il y a eu une erreur lors de l'enregistrement)</script>";
							echo "<script>document.location='index.php'</script>";
						}
						$req->closeCursor();
					}
				?>
			</div>

			<div class="col-lg bg-light border" style="overflow:auto">
				<legend><b>List de produits en vente</b></legend>
				<table class="table">
					<tr>
						<td>Nom du produit</td>
						<td>Prix</td>
						<td>Etat</td>
						<td>Action</td>
					</tr>
					<?php
						//$req = c()->query("SELECT * FROM produit");
						$req = c()->prepare("SELECT * FROM OM_produit WHERE id_boutique=:a");
						$req->execute(array("a"=>$_SESSION["user_id"]));
						if(!$req){
							echo "
								<p style='font-size:1vw; text-align:center'>
									Les données recherchées sont inexistante
								</p>
							"
							;
						}else{
							while ($data = $req->fetch()) {
								$etat_stock = "
									<a href='booste.php' class='btn btn-sm btn-success py-0'>Booster</a>
									<a 
										href='index.php?delete_produit=".$data["id"]."&nom_produit=".$data["nom_produit"]."' 
										class='btn btn-sm btn-danger py-0'>
										Supprimer
									</a>";
								if($data["date_exp"] <= time()){
									$etat_du_produit = "En rupture";
								}else{									
									$etat_du_produit = "En stock";
								}
								if($data["image_file"] == ""){
									$class_row = "bg-danger";
								}else{
									$class_row = "bg-default";
								}
								echo "
									<tr class='".$class_row."'>
										<td>".$data["nom_produit"]."</td>
										<td>".$data["prix"]."</td>
										<td>".$etat_du_produit."</td>
										<td>".$etat_stock."</td>
									</tr>								

								";								
							}
							$req->closeCursor();
						}
						if(isset($_GET['delete_produit'])){
							$req = c()->prepare("DELETE FROM OM_produit WHERE id=:a");
							$req->execute(array("a"=>$_GET["delete_produit"]));
							$req->closeCursor();
							echo "
								<script>
									alert('Le fichier ".$_GET["nom_produit"]." à été supprimé avec succès')
									document.location='index.php'
								</script>";
						}
					?>
				</table>
			</div>

		</div>
	</div>
	<?php 
		require "../footer.php" 
	?>
</body>
</html>