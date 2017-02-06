
<?php

        
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=db-mobile', 'root', '');
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
	
	if (isset($_POST['identite']) AND isset($_POST['adresse'])){
		$requete = 'INSERT INTO personne(nom,adresse) VALUES(\''.$_POST['identite'].'\', \''.$_POST['adresse'].'\')';
		$bdd->exec($requete);
		echo '<script>alert("yohohoho");</script>';
	}
        
        header('Location: index.php#liste');   
?>