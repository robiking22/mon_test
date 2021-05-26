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
	<title>Mot de passe oublié</title>
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
	<div class="col-lg-4 h-50" style="margin:auto;padding-top:100px">
		<form method="post" action="mot de passe oublie.php">
			<div class="row">
				<div class="col-lg-12"><input type="email" name="mail" class='form-control py-4 text-center' placeholder="Saisisez votre adresse mail" required><br></div>
			</div>
			<div class="row" style="padding-top: 20px">
				<div class="col-lg-12"><center><input type="submit" name="ok_connexion" class="btn btn-sm btn-primary px-5" value="Suivant"></center></div>
			</div>
			<br><br>
			<div>
				<?php
					$statut = 0;
					$mail = 0;
					if(isset($_POST["ok_connexion"])){
						$req = c_auth()->query("SELECT * FROM OM_user");
						if(!$req){
							echo "
								<div class='alert alert-danger'>
								  	<strong>Erreur de connexion!</strong><br>
								  	Erreur de connexion a la base de données<a href='inscription.php'>Veuillez créer un compte</a>
								</div>
							";
						}else{
							$data = $req->fetchAll();
							foreach ($data as $key => $value) {
								if($_POST["mail"] == $value["email"]){
									$req = c_auth()->prepare("UPDATE OM_mot_de_passe_oublie SET state=0 WHERE email=:a");
									$req->execute(array("a"=>trim($_POST["mail"])));
									$req = c_auth()->prepare("INSERT INTO OM_mot_de_passe_oublie VALUES(null,:a,:b,:c,:d)");
									$req->execute(array(
										"a"=>trim($_POST["mail"]),
										"b"=>"".rand(0,9)."".rand(0,9)."".rand(0,9)."".rand(0,9)."".rand(0,9)."".rand(0,9)."",
										"c"=>time(),
										"d"=>1
									));
									$req->closeCursor();
									$statut = 1;
									$_SESSION["mail"] = trim($_POST["mail"]);
									echo "<script>document.location='code de confirmation.php'</script>";
									break;
								}else{
									$statut = 2;
									$mail = $_POST["mail"];
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
									L’e-mail entré ne correspond à aucun compte. <a href='inscription.php'>Veuillez créer un compte ici</a>. [".$mail."]
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