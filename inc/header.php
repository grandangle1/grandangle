<!DOCTYPE html>
<html>

<head>

	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- personnalisation du css -->
    <link rel="stylesheet" type="text/css" href="../css/custom.css">

    <!-- google font-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet"> 

</head>



<body>
	<header class="row">
        <div class="col-lg-12 text-center">
		  <h1 class="entete">Grand Angle <img src="../img/header/logo.png" id="logo"> Une experience unique!</h1> 
        </div>
	</header>
    <nav class="navbar navbar-expand-lg navbar-light bg-navbar">
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   			<span class="navbar-toggler-icon"></span>
  		</button>

  		<div class="collapse navbar-collapse" id="navbarSupportedContent">
    		<ul class="navbar-nav mr-auto">
     		 	<li class="nav-item active">
        			<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link btn btn-dark" href="#">Link</a>
      			</li>
      			<li class="nav-item">
        			<a class="nav-link" href="#">Disabled</a>
      			</li>
      			<li class="nav-item dropdown">
        			<a class="nav-link dropdown-toggle text-light" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          			Connexion
        			</a>
        			<div class="dropdown-menu" aria-labelledby="navbarDropdown">
          			<form method="post" id="form-login">
							<label for="login" class="connex">Identifiant</label><input type="text" name="login" id="login" maxlength="20" autofocus/>
							<label for="mdp" class="connex">Mot de passe</label><input type="password" name="mdp" id="mdp" maxlength="20" >
							<a href="#" id="misspass">Mot de passe oublié?</a>
							<input type="submit" name="valid-connexion" value="connexion" />
						</form>
        			</div>
      			</li>
    		</ul>
  		</div>
	</nav>
	 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>