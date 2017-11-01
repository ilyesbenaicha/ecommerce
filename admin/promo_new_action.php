<?php
require_once("../classes/Promo.php");
require_once("../classes/Util.php");

@$titre = $_POST['titre'];
@$code = $_POST['code'];
@$id = $_POST['id'];
@$d_debut = $_POST['d_debut'];
@$d_fin = $_POST['d_fin'];

if( !empty($titre) && !empty($code) ) 
{
	$pro = new Promo();
	$util = new Util();
	$pro->_titre = $titre;
	$pro->_code = $code;
	$pro->_d_debut = $d_debut;
	$pro->_d_fin = $d_fin;
	if( empty($id) ) 	// Ajout
		$id = $pro->ajouter();
	else				// Modification
	{
		$pro->_id = $id;
		$pro->modifier();
	}

	header("Location: promos.php");
} 
else 
	exit('Tous les champs sont obligatoires !!');
?>