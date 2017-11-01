<?php
require_once("../classes/Produit.php");
require_once("../classes/Util.php");

@$libelle = $_POST['libelle'];
@$description = $_POST['description'];
@$id = $_POST['id'];
@$prix=$_POST['prix'];
@$id_categorie=$_POST['id_categorie'];


if( !empty($libelle) && !empty($description) && !empty($prix)) 
{
	$prod = new Produit();
	$util = new Util();
	$prod->_libelle = $libelle;
	$prod->_description = $description;
	$prod->_image = $util->upload('image', "../upload");
	$prod->_prix=$prix;
	$prod->_id_categorie=$id_categorie;
	echo $id_categorie;
	if( empty($id) ) 	// Ajout
		$id = $prod->ajouter();
	else				// Modification
	{
		$prod->_id = $id;
		$prod->modifier();
	}

	header("Location: produit_liste.php");
} 
else 
	exit('Tous les champs sont obligatoires !!');
?>
