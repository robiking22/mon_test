<?php
	session_start();
	function c(){
    	try{$bdd = new PDO('mysql:host=91.216.107.183;dbname=ciate1497620','ciate1497620','aon13mfu1r');return $bdd;}
    	catch(Exception $e){die('Erreur : '.$e->getMessage());};
  	}
  	function c_auth(){
    	try{$bdd = new PDO('mysql:host=91.216.107.183;dbname=ciate1497620','ciate1497620','aon13mfu1r');return $bdd;}
    	catch(Exception $e){die('Erreur : '.$e->getMessage());};
  	}
  	$_SESSION["path_racine"] = "http://localhost/SiteGeoCom";
	//$_SESSION["path_racine"] = "https://www.geocom-sarl.com";

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
	<title>Mon OM_panier</title>
	<?php require "../Param_head_page_web.php";?>
</head>
<body class="">	
	
		<?php
			/*
				ZONE DE GESTION DE LA BALISE ENTETE DU SITE
			 */
			require "../header.php";
			/*
				FIN DE LA ZONE DE GESTION DE LA BALISE ENTETE DU SITE
			 */
		?>
	
	<br><br>
	<div class="col-lg-12">
		<div class="row h-100 my-2 border">
			<div class="col-lg-2 bg-info">
				<div id="A" class="col-lg-12">
				</div>
			</div>
			<div class="col-lg-8 h-100 py-1">
				<table class="w-100">
					<script type="text/javascript">
						function sending_via_ajax(){
							alert()
						}
					</script>
					<?php
						$req = c_auth()->prepare("SELECT * FROM OM_panier WHERE id_client=:a ORDER BY id DESC");
						$req->execute(array("a"=>$_SESSION["user_id"]));
						if(!$req){
							echo "
								<p style='font-size:8vw; text-align:center'>
									Les données recherchées sont inexistante
								</p>
							"
							;
						}else{
							while ($data = $req->fetch()) {
								echo "
									<tr class='border-bottom'>
										<td>
									  		<div class='row py-1'>
									  			<div class='col-sm'>
											    	<span class='card-title'>".ucfirst($data["produit_nom"])."</span>
											    </div>
											    <div class='col-sm'>
													".ucwords($data["produit_prix"])."
												</div>
												<div class='col-sm'>
													<a class='btn btn-sm btn-dark py-0' onclick='sending_via_ajax()'>
														Achéter
													</a>
												</div>
											</div>
										</td>
									</tr>
								";
							}
						}
					?>
				</table>
			</div>
			<div class="col-lg-2 bg-info">
				<div id="c" class="col-lg-12">
					
				</div>
			</div>
		</div>
	</div>
	<?php require "../footer.php" ?>	
</body>
</html>