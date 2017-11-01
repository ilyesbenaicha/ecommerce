<?php
require_once('verifier_access.php'); 
require_once("../classes/Promo.php");
$pro = new Promo($bdd);

$pro->supprimer((int)$_REQUEST['id']);
header("Location:promos.php");
?>