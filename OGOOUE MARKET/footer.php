
<footer class='col-lg-12 bg-dark text-light py-2' style='margin:auto;'>
<?php
	
	$req = c()->query("SELECT COUNT(id)'nombre_produit' FROM OM_produit");
	$data = $req->fetch();
				
	echo "
	<div class='row p-3'>
		
		<div class='col-lg-12' style='background:#00000044'>
			<div id='about' class='carousel slide h-100' data-ride='carousel'>
			  	<div class='carousel-inner'>
			  		<center>
				  		<div 'class='carousel-item active'>
							<a href='#'><img src='".$path_web1."/pub/crypto/1.jpg' style='max-width:30%'/></a>
				  			<a href='#'><img src='".$path_web1."/pub/crypto/2.jpg' style='max-width:30%'/></a>
				  			<a href='#'><img src='".$path_web1."/pub/crypto/3.jpg' style='max-width:30%'/></a>
				  		</div>
				  	</center>
				</div>
			</div>
		</div>
	</div>
	<div class='row p-3'>
		<div class='col-lg'>
			<b>Plus de</b><br>
			".$data['nombre_produit']." produits <br>vous attendent
		</div>
		<div class='col-lg'>
			<b>Catégories produits</b> 
			
		</div>
		<div class='col-lg'>
			<b>Recherche rapide</b>
			
		</div>
		<div class='col-lg'>
			<b>Partenaires</b><br>
			<a class='btn-sm py-0 text-light' href=''>Mega Vente Acte I</a><br>
			<a class='btn-sm py-0 text-light' href=''>Mega Vente Acte II</a><br>
		</div>
		<div class='col-lg'>
			<center>
			<b>Ogooue Market</b>
			<div class='card bg-dark col-sm py-3' style='border:none'>
				<img src='".$path_web1."/ressources/images/logo/77.png'class='w-25 rounded' style='margin:auto;'>
				<div class='card-body'>
					<a href='tel:+24174854899' class='btn btn-sm btn-outline-light rounded'>
						<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-phone-fill' viewBox='0 0 16 16'>
				  			<path d='M3 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V2zm6 11a1 1 0 1 0-2 0 1 1 0 0 0 2 0z'/>
						</svg>
					</a>
					<a href='tel:+24162081617' class='btn btn-sm btn-outline-light rounded'>
						<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-phone-fill' viewBox='0 0 16 16'>
				  			<path d='M3 2a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V2zm6 11a1 1 0 1 0-2 0 1 1 0 0 0 2 0z'/>
						</svg>
					</a>
					<a href='mailto:sgeocom@gmail.com ' class='btn btn-sm btn-outline-light rounded'>
						<svg xmlns='http://www.w3.org/2000/svg' width='24' height='24' fill='currentColor' class='bi bi-envelope' viewBox='0 0 16 16'>
				  			<path d='M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1H2zm13 2.383l-4.758 2.855L15 11.114v-5.73zm-.034 6.878L9.271 8.82 8 9.583 6.728 8.82l-5.694 3.44A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.739zM1 11.114l4.758-2.876L1 5.383v5.73z'/>
						</svg>
					</a>	
				</div>
			</div>
			</center>
		</div>
	</div>
	<div class='col-lg py-3'>
		<center>	
			<a href='#' style='color:#fff;text-decoration:none'>
				<svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-facebook' viewBox='0 0 16 16'>
					<path d='M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z'/>
				</svg>
			</a>
			
			<a href='#' style='color:#fff;text-decoration:none'>
				<svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-twitter' viewBox='0 0 16 16'>
				  	<path d='M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z'/>
				</svg>
			</a>
			<a href='#' style='color:#fff;text-decoration:none'>
				<svg xmlns='http://www.w3.org/2000/svg' width='32' height='32' fill='currentColor' class='bi bi-linkedin' viewBox='0 0 16 16'>
					<path d='M0 1.146C0 .513.526 0 1.175 0h13.65C15.474 0 16 .513 16 1.146v13.708c0 .633-.526 1.146-1.175 1.146H1.175C.526 16 0 15.487 0 14.854V1.146zm4.943 12.248V6.169H2.542v7.225h2.401zm-1.2-8.212c.837 0 1.358-.554 1.358-1.248-.015-.709-.52-1.248-1.342-1.248-.822 0-1.359.54-1.359 1.248 0 .694.521 1.248 1.327 1.248h.016zm4.908 8.212V9.359c0-.216.016-.432.08-.586.173-.431.568-.878 1.232-.878.869 0 1.216.662 1.216 1.634v3.865h2.401V9.25c0-2.22-1.184-3.252-2.764-3.252-1.274 0-1.845.7-2.165 1.193v.025h-.016a5.54 5.54 0 0 1 .016-.025V6.169h-2.4c.03.678 0 7.225 0 7.225h2.4z'/>
				</svg>
			</a>
		</center>
	</div>
	";
?>
</footer>
