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
	<title>Code de confimation</title>
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
	<div class="col-lg-4 mh-50" style="margin:auto;padding-top:100px">
		<form method="post" action="code de confirmation.php">
			<center><span>Saisissez le code de réinitialisation qui vous été envoyé à l'adresse <?php echo "<a href='mailto:".$_SESSION["mail"]."'>".$_SESSION["mail"]."</a>"; ?></span></center><br>
			<div class="row">				
				<div class="col-lg-12"><input type="text" name="code" class='form-control text-center' placeholder="Saisisez le code de confimation à 6 chiffres" required><br></div>
			</div>
			<div class="row" style="padding-top: 20px">
				<div class="col-lg-12"><center><input type="submit" name="ok_connexion" class="btn btn-sm btn-primary px-5" value="Confirmez"></center></div>
			</div>
			<br><br>
			<div>
				<?php
					$statut = 0;
					$mail = 0;
					if(isset($_POST["ok_connexion"])){
						$req = c_auth()->query("SELECT * FROM OM_mot_de_passe_oublie");
						if(!$req){
							echo "
								<div class='alert alert-danger'>
								  	<strong>Erreur de connexion!</strong><br>
								  	Erreur de connexion a la base de données <a href='".$path_web1."'>Retour à l'accueil</a>
								</div>
							";
						}else{

							$data = $req->fetchAll();
							if(!$data){
								echo "
									<div class='alert alert-danger'>
								  		<strong>Erreur de données!</strong><br>
								  		Aucune donnée trouvée <a href='".$path_web1."'>Retour à l'accueil</a>
									</div>
								";
							}else{
								foreach ($data as $key => $value) {
									if($_SESSION["mail"] == $value["email"] && $value["code"] == $_POST["code"] && $value["state"] ==1){
										echo "<script>document.location='modification du mot de passe.php'</script>";
										$statut = 0;
										break;
									}else{
										$statut = 2;
									}
								}
							}
							$req->closeCursor();
						}
					}
				?>
				<div>
					<?php
						if($statut == 2){
							echo "
								<div class='alert alert-danger'>
									Le code de réinitialisation est non reconnu
								</div>
							";
						}
					?>
				</div>
			</div>
		</form>
	</div>
	<?php require "../footer.php"; ?>
</body>
</html>