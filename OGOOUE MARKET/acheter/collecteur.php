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
  	$_SESSION["path_racine"] = "http://localhost/SiteGeoCom";
	//$_SESSION["path_racine"] = "https://www.geocom-sarl.com";

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
	
	if(isset($_SESSION["user_id"])){
		if(isset($_GET["id_produit_OM_panier"])){
			echo "
						Id : ".$_SESSION["user_id"]."<br>
						Email : ".$_SESSION["user_mail"]."<br>
						Nom : ".$_SESSION["user_nom"]."<br>
						Prénom : ".$_SESSION["user_pre"]."<br>
						Tel : ".$_SESSION["user_tel"]."<br>
						
					";
			$req = c()->prepare("SELECT * FROM produit WHERE id=:a");
			$req->execute(array("a"=>$_GET["id_produit_OM_panier"]));
			$data = $req->fetchAll();
			foreach ($data as $key => $value) {
				if($_GET["id_produit_OM_panier"] == $value[0]){
					$req = c_auth()->prepare("INSERT INTO OM_panier VALUES(null,:a,:b,:c,:d,:e,:f,:g)");
					$req->execute(array(
						"a"=>"OM-45121", //identifiant application
						"b"=>$value["id"],//identifiant produit
						"c"=>$value["id_boutique"],//identifiant du marchand
						"d"=>$_SESSION["user_id"],//identifiant du client
						"e"=>$value["nom_produit"],//nom du produit
						"f"=>$value["prix"],//prix du produit
						"g"=>time(),//date d'enregistrement
					));
					echo "<script>document.location='index.php'</script>";
				}
			}

		}
	}else{
		echo "<script>document.location='../inscription/index.php?ttbwc=0'</script>";
	}
?>