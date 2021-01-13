<!doctype html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Efrei'nnovation</title>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light mb-4 p-1 sticky-top">
		<a class="navbar-brand" href="index.php"><img id="logo" src="images/logo.png"></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
	
		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item">
					<a id="navigation" class="nav-link" href="index.php">Accueil</a>
				</li>
				<li class="nav-item">
					<a id="navigation" class="nav-link" href="innovation.php">Innovations</a>
				</li>
				<li class="nav-item">
					<a id="navigation" class="nav-link" href="contact.php">Contacts</a>
				</li>
				<li class="nav-item"></li>
				<a id="navigation" class="nav-link" href="compte.php">Mon compte</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="container text-center mb-5">
		<img src="./images/logo.png" alt="Logo">
		<form method="post" action="../controleurs/inscription.php" class="mt-4">
			<fieldset class="pt-4">
				<legend>Création de compte</legend>
				<div class="form-row">
					<div class="form-group col-md-6">
						<label for="login">Adresse mail</label>
						<input type="email" class="form-control" id="login" name="login" autocomplete="off"
							placeholder="Entrez ici votre adresse mail" value="" required>
					</div>
					<div class="form-group col-md-6">
						<label for="password">Password</label>
						<input type="password" class="form-control" id="password" name="mdp" autocomplete="off"
							placeholder="Entrez ici votre mot de passe" value="" required>
					</div>
					<div class="form-group col-md-6">
						<label for="nom">Nom</label>
						<input type="text" class="form-control" id="nom" name="nom" autocomplete="off"
							placeholder="Entrez ici votre nom" value="" required>
					</div>
					<div class="form-group col-md-6">
						<label for="prenom">Prénom</label>
						<input type="text" class="form-control" id="prenom" name="prenom" autocomplete="off"
							placeholder="Entrez ici votre prénom" value="" required>
					</div>
					<div class="form-check form-check-inline col-md-1">
						<input class="form-check-input" type="radio" id="etudiant" name="statut" value="0" required>
						<label class="form-check-label" for="etudiant">Étudiant</label>
					</div>
					<div class="form-check form-check-inline col-md-1">
						<input class="form-check-input" type="radio" id="enseignant" name="statut" value="1" required>
						<label class="form-check-label" for="enseignant">Enseignant</label>
					</div>
				</div>
				<button type="submit" class="btn btn-primary mt-4">S'inscrire</button>
			</fieldset>
		</form>
	</div>
	<footer class="fixed-bottom text-center">
		Site créé par Ancelet Paul, El Baied Sami, Guitton Georges, Lécuyer Alexis et Oubenami Nour-Eddine.
	</footer>
</body>
</html>