<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Affable Beans</title>
</head><!--/head-->

<body>
	<?php require_once("header.php") ?>
	
	<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
					<li><a href="index.php">Home</a></li>
					<li class="active">Commander</li>
				</ol>
			</div><!--/breadcrums-->

			<div class="step-one">
				<h2 class="heading">Valider ma commande / Mes coordonnées</h2>
			</div>

			<section id="form"><!--form-->
				<div class="container">
					<div class="row">

						<div class="col-sm-12">
							<div class="signup-form"><!--sign up form-->
								<h2>Créer un nouveau compte</h2>
								<form action="commander_action.php">
									<input type="text" placeholder="Votre nom " name='nom' id='nom'/>
									<input type="text" placeholder="Votre prénom" name='prenom' id='prenom'/>
									<input type="email" placeholder="Email Address" name='email' id='email'/>
									<input type="text" placeholder="Adresse" name='adress' id='adress'/>
									<button type="submit" class="btn btn-default">
										Paiement 
									</button>
								</form>
								<p></p>
							</div><!--/sign up form-->
						</div>
					</div>
				</div>
			</section><!--/form-->

		</div>
	</section> <!--/#cart_items-->
	
	<?php require_once("footer.php") ?>
</body>
</html>