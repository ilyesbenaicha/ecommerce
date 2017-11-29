<?php 
require_once('header.php');
require_once("verifier_access.php");
require_once("../classes/Produit.php");

require_once("../classes/Commande.php");
$id_page = "dashboard";
$i=0;
$x=0;
$y=0;
$prod = new Produit();
$cmd = new Commande();
//$pro = new Promo();  
$liste = $prod->liste();
//$lp =$pro->liste();
$lc=$cmd->liste();
foreach($liste as $data ){ $i++;}
//foreach ($lp as $key => $value) {$x++;}
foreach ($lc as $key => $value) {$y++;}
?>
<!DOCTYPE html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>The Affable Beans - Admin</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="container2">
      <h1><span class="glyphicon glyphicon-dashboard"> </span> Dashboard</h1>
    </div>

    <div class="jumbotron">   
        
        Nombre des commandes :<?php echo $y ?> <br/>
        Nombre des produits :<?php echo $i ?><br/>
        
    </div>

<hr>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.js"></script>

    </body>
</html>
