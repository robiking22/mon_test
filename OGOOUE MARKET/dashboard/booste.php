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
		echo "<title>Booste-".strtoupper($_SESSION["user_nom"])."</title>";
	?>
	<?php require "../Param_head_page_web.php";?>
</head>
<body class="col-lg-12 bg-dark">	
	<?php
		/*
			ZONE DE GESTION DE LA BALISE ENTETE DU SITE
		 */
		require "../header.php";
		/*
			FIN DE LA ZONE DE GESTION DE LA BALISE ENTETE DU SITE
		 */
	?>
	<div class="col-lg-12 py-2 h-100" style="background-color:#111">
		<div class="row">
			<form class="">
				
			</form>
		</div>
	</div>
</body>
</html>