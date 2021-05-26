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
	<title>Créer un compte</title>
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
	<div class="col-lg-4" style="margin:auto;padding-top:80px">
		
		<form method="post" action="central.php">
			<div class="row">
				<div class="col-lg-12">
					<p>
						<b style="font-size: 2em">Créer un compte</b><br>
						C’est rapide et facile - 
						<a href="index.php" >Se connecter maintenant</a>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-lg"><input type="text" name="nom" class="form-control" placeholder="nom" required><br></div>
				<div class="col-lg"><input type="text" name="pre" class="form-control" placeholder="Prénom" required><br></div>
				<div class="col-lg-12"><input type="tel" name="tel" class='form-control' placeholder="Numéro de téléphone" required><br></div><br>
			</div>
			<div class="row">
				<div class="col-lg-12"><input type="email" name="mail" class='form-control' placeholder="Adresse mail" required><br></div>
				<div class="col-lg"><input type="password" id='pwd' name="pwd" class='form-control' placeholder="Mot de passe" required><br></div>
				<div class="col-lg">
					<input type="password" name="pwd_c" id='pwd2' oninput='checking_box(this)' class='form-control' placeholder="Confirmer le mot de passe" required><br>
					<script type="text/javascript">
						function checking_box(a){
							var b = document.getElementById('pwd')
							var c = document.getElementById('ok_ins')
							if(a.value != b.value){
								a.style='border:solid 1px red'
								b.style='border:solid 1px red'
								c.style='border:solid 1px red'
								c.className='btn btn-sm btn-danger'
								c.disabled=true
							}else{
								a.style='border:solid 1px lime'
								b.style='border:solid 1px lime'
								c.className='btn btn-sm btn-success'
								c.style='border:none'
								c.disabled=false
							}
						}
					</script>
				</div>

				<div class="col-lg-12">
					<?php
						if(isset($_GET["error_ins"])){
							echo "
								<div class='alert alert-danger'>
								  	<strong>Erreur de saisi!</strong><br>
								  	Les mots de passses saisis ne correspondent pas.
								</div>
							";
						}
					?>
				</div>
				<div class="col-lg-12">
					<label class="form-check-label">
					    <input type="checkbox" name="condition" required>
					    Acceptez les conditions d'utilisations du site
				  	</label>
				</div>
			</div>
			<div class="row" style="padding-top: 20px">
				<div class="col-lg-12"><input type="submit" name="ok_ins" id="ok_ins" class="btn btn-sm btn-success" value="Inscription"></div>
			</div><br>
			<div class="col-lg-12">
				<?php
					if(isset($_GET["error_ins_com_exist"])){
						echo "
							<div class='alert alert-danger'>
							  	<strong>Erreur de création de compte!</strong><br>
							  	Une adresse mail simillaire existe déja veillez en créer une nouvelle.
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