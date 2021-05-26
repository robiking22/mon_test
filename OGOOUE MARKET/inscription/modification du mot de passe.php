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
	<title>Modification du mot de passe</title>
	<?php require "../Param_head_page_web.php"; ?>
</head>
<body class="">		
	<?php
		/*
			ZONE DE GESTION DE LA BALISE ENTETE DU SITE
		 */
		require "../header2.php";
		if(!$_SESSION["mail"]){
			echo "<script>document.location='".$path_web1."'</script>";
		}
		/*
			FIN DE LA ZONE DE GESTION DE LA BALISE ENTETE DU SITE
		 */
	?>
	<div class="col-lg-8 py-5 h-75" style="margin:auto;">
		<form method="post" action="modification du mot de passe.php">
			<center><span>Créer un nouveau mot de passe pour l'adresse mail <?php echo "<a href='mailto:".$_SESSION["mail"]."'>".$_SESSION["mail"]."</a>"; ?></span></center><br>
			<div class="row">
				<script type="text/javascript">
					function checking_box(a){
						var b = document.getElementById('pwd0')
						var c = document.getElementById('ok_maj')
						if(a.value != b.value){
							a.style.border='solid 1px red'
							b.style.border='solid 1px red'
							c.style.border='solid 1px red'
							c.className='btn btn-sm btn-danger'
							c.disabled=true
						}else{
							a.style.border='solid 1px lime'
							b.style.border='solid 1px lime'
							c.className='btn btn-sm btn-success'
							c.style.border='none'
							c.disabled=false
						}
					}
				</script>
				<input type="text" id='pwd0' name="pwd0" class='form-control text-center' placeholder="Saisissez le nouveau mot de passe" required style='margin-bottom:1pc'>
				<input type="text" id='pwd1' name="pwd1" class='form-control text-center' placeholder="Confirmez le nouveau mot de passe" required style='margin-bottom:1pc' oninput='checking_box(this)'>
				<input type="submit" id="ok_maj" name="ok_connexion" class="btn btn-sm btn-primary w-100" value="Mise à jour de mot de passe">
			</div>

			<br><br>
			<div>
				<?php
					if(isset($_POST["ok_connexion"])){
						if($_POST["pwd0"] == $_POST["pwd1"]){
							$req = c_auth()->prepare("UPDATE OM_user SET password=:a WHERE email=:b");
							$req->execute(
								array(
									"a"=>$_POST["pwd0"],
									"b"=>$_SESSION["mail"],
									
								)
							);
							$req->closeCursor();
							$req = c_auth()->query("SELECT * FROM OM_user");
							$data = $req->fetchAll();
							foreach ($data as $key => $value) {
								if($_SESSION["mail"] == $value["email"]){
									$_SESSION["user_id"] = $value["id"];
									$_SESSION["user_mail"] = $value["email"];
									$_SESSION["user_nom"] = $value["user_name"];
									$_SESSION["user_pre"] = $value["user_pre"];
									$_SESSION["user_tel"] = $value["tel"];
									$_SESSION["user_pass"] = $value["password"];
									break;
								}
							}
							$req->closeCursor();
							echo "
								<div class='alert alert-success'>
									<center>
								  		<strong>Modification réussite</strong><br>
									  	Votre mot de passe a été modifier avec succès sur le lien pour accéder a votre compte. <a href='".$path_web1."/dashboard'>Mon compte</a>
									  	<center>
									  		<span class='bagde-success' id='time_out'>30</span>
									  	</center>
									  	<script>
									  		var a = 30
									  		setInterval(function(){
											  	a = a-1
											  	
											  	if(a == 1){
											  		document.location='".$path_web1."'
											  	}else{
											  		document.getElementById('time_out').innerText=a
											  	}
											},1000);
									  	</script>
									</center>
								</div>
							";
						}else{
							echo "<script>document.location='modification du mot de passe.php?error_maj'</script>";
						}
					}
					if(isset($_GET["error_maj"])){
						echo "
							<div class='alert alert-danger'>
							  	<strong>Erreur de saisi!</strong><br>
							  	Les mots de passses saisis ne correspondent pas.
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