<?php
require_once('verifier_access.php'); 
require_once("../classes/Produit.php");
$prod = new Produit($bdd);

$prod->supprimer((int)$_REQUEST['id']);
header("Location: produit_liste.php");
?>