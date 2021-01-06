<!doctype html>
<html lang="fr">
  <?php
    session_start();
    require_once("../modeles/bd.php");
    require_once("../modeles/utilisateur.php");
    ?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="style.css">
    <title>Efrei'nnovation</title>
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
        <?php
          $coBd = new bd("efreinnovation");
          $co = $coBd->connexion();
          $numUtilisateurCo = isset($_SESSION["numUtilisateur"]) ? $_SESSION["numUtilisateur"] : NULL ;
          if(isset($numUtilisateurCo))
          {
              $buttonName = "Déconnexion";
              $buttonHeading = "../Controleurs/deconnexion.php";
          }
          else
          {
              $buttonName = "Connexion";
              $buttonHeading = "connexion.html";
          }
          ?>
        <a href="<?php echo $buttonHeading ?>"><button type="button" class="btn" id="connecter"><?php echo $buttonName ?></button></a>
      </div>
    </nav>
		</header>
		<div class="text-center">
			<?php
                $idInnovation=$_POST["numInnovationSelect"];
                $titre=$_POST["titre"];
                $image=$_POST["image"];
                $descriptionCourte=$_POST["descriptionCourte"];
                $descriptionLongue=$_POST["descriptionLongue"];
                $fini=$_POST["fini"];
                echo $idInnovation;
                echo $titre;
                echo $descriptionCourte;
                echo $descriptionLongue;
                echo $fini;
			?>
		</div>
			
    <main class="container form-innovation mb-5"> 
		  <h2 class="text-center">Création d'une innovation</h2>
			<form method="post" action="../controleurs/update_innovation.php">
        <input type="hidden" name="idInnovation" value="<?php echo $idInnovation;?>">
				<div class="form-group">
					<label for="titre">Titre de l'innovation :</label>
					<input type="text" name="titre" id="titre" class="form-control" value="<?php echo $titre ?>" required/>
				</div>
				<div class="form-group">
					<label for="titre">Description courte de l'innovation :</label>
					<textarea class="form-control" name="descriptionCourte" id="descriptionCourte" rows=2 value="" required><?php echo $descriptionCourte ?></textarea>
				</div>
				<div class="form-group">
					<label for="titre">Description longue de l'innovation :</label>
					<textarea class="form-control" name="descriptionLongue" id="descriptionLongue" rows=6 value="" required><?php echo $descriptionLongue ?></textarea>
				</div>
        <div class="form-group">
					<label for="image">Entrez le lien de l'image :</label>
					<input type="text" name="image" id="image" class="form-control" value="<?php echo $image ?>" required/>
				</div>
        <div class="form-group">
					<label for="fini">Cochez la case si vous avez fini le projet :</label>
          <input type="checkbox" name="fini" id="fini" class="form-control" value="" <?php if($fini == 1) {echo "checked";}?>/>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-outline-primary form-control" value="Soumettre l'innovation" class="text-center"/>
				</div>
			</form>
		</main>
		<footer class="fixed-bottom text-center">
      Site créé par Ancelet Paul, El Baied Sami, Guitton Georges, Lécuyer Alexis et Oubenami Nour-Eddine.
  	</footer>
  </body>
</html>

