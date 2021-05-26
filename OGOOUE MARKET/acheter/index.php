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
	<?php require "../Param_head_page_web.php";?>
</head>
<body class="col-lg-12">	
	<header class=''>
		<?php
			/*
				ZONE DE GESTION DE LA BALISE ENTETE DU SITE
			 */
			require "../header.php";
			/*
				FIN DE LA ZONE DE GESTION DE LA BALISE ENTETE DU SITE
			 */
		?>
	</header>
	<center><button onclick="history.back()" class="btn btn-sm btn-dark py-0 my-3">Retour</button></center>
	<div class="row">
			<div class="col-sm-8" style="margin:auto">
			<center>
			<?php
				if(isset($_SESSION["id_produit_crypted"])){
					//echo $_SESSION["id_produit_crypted"]."<br>";
					$req = c()->query("SELECT * FROM produit");
					while ($data = $req->fetch()) {
						if(md5($data["id"]) == $_SESSION["id_produit_crypted"]){
							$_fichier_image = "<img src='../ressources/images/produits/0.png' style=' max-width:100%' class='rounded' alt='image'>";
							if($data["image_file"] != ""){
								//$_fichier_image = "<img src='data:image/jpeg;base64,".base64_encode($data["image_file"])."' style=' max-width:100%' class='rounded' alt='image'>";
								//$_fichier_image = "<img src='".base64_encode($data["image_file"])."' style=' max-width:100%' class='rounded' alt='image'>";
								$fichier_image = fopen($data["id"],"w");
								$d = fwrite($fichier_image,$data["image_file"]);
								$_fichier_image = "<img src='".$data["id"]."' style=' max-width:100%' class='rounded' alt='image'>";
							}
							if(isset($_SESSION["user_id"])){
								$etat_button = "disabled='false'";
								$ajoutez_OM_panier ="
									<a href='collecteur.php?id_produit_OM_panier=".$data["id"]."' class='form-control my-3 disable' title='Achetez ".$data["nom_produit"]."'>
										<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-bag-plus-fill' viewBox='0 0 16 16'>
											<path fill-rule='evenodd' d='M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zM8.5 8a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V12a.5.5 0 0 0 1 0v-1.5H10a.5.5 0 0 0 0-1H8.5V8z'/>
										</svg>
									</a>
								";
							}else{
								$etat_button = "disabled='true'";
								$ajoutez_OM_panier ="<a class='form-control my-3' href='".$path_web1."/inscription/'>Connectez-vous ici</a>";
							}
							echo "								
								<div class='card col-md-12 py-3 bg-dark' style='border:none'>
									<center>
										".$_fichier_image."
									</center>
									<div class='card-body'>
								  		<center>
										    <span class='card-title txt_grand_sous_titre text-light'>".ucwords($data["nom_produit"])."</span><br>
										    <button class='btn btn-sm btn-light mx-1'>
												".$data["prix"]." Franc CFA
											</button>
										</center>
									</div>
									<div class='card-footer py-0' style='border:none'>
										<div class='row'>
											<form action='https://mypvit.com/pvit-secure-full-api.kk' method='POST' id='payeForm' class='col-sm'>
											    <input class='form-control my-3' type='hidden' name='tel_marchand' value='062081617'>
											    <input class='form-control my-3' type='hidden' name='montant' value='".$data["prix"]."'>
											    <input class='form-control my-3' type='hidden' name='ref' value='Ref13082020ab'>
											    <input class='form-control my-3' type='hidden' name='service' value='WEB'>
											    <input class='form-control my-3' type='hidden' name='operateur' value='MC'>
											    <input class='form-control my-3' type='hidden' name='redirect' value='https://monsite.com/page'>
											    <input class='form-control my-3' type='submit' name='submitButton'  value='Payez avec MobiCash' ".$etat_button."/>
											</form>
											<form action='https://mypvit.com/pvit-secure-full-api.kk' method='POST' id='payeForm' class='col-sm'>
											    <input class='form-control my-3' type='hidden' name='tel_marchand' value='074854899'>
											    <input class='form-control my-3' type='hidden' name='montant' value='".$data["prix"]."'>
											    <input class='form-control my-3' type='hidden' name='ref' value='Ref13082020ab'>
											    <input class='form-control my-3' type='hidden' name='service' value='WEB'>
											    <input class='form-control my-3' type='hidden' name='operateur' value='AM'>
											    <input class='form-control my-3' type='hidden' name='redirect' value='https://monsite.com/page'>
											    <input class='form-control my-3' type='submit' name='submitButton'  value='Payez avec Airtel Money' ".$etat_button."/>
											</form>
											<div class='col-sm'>
												".$ajoutez_OM_panier."
											</div>
										</div>
									</div>
								</div>

							";
							break;
						}
					}
				}
			?>
			</center>
		</div>
	</div>
	<div class="row">
		
	</div>
</body>
</html>