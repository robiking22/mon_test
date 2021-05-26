<?php
	session_start();
	function c(){
    	try{$bdd = new PDO('mysql:host=localhost;dbname=geocom','ciate1497620','aon13mfu1r');return $bdd;}
    	catch(Exception $e){die('Erreur : '.$e->getMessage());};
  	}
	//if(!$_SESSION["path_racine"]) $_SESSION["path_racine"] = "http://localhost/SiteGeoCom";
	//if(!$_SESSION["path_racine"]) $_SESSION["path_racine"] = "https://www.ciatel.ga/tire";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<title>Présentations</title>
	<?php require "../Param_head_page_web.php"; ?>
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
	<div class="col-lg-12">
		<h1>Cookie</h1>
		<a href="https://www.fne-aura.org/cookies/">voir</a>
		Politique relative à l'utilisation de cookies sur le site FNE Auvergne-Rhône-Alpes

		<h4>Qu’est-ce qu’un cookie ?</h4>
		Les cookies sont des fichiers contenant de faibles quantités d’informations qui sont stockés sur votre ordinateur ou votre appareil mobile lorsque vous visitez un site Internet. Ce fichier texte est susceptible d’être enregistré, sous réserve de vos choix, dans un espace dédié du disque dur de votre terminal, à l’occasion de la consultation d’un service en ligne grâce à votre logiciel de navigation.

		Un cookie permet donc de reconnaître le terminal de l’utilisateur lorsqu’il revient sur un site web pendant sa durée de validité. En effet, ce n’est pas l’utilisateur qui est reconnu mais le terminal depuis lequel il visite un site web.

		 

		<h4>A quoi servent les cookies émis sur notre site ?</h4>
		Seul l’émetteur d’un cookie est susceptible de lire ou de modifier des informations qui y sont contenues.

		Les cookies que nous émettons sur notre site sont utilisés pour reconnaître le terminal de l’utilisateur lorsqu’il se connecte à notre site afin de :

		déterminer s’il accepte ou refuse que sa navigation sur le site fasse l’objet d’un suivi statistique,
		mesurer de façon transversale l’activité de nos visiteurs sur le site et nous permettre ainsi de proposer une expérience toujours mieux adaptée aux attentes de nos visiteurs.
		 

		<h4>Activer / désactiver les cookies de votre navigateur</h4>
		Vous pouvez choisir de désactiver les cookies dans votre navigateur en vous basant sur les documentations ci-dessous (à sélectionner selon votre navigateur web) :

		Mozilla Firefox
		Google Chrome
		Internet Explorer
		Opera
		Safari
		iOs
		Android
		Attention : la désactivation des cookies peut éventuellement vous empêcher d’utiliser certaines fonctionnalités du site.

		 

		<h4>Préférences relatives au suivi de la fréquentation</h4>
		Sur notre site, l’analyse de la fréquentation est réalisée à l’aide du service externe Google Analytics. Si vous ne souhaitez pas que votre navigation soit étudiée à des fins de qualification d’audience par l’intermédiaire du service externe Google Analytics, vous pouvez le désactiver à l’aide des contrôles ci-dessous qui enregistreront au sein de votre navigateur un cookie ayant pour unique objet de désactiver la collecte d’informations de navigation.
	</div>
	<footer class="col-lg-12 h-75" style="background-color: #eee">
		<?php 
			require "../footer.php";
		?>
	</footer>
</body>
</html>