<?php
		
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=db-mobile', 'root', '');
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
	
?>


<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<link rel="stylesheet" href="reset.css" />
      		<link rel="stylesheet" href="style-propre.css" />		
      	 	<title>Mon Mobile</title>
		
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
		<script src="http://code.jquery.com/jquery-1.4.4.min.js" type="text/javascript"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript">
		<script type="text/javascript" src="jquery.localscroll.js" ></script>
		<script type="text/javascript" src="jquery.scrollTo.js"></script>
		<script type="text/javascript" src="galerie.js"></script>
		<script type="text/javascript" src="geolocalisation.js"></script>
		
		<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		 <![endif]-->
		 
		
		
		<script type="text/javascript">
			
			
		// METHODES			
			
			// GEOLOCALISATION
			
			
			var geocoder;
			var map;
			var infowindow = new google.maps.InfoWindow();
			var marker;
			  
			function initialisation() {
				geocoder = new google.maps.Geocoder();
				var latlng = new google.maps.LatLng(48.858503,2.294641);
				var myOptions = {
					zoom: 13,
					center: latlng,
					mapTypeId: google.maps.MapTypeId.ROADMAP
				}
				
				map = new google.maps.Map(document.getElementById("map"), myOptions);
				
				
				
				<?php
					$reponse = $bdd->query('SELECT * FROM personne');
					$combien = 1;
					while ($donnees = $reponse->fetch()){
									
				?>
				
				var address = $('#liste-adr span:eq(<?php echo $combien ?>)').html();
				geocoder.geocode( { 'address': address}, function(results, status) {
				    if (status == google.maps.GeocoderStatus.OK) {
					latlng = results[0].geometry.location;
					marker = new google.maps.Marker({
						position: latlng,
						map: map
					});
					map.panTo(latlng);
				    }
				});
				
				<?php
						$combien = $combien + 2;
					}
					$reponse->closeCursor();
				?>	
				
				function affichePosition(position) {
					var pos = position.coords;
					$("#latitude").val(pos.latitude);
					$("#longitude").val(pos.longitude);
				}
				navigator.geolocation.getCurrentPosition(affichePosition);			
			}			
			
		</script>

	</head>
	<body onload=initialisation()>
		<div id="head">	
			<div id="galerie" onmouseover=clearIntval(); onmouseout=setIntval()>
				<div id="images">
					<ul>						
						<li><img src="images/header-mobile.jpg" id="image1" /></li>
						<li><img src="images/header-mobile2.jpg" id="image2" /></li>
						<li><img src="images/header-mobile3.jpg" id="image3" /></li>
					</ul>
				</div>
				<div id="puces">
					<ul>
						<li><a onclick=changer1();><div id="puce1"></div></a></li>
						<li><a onclick=changer2();><div id="puce2"></div></a></li>
						<li><a onclick=changer3();><div id="puce3"></div></a></li>
					</ul>
				</div>				
			</div>
			<div id="ligne-centre">
				<div id="logo">
				</div>
				<div id="menu">
					<div id="haut-menu">
						<ul>
							<li><a class="actif">Accueil</a></li>
							<li><a href="apropos.php" class="non-actif">A propos</a></li>
							<li><a href="mecontacter.php" class="non-actif">Me contacter</a></li>
						</ul>
					</div>	
					<div id="bas-menu-accueil">
					</div>
				</div>
			</div>
		</div>	
		<div id="body">
			<div id="presentation">
				<p>	
					Objectif de ce site :
					<span>
						</br>
						Ce site est un test d'int&eacute;gration. </br>
						Quaestione igitur per multiplices dilatata fortunas cum ambigerentur quaedam,
						non nulla levius actitata constaret, post multorum clades Apollinares ambo
						pater et filius in exilium acti cum ad locum Crateras nomine pervenissent,
						villam scilicet suam quae ab Antiochia vicensimo et quarto disiungitur lapide,
						ut mandatum est, fractis cruribus occiduntur.
					</span>
				</p>
				
				
			</div>
			<div id="modules">
				<div id="formulaire">
					
					<form method="post" name="formulaire" action="ajout.php">
						<div id="form-titre">
							<p class="titre-module">Formulaire</p>
						</div>
						<div id="identite">
							<p class="cont-module">Identit&eacute;</p>
							<input type="text" name="identite"  class="input-form"/>
						</div>
						<div id="adresse">
							<p class="cont-module">Adresse</p>
							<input id="geoadr" type="text" name="adresse" class="input-form" />
						</div>
						
						<input type="hidden" name="latitude" id="latitude" value=""/>
						<input type="hidden" name="longitude" id="longitude" value=""/>
						<a id="effacer" onclick=document.formulaire.reset(); ><span>Effacer</span></a>
						<a id="ajouter"  onclick=document.formulaire.submit(); ><span>Ajouter</span></a>
						<a id="mire" onclick=adresseLatLng();></a>
					</form>
					
					
					
				</div>
				
				<div id="liste">
					<div id="liste-titre">
						<p class="titre-module">Liste<p>
					</div>
					<div id="liste-adr">
						<div>
							<ul>
								<?php
								$reponse = $bdd->query('SELECT * FROM personne');
								$combien = 0;
								while ($donnees = $reponse->fetch()){
									$combien++;
								?>
								<li>
									<div class="rectangle">
										<div>
											<span class="nom"><?php echo $donnees['nom']; ?> :</span>
											<span class="adr"> <?php echo $donnees['adresse']; ?></span>
										</div>
										<a class="croix" onclick=document.<?php echo 'form'.$donnees['id'] ?>.submit();>
											<form method="post" name="<?php echo 'form'.$donnees['id'] ?>" action="retrait.php">
												<input type="hidden" value="<?php echo $donnees['id'] ?>" name="id">
											</form>
										</a>
									</div>
									<div class="espace">
									</div>
								</li>
								
								<?php
								}
								$reponse->closeCursor();
								?>
							</ul>
						</div>
						<div id="compteur"><p id="total">Total entr&eacutee :</p><p id="nb"><?php echo $combien; ?></p></div>
					</div>
				</div>
				<div id="gmap">
					<div id="map-titre">
						<p class="titre-module">Carte<p>
					</div>
					<div id="map" style="width:250px; height:124px">
					</div>
				</div>
			</div>	
			
			
			
		</div>
		
	</body>	

</html>