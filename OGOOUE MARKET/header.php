<?php
function afficheur_date($a,$b=1){
	$temps = getdate($a);
	if($temps["seconds"]<10)$temps["seconds"]="0".$temps["seconds"];
	if($temps["minutes"]<10)$temps["minutes"]="0".$temps["minutes"];
	if($temps["hours"]<10)$temps["hours"]="0".$temps["hours"];
	if($temps["mday"]<10)$temps["mday"]="0".$temps["mday"];
	if($temps["mon"]<10)$temps["mon"]="0".$temps["mon"];
	switch ($b) {
	  	case 0:
	    	return "".$temps["mday"]."/".$temps["mon"]."/".$temps["year"]." à ".$temps["hours"].":".$temps["minutes"].":".$temps["seconds"];
	    	break;
	  	case 1:
	    	return "".$temps["mday"]."/".$temps["mon"]."/".$temps["year"]."";
	  	case 2:
	    	$mois_en_lettre = array(null,"janvier","février","mars","avril","mai","juin","juillet","aout","septembre","octobre","novembre","décembre");
	    	$return_data_mois_en_lettre = $mois_en_lettre[$a];
	    	return $return_data_mois_en_lettre;
	}
}

?>
<style type="text/css">
	.header_no_fixed{
		width: 100%;
		z-index: 11;
		background: #ffffff44;
		color: #ffbd69;
		transition:background-color 1.5s,width 0s,z-index 1.5s,color 1.5s,;
	}.header_fixed{
		color: #ffbd69;
		position:fixed;
		top:0px;
		left:0px;
		width: 100%;
		z-index: 11;
		box-shadow: 0px 1px 20px #fff;
		transition:box-shadow 2s,background-color 1.5s;
	}
</style>
<div id="up_btn" class="bouton_no">
	<script type="text/javascript">
		function scrool_top(){
			document.body.scrollTo({
		    	top: 0,
		    	behavior: "smooth"
		  	})
  			//document.documentElement.scrollTop = 0;
		}

		$('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
		  	if (!$(this).next().hasClass('show')) {
		    	$(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
		  	}
		  	var $subMenu = $(this).next(".dropdown-menu");
		  	$subMenu.toggleClass('show');


		  	$(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
		    	$('.dropdown-submenu .show').removeClass("show");
		  	});
			return false;
		});
	</script>
	<a style="color:#fff;" onclick="scrool_top()">
		<?php
			echo "
				<svg xmlns='http://www.w3.org/2000/svg' width='28' height='28' fill='currentColor' class='bi bi-arrow-up-square-fill' viewBox='0 0 16 16'>
			  	<path d='M2 16a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2zm6.5-4.5V5.707l2.146 2.147a.5.5 0 0 0 .708-.708l-3-3a.5.5 0 0 0-.708 0l-3 3a.5.5 0 1 0 .708.708L7.5 5.707V11.5a.5.5 0 0 0 1 0z'/>
				</svg>
			";
		?>	
	</a >
</div>
<div class="col-12 col-lg-6" style="padding:0.5pc;margin:auto">
	<center>
		<?php
			echo "<a href='".$path_web1."'><img src='".$path_web1."/ressources/images/logo/logo10.png' style='height:50px;' class='rounded' alt='Ogooué Market'></a>";
		?>
	</center>
</div>

<header id="header" class="col-lg-12 border-bottom">
	<div class="row">
		<div class='col-sm'>
			<center>
				<?php
					echo "<a class='border-bottom btn btn-light py-0 mx-1 btn-sm' href='".$path_web1."'>Accueil</a>";
				?>
			</center>
		</div>
		<div class='col-sm'>
			<center>
				<?php
					echo "
						<form class='col-lg-6' method='post' action='".$path_web1."/index.php'>
							<input name='recherche' class='col-lg text-center py-0 border w-100 my-0' placeholder='Recherche un produit'/>
							<button class='btn py-0 border' style='display:none'>OK</button>
						</form>
					";
				?>
			</center>
		</div>
		<div class='col-sm'>
			<center>
				<?php
					if(isset($_SESSION["user_mail"])){
						echo "
							<a class='border-bottom btn btn-light py-0 mx-1 btn-sm' href='".$path_web1."/dashboard/'>".strtoupper($_SESSION["user_nom"])." ".ucfirst($_SESSION["user_pre"])."</a>
							<a class='border-bottom btn btn-light py-0 mx-1 btn-sm' href='".$path_web1."/panier/'>
								Mon panier
							</a>
							<a class='border-bottom btn btn-light py-0 mx-1 btn-sm' href='".$path_web1."/index.php?quit'>Déconnexion</a>		
						";
					}else{
						echo "<a class='border-bottom btn btn-light py-0 mx-1 btn-sm' href='".$path_web1."/inscription/'>Connexion</a>";
					}
					if(isset($_GET["quit"])){
						session_destroy();
						echo "<script>document.location='".$path_web1."'</script>";
					}
				?>
			</center>
		</div>

	</div>
</header>



