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
	<title>Ogooue Market</title>
	<?php require "Param_head_page_web.php";?>
</head>
<body class="">	

	<?php
		/*
			ZONE DE GESTION DE LA BALISE ENTETE DU SITE
		 */
		require "header.php";
		/*
			FIN DE LA ZONE DE GESTION DE LA BALISE ENTETE DU SITE
		 */
	?>
	<br><br>
	<div class="col-lg-12">

		<div class="row my-2 h-75 bg-info">	
			<center>
				<?php
					$req = c()->query("SELECT COUNT(id)'nombre_produit' FROM OM_produit");
					$data = $req->fetch();
					echo"<span>Plus de ".$data['nombre_produit']." produits vous attendent</span>";
				?>
			</center>
		</div>
		<div class="row my-2">	
			<?php
				$req = c()->query("SELECT * FROM OM_produit ORDER BY id DESC");
				if(!$req){
					echo "
						<p style='font-size:8vw; text-align:center'>
							Les données recherchées sont inexistante
						</p>
					"
					;
				}else{
					while ($data = $req->fetch()) {
						$_fichier_image = "<img src='ressources/images/produits/0.png' style=' max-width:100%' class='rounded' alt='image'>";
						if($data["image_file"] != ""){
							//$_fichier_image = "<img src='data:image/jpeg;base64,".base64_encode($data["image_file"])."' style=' max-width:100%' class='rounded' alt='image'>";
							//$_fichier_image = "<img src='data:image/jpeg;base64,".base64_encode($data["image_file"])."'>";
							$fichier_image = fopen("bin/tmp/".$data["id"].".jpg","w");
							$d = fwrite($fichier_image,$data["image_file"]);
							$_fichier_image = "<img src='bin/tmp/".$data["id"]."' style=' max-width:100%' class='rounded' alt='image'>";
						}
						if($data["date_exp"] > time()){
							echo "
								<div class='col-md-2 col-3 py-3'>
									<div class='card p-2 h-100'>
										<center>
											".$_fichier_image."
										</center>
										<div class='card-body'>
									  		<center>
											    <span class='card-title txt_grand_sous_titre'>".$data["nom_produit"]."</span><br>
											    <span class='badge bagde-default border-bottom text-dark mx-1'>".ucwords($data["prix"])." Franc CFA</span>
											</center>
										</div>
										<div class='card-footer py-0' style='border:none'>
											<div class='row'>
												<center>
													<a href='acheter/central.php?fichier_binaire=".md5($data["id"])."' class='btn btn-sm btn-default py-0 col-lg-5 mx-1'>
														Voir +
													</a>
													<a href='OM_panier/collecteur.php?id_produit_OM_panier=".$data["id"]."' class='btn btn-sm btn-default py-0 col-lg-5 mx-1' title='Ajoutez 
														".$data["nom_produit"]." au OM_panier'>
														<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-bag-plus-fill' viewBox='0 0 16 16'>
															<path fill-rule='evenodd' d='M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z'/>
														</svg>
													</a>
												</center>
											</div>
										</div>
									</div>
								</div>

							";
						}
					}
				}
			?>
		</div>
	</div>
	<?php require "footer.php" ?>	
</body>
</html>