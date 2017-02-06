<?php
	try
	{
		$bdd = new PDO('mysql:host=localhost;dbname=db-mobile', 'root', '');
	}
	catch (Exception $e)
	{
		die('Erreur : ' . $e->getMessage());
	}
	
	
	if (isset($_POST['id'])){
		$requete = 'DELETE FROM personne WHERE id='.$_POST['id'];
		$bdd->exec($requete);
	}
        
	
        header('Location: index.php#liste');   
?>