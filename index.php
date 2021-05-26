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
	<meta name="google-signin-client_id" content="860368299906-9c6aqc6g7pkmgu8k574boo61750hngop.apps.googleusercontent.com">
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
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-WT1J7F92XR"></script>
	<script>
	  	window.dataLayer = window.dataLayer || [];
	  	function gtag(){dataLayer.push(arguments);}
	  	gtag('js', new Date());

	  	gtag('config', 'G-WT1J7F92XR');
	</script>	
</head>
<body class="">
	<div class="col-lg-12">
		<center>
			<div id="my-signin2"></div>
		  	<script>
		    	function onSuccess(googleUser) {
		      		console.log('Logged in as: ' + googleUser.getBasicProfile().getId());
		      		console.log('Logged in as: ' + googleUser.getBasicProfile().getName());
		      		console.log('Logged in as: ' + googleUser.getBasicProfile().getGivenName());
		      		console.log('Logged in as: ' + googleUser.getBasicProfile().getFamilyName());
		      		console.log('Logged in as: ' + googleUser.getBasicProfile().getImageUrl());
		      		console.log('Logged in as: ' + googleUser.getBasicProfile().getEmail());
		    	}
		    	function onFailure(error) {
		      		console.log(error);
		    	}
		    	function renderButton() {
		      		gapi.signin2.render('my-signin2', {
		        	'scope': 'profile email',
		        	'width': 240,
			        'height': 50,
			        'longtitle': true,
			        'theme': 'dark',
			        'onsuccess': onSuccess,
			        'onfailure': onFailure
		      	});
		    }
		  </script>
		  <script src="https://apis.google.com/js/platform.js?onload=renderButton" async defer></script>
		</center>>



















		<form action="https://mypvit.com/pvit-secure-full-api.kk" method="POST" id="payeForm" class="bg-light col-lg-6 py-3" style="margin: auto">
			<center>
				<center><h2>Faite un don de 1100 Francs pour nous soutenir<br>xaf 1100</h2></center>
			 	<input type="hidden" name="tel_marchand" value="077293562">
			 	<input type="hidden" name="montant" value="1110">
			 	<?php 
			 		echo "<input type='hidden' name='ref' value='RefMC".time()."'>";
			 	?>
			 	<input type="hidden" name="service" value="WEB">
			 	<input type="hidden" name="operateur" value="AM">
			 	<input type="hidden" name="redirect" value="https://www.ciatel.ga/index.php?info=paiement_recu=1">
			 	<button type="submit" name="submitButton" class="btn-lg bg-warning text-light">
			 		Faite un le DON de 1100 Francs<br>via aIRTELmONEY
			 	</button>
			</center>
		</form>
		<form action="https://mypvit.com/pvit-secure-full-api.kk" method="POST" id="payeForm" class="bg-light col-lg-6 py-3" style="margin: auto">
			<center>
				<center><h2>Faite un don de 1100 Francs pour nous soutenir<br>xaf 1100</h2></center>
			 	<input type="hidden" name="tel_marchand" value="062165952 ">
			 	<input type="hidden" name="montant" value="1110">
			 	<?php 
			 		echo "<input type='hidden' name='ref' value='RefMC".time()."'>";
			 	?>
			 	<input type="hidden" name="service" value="WEB">
			 	<input type="hidden" name="operateur" value="MC">
			 	<input type="hidden" name="redirect" value="https://www.ciatel.ga/index.php?info=paiement_recu=1">
			 	<button type="submit" name="submitButton" class="btn-lg bg-primary text-light">
			 		Faite un le DON de 1100 Francs<br>via MobiCash
			 	</button>
			</center>
		</form>

		<form action="https://mypvit.com/pvit-secure-full-api.kk" method="POST" id="payeForm" class="bg-light col-lg-6 py-3" style="margin: auto">
			<center>
				<center><h2>Realiser un paiment<br>Via Airtel MOney</h2></center>
			 	<input type="hidden" name="tel_marchand" value="077293562">
			 	<input type="hidden" name="montant" value="300">
				<?php 
			 		echo "<input type='hidden' name='ref' value='RefAM".time()."'>";
			 	?>
			 	<input type="hidden" name="tel_client" value="074854899">
			 	<input type="hidden" name="token" value="eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.U1VPRTFZbTdRK0w2bWlhazl4TnkveGFTTlMrQUVRSTBmL1hMZ09OdldkRU9hSnk3T2M4b05lS3dZQUxpbFhxM3hodVpVSTFvZk9nZ1Jia0VtZEZCak96V2xxK054UUs0aGtEMHVBTmFLTmdHb09XVHJPcXpSaGJaUEZoUERPZWpJLzVSeHN6TUo0NlBsWTFEWituT0ZSSEhJTGhRRXJDQzlsZUtOaVFvMHpNMlllM2RxczczUGhGd2ZQNG82bHNaOjpwZTBsdndDOWZ3bFVERzNXOFhZaHp3PT0=.0eCgIV/e5t11M+0OTDMKKesMJUeDNcqJljmYMG82z1M=">
			 	<input type="hidden" name="action" value="2">
			 	<input type="hidden" name="service" value="REST">
			 	<input type="hidden" name="operateur" value="AM">
			 	<input type="hidden" name="agent" value="CIATEL-INC">
			 	<button type="submit" name="submitButton" class="btn-lg bg-danger text-light">
			 		Faite un le DON de 1100 Francs<br>via MobiCash
			 	</button>
			</center>
		</form>
		<form method="post" action="index.php">
			<center>
				<div class="col-lg-6 bg-light rounded" style="background-color: #ffffffaa">
					<div id="ctab_ad"></div>
					<script type="text/javascript">
						var iframe = document.createElement('iframe');
						iframe.src = 'https://get.cryptobrowser.site/pb/6/7874381/?t=simple,text,pro,mobile';
						iframe.frameBorder = 'no';
						iframe.style.width = '100%';
						iframe.style.height = '90px';
						document.getElementById('ctab_ad').appendChild(iframe);
					</script>
					<p>
						<h2>Nous contacter</h2>
						<h4>"Notre équipe est là pour vous aider"</h4>
						<p style="font-size: 16px;">
							Merci d’utiliser ce formulaire pour nous écrire le ou les problèmes rencontrés.
							Nous attendons également des propositions d’améliorations, des regrets ou des attentes.
						</p>
					</p>
					<div class="">
						<center><img src="phonelink.gif" height="48"></center>
						<center>							
							<a class='btn btn-sm btn-danger p-1' href='tel:+24111718133' style='text-decoration:none'>
								<svg xmlns='http://www.w3.org/2000/svg' width='48' height='48' fill='currentColor' class='bi bi-telephone-fill' viewBox='0 0 16 16'>
								  	<path fill-rule='evenodd' d='M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z'/>
								</svg><br>
							</a>
							<a class='btn btn-sm btn-danger p-1' href='tel:+24162081617' style='text-decoration:none'>
								<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-phone-fill" viewBox="0 0 16 16">
					  				<path d="M3 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V2zm6 11a1 1 0 1 0-2 0 1 1 0 0 0 2 0z"/>
								</svg><br>
							</a>
							<a class='btn btn-sm btn-danger p-1' href='tel:+24174854899' style='text-decoration:none'>
								<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-phone-fill" viewBox="0 0 16 16">
						  			<path d="M3 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V2zm6 11a1 1 0 1 0-2 0 1 1 0 0 0 2 0z"/>
								</svg><br>
							</a>
							<a class='btn btn-sm btn-danger p-1' href='mailto:contact@ciatel.ga' style='text-decoration:none'>
								<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-envelope-fill" viewBox="0 0 16 16">
								  	<path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
								</svg><br>
							</a>
							<a class='btn btn-sm btn-danger p-1' href='https://wa.me/message/6LY65WZ3E4VGP1' style='text-decoration:none'>
								<svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
									  <path d="M13.601 2.326A7.854 7.854 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.933 7.933 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.898 7.898 0 0 0 13.6 2.326zM7.994 14.521a6.573 6.573 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.557 6.557 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592zm3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.729.729 0 0 0-.529.247c-.182.198-.691.677-.691 1.654 0 .977.71 1.916.81 2.049.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232z"/>
									</svg><br>
							</a>

						</center>
					</div>
					<div style="padding: 10px;" class="rounded">
						<label for="text">Votre nom et prénom (Obligatoire) <b style="color:red">*</b></label>
						<input type="text" name="user_name" class="form-control" required placeholder="Ex : Mr WANDJI WONGO"><br>

						<label for="text">Votre numéro de téléphone (Obligatoire) <b style="color:red">*</b></label>
						<input type="text" name="user_tel" class="form-control" required placeholder="Ex : 062 XXX XXX XX"><br>

						<label for="text">Adresse mail (Obligatoire) <b style="color:red">*</b></label>
						<input type="email" name="address_mail" class="form-control" required placeholder="Ex : abcd@xxx.com"><br>

						<label for="text">Votre message (Obligatoire) <b style="color:red">*</b></label>
						<textarea class="form-control" required name="sms"  placeholder="Votre préoccupation"></textarea><br>
						<button class="btn-sm btn btn-success my-3" name='envoye'>Envoyer</button>
						<?php
							if(isset($_POST["envoye"])){
								$destinataire = "222littleking@gmail.com,oyononso@gmail.com";
								$sujet = "Préocupations des clients (Renseignements, Achats, Reservations)";
			$message = 
				"


				<div class='col-lg-12 bg-info py-5'>
					<div class='col-lg-9 bg-light rounded py-4' style='margin:auto'>
						<center>
							<img src='0.png' class='mw-100 h-50'>
						</center>
						<p class='border my-3 p-3'>
							<span style='font-family:impact;font-size:4vw'>Message de Mr ".$_POST["user_name"]."</span><br>
							<span style='font-size:3vw'>Description de la demande</span><br>
							".$_POST["sms"]."
						</p>
						
						<center>
							<div class='border py-3'>
								<span style='font-size:3vw'>Contacts</span><br><br>
								<a href='tel:".$_POST["user_tel"]."' class='btn-lg btn btn-info px-4'><br>N° Téléphone ".$_POST["user_tel"]."</a>
								<a href='mailto:".$_POST["address_mail"]."' class='btn-lg btn btn-info px-4'><br>Adresse mail ".$_POST["address_mail"]."</a>
							</div>
						</center>			
					</div>
				</div>
								".$_POST["sms"]."
	";

								$header =  array(
								    //'From' => 'contact@ciatel.ga', //expediteur
								    'From' => $_POST["address_mail"], //expediteur
								    'Reply-To' => 'admin@ciatel.ga', //destinataire en copie
								    'X-Mailer' => 'PHP/' . phpversion()
								);
								$stat = mail($destinataire, $sujet, $message, $header);
								if($stat ==1){
									echo "<center>Votre mail a été envoyé avec succès</center><br>";
								}else{
									echo "<center>Votre mail n'a pas été envoyé</center><br>";
								}
							}
						?>
					<div>
				</div>
				<iframe src="https://get.cryptobrowser.site/pb/6/7874381/?t=simple,text,pro,mobile" style="width: 100%; height: 90px" frameborder="no"></iframe>
				<img src="a.jpg" style="width: 100%">
				<iframe src="https://get.cryptobrowser.site/pb/6/7874381/?t=simple,text,pro,mobile" style="width: 100%; height: 90px" frameborder="no"></iframe>
			</center>
		</form><br>
	</div>
	<!--
	<img src="a.jpg" class="w-100">
	-->
	<a href="https://www.ciatel.ga/ogooue market">ogooue market</a>
</body>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
</html>