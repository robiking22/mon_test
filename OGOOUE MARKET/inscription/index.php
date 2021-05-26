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
?>
<!DOCTYPE>
<html lang="fr">
<head>
	<title>Connexion</title>
	<?php require "../Param_head_page_web.php"; ?>
</head>
<body class="">		
	<?php
		/*
			ZONE DE GESTION DE LA BALISE ENTETE DU SITE
		 */
		require "../header2.php";

		/*
			FIN DE LA ZONE DE GESTION DE LA BALISE ENTETE DU SITE
		 */
	?>
	<div class="col-lg-4 py-5" style="margin:auto;">
		<form method="post" action="central.php">
			<div class="row">
				<div class="col-lg-12"><input type="email" name="mail" class='form-control text-center' placeholder="Adresse mail" required><br></div>
				<div class="col-lg"><input type="password" name="pwd" class='form-control text-center' placeholder="Mot de passe" required><br></div>
			</div>
			<div class="row" style="padding-top: 20px">
				<div class="col-lg-12"><center><input type="submit" name="ok_connexion" class="btn btn-sm btn-primary" value="Connexion"></center></div>
			</div>
			<div class="row" style="padding-top: 20px">
				<div class="col-lg-12">
					<fieldset>
						<center>
							<a href="inscription.php" class="btn btn-sm btn-success">Créer un compte</a>
							<a href="mot de passe oublie.php" class="btn btn-sm btn-default">Mot de passe oublié</a>
						</center>
					</fieldset>	
				</div>
			</div>
			<br><br>
			<div>
				<?php
					if(isset($_GET["error_con"])){
						echo "
							<div class='alert alert-danger'>
							  	<strong>Erreur de connexion!</strong><br>
							  	L’e-mail entré ne correspond à aucun compte. <a href='inscription.php'>Veuillez créer un compte</a>.
							</div>
						";
					}
				?>
			</div>
		</form>

	</div>
	<?php require "../footer.php"; ?>
</body>
</html>