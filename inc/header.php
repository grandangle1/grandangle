<?php require_once 'bootstrap.php' ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Barre de navigation</title>

	<!--feuille de style-->
	<link rel="stylesheet" type="text/css" href="../css/style.css">

	<!-- google font-->
	<link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet"> 

</head>
<body>
	<p id="php">
		<?php if(Session::getInstance()->hasFlash()):  ?>

			<?php foreach (Session::getInstance()->getFlash() as $type => $message): ?>
				
				<p class="<?= $type ?>">
					<?= $message ?>
				</p>
				
			<?php endforeach; ?>
		<?php endif; ?>
	</p>
	<header>
		<div class="entete">
			<h1>Grand Angle</h1> 
			<img src="../img/header/logo.png" id="logo">
			<h1>Une experience unique!</h1>
		</div>
	</header>
	<nav>
		<div id="navigation">
			<ul id="nav">
				<li class="onglet"><a href="index.php">ACCUEIL</a></li>
				<li class="onglet"><a href="#">CALENDRIER</a></li>
				<li class="onglet"><a href="#">ACTUELLEMENT</a></li>
				<li class="onglet"><a href="admin.php">ADMINISTRATEUR</a></li>
				<?php if(!Session::getInstance()->read('auth')): ?>
					<li id="connexion"><a href="#">CONNEXION</a>
				<?php else: ?>
					<a id="connexion" href="../php/logout.php">Vous deconnecter</a>
				<?php endif; ?>
				<?php if(!Session::getInstance()->read('auth')): ?>
					<div id="container-connex">
						<form method="post" id="form-login">
							
								<label for="login" class="connex">Identifiant</label><input type="text" name="identifiant" maxlength="20" autofocus/>
								<label for="mdp" class="connex">Mot de passe</label><input type="password" name="password" id="mdp" maxlength="20" >
								<a href="#" id="forget-password">Mot de passe oublié?</a>
								<input type="submit" name="valid-connexion" value="connexion" />	
						</form>
						<?php endif; ?>
					</div>
				</li>
			</ul>
		</div>
	</nav>
<?php if(!Session::getInstance()->read('auth')): ?>
	<script type="text/javascript" src="../js/menuOffline.js"></script>
<?php else: ?>
	<script type="text/javascript" src="../js/menuLogged.js"></script>
<?php endif; ?>
