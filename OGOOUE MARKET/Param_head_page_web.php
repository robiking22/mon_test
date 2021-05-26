<?php 
	$path_web1 = "http://".$_SERVER['HTTP_HOST']."/Ogooue Market";
	//$path_web1 = apache_getenv("HTTP_REFERER");
?>

<!-- BOOTSTARP 4 Debut --> 
<meta charset="utf-8">
<?php echo "<link rel='icon' type='image/png' href='".$_SESSION['path_racine']."/ressources/images/logos/geocom/icon.png' sizes='32x32'/>";?>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- BOOTSTRAP 4 --->

<!-- GOOGLE -->
<meta name="google-signin-client_id" content="271179465239-jltcs8lj4pqjpgejjltlb4p4acqbgfuj.apps.googleOM_usercontent.com">
<!-- FACEBOOK -->

<meta property="og:url"           content="https://www.ciatel.ga/index.php" />
<meta property="og:type"          content="website" />
<meta property="og:title"         content="Geospatial Company" />
<meta property="og:description"   content="Geospatial Company" />
<meta property="og:image"         content="https://www.portalgeocom.com/ressources/images/logos/geocom/logo0.png" />
<style type="text/css">
	html{
		color:#f00;
		/*
		background-image: url("ressources/images/wallpaper/1.jpg");
		*/
		background-repeat: no-repeat;
  		background-attachment: fixed;
  		font-family: "Bahnschrift";
  		font-family: "Segoe UI";
  		font-size-adjust: 14px; 
	}
	body{
		font-family: "Bahnschrift";
		font-family: "Segoe UI";
		color:#222;
		background-size: cover;
		background-repeat: repeat;
	}
	/*ZONE DE GESTION DES  TEXT*/
	.txt_normal{font-size: 12px;color:#222;}
	.txt_sous_titre{font-size: 16px;color:#222;}
	.txt_grand_sous_titre{font-size: 24px;color:#222;}
	.txt_moyen_titre{font-size: 1.5em;color:#black;}
	.txt_grand_titre{font-size: 2.5em;color:#black;text-transform: uppercase;font-weight: bold}
	.txt_tres_grand_titre{font-size: 5vw;color:#black;text-transform: uppercase; font-weight: bold}
	/*FIN DE LA ZONE DE GESTION DES  TEXT*/
	/*
	img{transition: transform 5s;}
	img:hover{transform: scale(1.1);}
	h1,h2,h3,h4,h5{color:#116f3a; font-weight: bold;margin-bottom: 20px;}
	*/
	.titre_chapitre {font-size: 1.5vw; font-weight: bold}
	.bouton_no{
		width:20px;
		height:20px;
		position: fixed;
		bottom:-140px;
		right:40px;
	}
	.bouton{
		width:20px;
		height:20px;
		position: fixed;
		bottom:40px;
		right:40px;
		
		display:;
		z-index: 11;
		transition:  .5s;
	}
</style>
<script type="text/javascript">
	window.onscroll = function() {windon_scroll()};
	function windon_scroll() {
		/*
		if (document.body.scrollTop >= 250) {
	  		console.log(document.body.scrollTop)
	  		document.getElementById("rubrique_info").className="rubrique_fixed"
	  	}else{
	  		document.getElementById("rubrique_info").className="col-lg-3 h-75"
	  	}
		*/
		//headder
	  	if (document.body.scrollTop > 300 || document.documentElement.scrollTop > 300) {
	    	document.getElementById("header").className = "header_fixed bg-primary";
	    	document.getElementById("up_btn").className = "bouton";
	    	//zone de gestion du logo de la barre de menu
	    	document.getElementById("logo1").style.opacity = 1;
	    	//
	  	}
	  	else {
	    	document.getElementById("header").className = "header_no_fixed bg-light";
	    	document.getElementById("up_btn").className = "bouton_no";
	    	document.getElementById("logo1").style.opacity = 0;
	    	//document.getElementById("up_btn").innerText = document.body.scrollTop;

	  	}
	}
</script>
