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
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="jquery.localscroll.js" ></script>
	<script type="text/javascript" src="jquery.scrollTo.js"></script>
	<script type="text/javascript" src="galerie.js"></script>
	
	<!--[if lt IE 9]>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->      
    </head>
    <body onload=initialize()>
	<div id="head">	
	    <div id="galerie" onmouseover=clearIntval(); onmouseout=setIntval();>
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
			    <li><a href="index.php" class="non-actif">Accueil</a></li>
			    <li><a href="apropos.php" class="non-actif">A propos</a></li>
			    <li><a class="actif">Me contacter</a></li>
			</ul>
		    </div>	
		    <div id="bas-menu-mecontacter">
		    </div>
		</div>
	    </div>
	</div>        		
    </body>	
</html>  