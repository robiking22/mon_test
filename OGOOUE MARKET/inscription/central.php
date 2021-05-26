<?php
	session_start();	
	function c(){
    	try{$bdd = new PDO('mysql:host=91.216.107.183;dbname=ciate1497620','ciate1497620','aon13mfu1r');return $bdd;}
    	catch(Exception $e){die('Erreur : '.$e->getMessage());};
  	}

  	//zone de gestion de la connexion des utlisateurs
	if(isset($_POST["ok_connexion"])){
		$req = c()->query("SELECT * FROM OM_user");
		$descripteur = 0;
		if(!$req){
			echo "Les données recherchées sont inexistante";
			echo "<script>document.location='index.php?error_con=0;error_bd'</script>";
		}else{
			$data = $req->fetchAll();
			if(!$data){
				echo "[Les données recherchées n'existe pas dans la base de données]";
				echo "<script>document.location='index.php?error_con'</script>";	
			}else{
				foreach ($data as $key => $value) {
					if($_POST["mail"] == $value["email"]){
						if($_POST["pwd"] == $value["password"]){
							//echo "oui<br>";
							$_SESSION["user_id"] = $value["id"];
							$_SESSION["user_mail"] = $value["email"];
							$_SESSION["user_nom"] = $value["user_name"];
							$_SESSION["user_pre"] = $value["user_pre"];
							$_SESSION["user_tel"] = $value["tel"];
							$_SESSION["user_pass"] = $value["password"];
							//echo $_SESSION["user_id"]."<br>";
							//echo $_SESSION["user_mail"]."<br>";
							echo "<script>document.location='../index.php'</script>";
							$descripteur = 1;
							break;
						}else{
							$descripteur = 0;
							//echo "<script>document.location='index.php?error_con'</script>";
							break;
						}
					}else{
						$descripteur = 0;
					}
				}
				$req->closeCursor();
				if($descripteur == 0){
					echo "<script>document.location='index.php?error_con'</script>";
				}
			}
			
		}
	}else{
		//echo "<script>document.location='index.php?error_con'</script>";
	}

	//zone de gestion des inscription des utlisateurs
	if(isset($_POST["ok_ins"])){
		if($_POST["pwd"] != $_POST["pwd_c"]){
			echo "".$_POST["pwd"]." = ".$_POST["pwd_c"]."<br>";
			//echo "<script>document.location='inscription.php?error_ins'</script>";
		}else{
			$statut_mail = 1;
			$req = c()->query("SELECT * FROM OM_user");
			while ($d = $req->fetch()) {
				if($d["email"] == $_POST["mail"]){
					$statut_mail = 0;
					//echo "mal<br>";
					break;
				}else{
					$statut_mail = 1;
					//echo "bien<br>";
				}
			}
			$req->closeCursor();

			if($statut_mail == 1){
				$req = c()->prepare("INSERT INTO OM_user VALUES(null,:a,:b,:c,:d,:e)");
				$req->execute(array(
					"a"=>trim($_POST["nom"]),
					"b"=>trim($_POST["pre"]),
					"c"=>trim($_POST["mail"]),
					"d"=>trim($_POST["pwd"]),
					"e"=>trim($_POST["tel"])
				));
				$req->closeCursor();

				$req = c()->query("SELECT MAX(id)'id' FROM OM_user");
				$data = $req->fetch();				
				$_SESSION["user_id"] = $data["id"];	
				$_SESSION["user_mail"] = $_POST["mail"];
				$_SESSION["user_nom"] = $_POST["nom"];
				$_SESSION["user_pre"] = $_POST["pre"];
				$_SESSION["user_tel"] = $_POST["tel"];
				$_SESSION["user_pass"] = $_POST["pwd"];
				$req->closeCursor();
				echo "<script>document.location='../index.php'</script>";
				
			}else{
				echo "<script>document.location='inscription.php?error_ins_com_exist'</script>";
			}

		}
		
	}	
?>