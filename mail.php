<?php
	session_start();
	//if(!isset($_SESSION["matricule"])){header("location:https://www.ciatel.ga");}
	function c(){
		try{$bdd = new PDO('mysql:host=91.216.107.183;dbname=ciate1497620','ciate1497620','aon13mfu1r');return $bdd;}
		catch(Exception $e){die('Erreur : '.$e->getMessage());};
	}
	function afficheur_date($a,$b=1){
		$temps = getdate($a);
		if($temps["seconds"]<10)$temps["seconds"]="0".$temps["seconds"];
		if($temps["minutes"]<10)$temps["minutes"]="0".$temps["minutes"];
		if($temps["hours"]<10)$temps["hours"]="0".$temps["hours"];
		if($temps["mday"]<10)$temps["mday"]="0".$temps["mday"];
		if($temps["mon"]<10)$temps["mon"]="0".$temps["mon"];
		switch ($b) {
		  	case 0:
		    	return "".$temps["mday"]."/".$temps["mon"]."/".$temps["year"]."-".$temps["hours"].":".$temps["minutes"].":".$temps["seconds"];
		    	break;
		  	case 1:
		    	return "".$temps["mday"]."/".$temps["mon"]."/".$temps["year"]."";
		  	case 2:
		    	$mois_en_lettre = array(null,"janvier","février","mars","avril","mai","juin","juillet","aout","septembre","octobre","novembre","décembre");
		    	$return_data_mois_en_lettre = $mois_en_lettre[$a];
		    	return $return_data_mois_en_lettre;
		}
	}
	function temps_serv($a=0){return ($_SERVER["REQUEST_TIME"]+$a);} //temps
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
	<title>Services Inforatique</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="ressources/images/logo1.png" sizes="196x196" />
	<link rel="icon" type="image/png" href="ressources/images/logo1.png" sizes="128x128" />
	<link rel="icon" type="image/png" href="ressources/images/logo1.png" sizes="96x96" />
	<link rel="icon" type="image/png" href="ressources/images/logo1.png" sizes="32x32" />
	<link rel="icon" type="image/png" href="ressources/images/logo1.png" sizes="16x16" />
	<!-- BOOTSTRAP 3 Debut --->
	<!--
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<!-- CSS Debut-->


	<!-- GOOGLE -->
	<meta name="google-signin-client_id" content="271179465239-jltcs8lj4pqjpgejjltlb4p4acqbgfuj.apps.googleusercontent.com">
	<!-- FACEBOOK -->

	<meta property="og:url"           content="https://www.ciatel.ga/index.php" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="Ciatel Engin" />
	<meta property="og:description"   content="Ciatel Engin Acceuil" />
	<meta property="og:image"         content="https://www.ciatel.ga/a.png" />
	<style type="text/css">
		body{
			background-image: url("a.jpg");
			background-repeat: no-repeat;
			background-size: cover;
			font-size: 12px;
			font-family: "Segoe UI";
		}
	</style>

	<!-- BOOTSTARP 5 Debut --> 
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
	<!-- BOOTSTRAP 5 --->
		
</head>
<body class="">
	<div class='col-lg-12 bg-info py-5'>
		<div class='col-lg-9 bg-light rounded py-4' style='margin:auto'>
			<center>
				<img src='0.png' class='mw-100 h-50'>
			</center>
			<p class="border my-3 p-3">
				<span style='font-family:impact;font-size:4vw'>Message de Mr OYONO</span><br>
				<span style='font-size:3vw'>Description de la demande</span><br>
				[Message entrant]
			</p>
			
			<center>
				<div class='border py-3'>
					<span style='font-size:3vw'>Contacts</span><br><br>
					<a href='tel:' class='btn-lg btn btn-info px-4'>N° Téléphone</a>
					<a href='mailto:' class='btn-lg btn btn-info px-4'>Adresse mail</a>
				</div>
			</center>			
		</div>
	</div>
	<!--
	<img src="a.jpg" class="w-100">
	-->
</body>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</html>