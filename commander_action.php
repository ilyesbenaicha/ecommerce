<?php
require_once("./classes/Commande.php");
require_once("./classes/Util.php");

@$nom = $_POST['nom'];
@$prenomn = $_POST['prenom'];
@$id = $_POST['id'];
@$email = $_POST['email'];
@$adress = $_POST['adress'];


if( !empty($nom) && !empty($prenom)  && !empty($email) && !empty($adress)) 
{
	$cat = new Commande();
	$util = new Util();
	$cat->_nom = $nom;
	$cat->_prenom = $prenom;
	$cat->_email = $email;
	$cat->_email = $adress;
	
	if( empty($id) ) 	// Ajout
		$id = $cat->ajouter();
	else				// Modification
	{
		$cat->_id = $id;
		$cat->modifier();
	}

	header("Location: paiement.php");
} 
else 
	exit('Tous les champs sont obligatoires !!');
?>