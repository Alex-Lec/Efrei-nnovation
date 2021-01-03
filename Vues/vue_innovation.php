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
<main class="container mb-5">
<?php   
    $numInnovation=$_SESSION["numInnovationSelect"];
    $coBd = new bd("efreinnovation");
    $co = $coBd->connexion();
    $result=mysqli_query($co,"SELECT * FROM innovation WHERE idInnovation='$numInnovation'") or die("Erreur requete");
    while($donnees = mysqli_fetch_assoc($result))
    {
        $titre=$donnees["titre"];
        $descriptionCourte=$donnees["descriptionCourte"];
        $descriptionLongue=$donnees["descriptionLongue"];
        $dateModification=$donnees["dateModification"];
        $image=$donnees["image"];
        $createur=$donnees["createur"];
    }

    $result2=mysqli_query($co,"SELECT nom,prenom FROM utilisateur WHERE numUtilisateur='$createur'") or die("Erreur requete 2");
    while($donnees = mysqli_fetch_assoc($result2))
    {
        $nom=$donnees["nom"];
        $prenom=$donnees["prenom"];
    }
?>
      <div class="text-center">
        <h1><?php echo $titre;?></h1>
        <p>Créée par : <?php echo $prenom; echo ' ';echo $nom; ?></p>
        <img src=<?php echo $image;?> class="img-innov">
        <p><?php echo $descriptionCourte;?></p>
        <p><?php echo $descriptionLongue;?></p>
        <p>Modifié pour la dernière fois le : <?php echo $dateModification;?></p>

        <a href="../controleurs/vote.php"><button type="button" name="vote" class="btn btn-outline-primary btn-like">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#007BFF" class="bi bi-hand-thumbs-up" viewBox="0 0 16 16">
            <path d="M8.864.046C7.908-.193 7.02.53 6.956 1.466c-.072 1.051-.23 2.016-.428 2.59-.125.36-.479 1.013-1.04 1.639-.557.623-1.282 1.178-2.131 1.41C2.685 7.288 2 7.87 2 8.72v4.001c0 .845.682 1.464 1.448 1.545 1.07.114 1.564.415 2.068.723l.048.03c.272.165.578.348.97.484.397.136.861.217 1.466.217h3.5c.937 0 1.599-.477 1.934-1.064a1.86 1.86 0 0 0 .254-.912c0-.152-.023-.312-.077-.464.201-.263.38-.578.488-.901.11-.33.172-.762.004-1.149.069-.13.12-.269.159-.403.077-.27.113-.568.113-.857 0-.288-.036-.585-.113-.856a2.144 2.144 0 0 0-.138-.362 1.9 1.9 0 0 0 .234-1.734c-.206-.592-.682-1.1-1.2-1.272-.847-.282-1.803-.276-2.516-.211a9.84 9.84 0 0 0-.443.05 9.365 9.365 0 0 0-.062-4.509A1.38 1.38 0 0 0 9.125.111L8.864.046zM11.5 14.721H8c-.51 0-.863-.069-1.14-.164-.281-.097-.506-.228-.776-.393l-.04-.024c-.555-.339-1.198-.731-2.49-.868-.333-.036-.554-.29-.554-.55V8.72c0-.254.226-.543.62-.65 1.095-.3 1.977-.996 2.614-1.708.635-.71 1.064-1.475 1.238-1.978.243-.7.407-1.768.482-2.85.025-.362.36-.594.667-.518l.262.066c.16.04.258.143.288.255a8.34 8.34 0 0 1-.145 4.725.5.5 0 0 0 .595.644l.003-.001.014-.003.058-.014a8.908 8.908 0 0 1 1.036-.157c.663-.06 1.457-.054 2.11.164.175.058.45.3.57.65.107.308.087.67-.266 1.022l-.353.353.353.354c.043.043.105.141.154.315.048.167.075.37.075.581 0 .212-.027.414-.075.582-.05.174-.111.272-.154.315l-.353.353.353.354c.047.047.109.177.005.488a2.224 2.224 0 0 1-.505.805l-.353.353.353.354c.006.005.041.05.041.17a.866.866 0 0 1-.121.416c-.165.288-.503.56-1.066.56z"/>
          </svg>
        </button></a>
        <a href="../controleurs/annuler_vote.php"><button type="button" name="annuler" class="btn btn-outline-primary">Annuler mon vote</button></a>

        <h3 class="mb-3 mt-3">Commentaires</h3>

        <form method="post" action="../controleurs/creation_commentaire.php">
        <div class="form-group col-md-6 mx-auto">
          <textarea class="form-control" name="txtCommentaire" rows=2 cols=70 placeholder="Entrez ici un commentaire pour cette innovation" required></textarea>
        </div>
        
        <input type="submit" class="btn btn-outline-primary" value="Publier ce commentaire"/>
        </form>
      </div>

      <?php
      $result3=mysqli_query($co,"SELECT * FROM commentaire WHERE innovation='$numInnovation'") or die("Erreur requete 10");
      while($donnees = mysqli_fetch_assoc($result3))
      {
        $numCommentaire=$donnees["idCommentaire"];
        $txtCommentaire=$donnees["texte"];
        $date=$donnees["date"];

        $result4=mysqli_query($co,"SELECT nom,prenom FROM commentaire,utilisateur WHERE commentaire.createur=utilisateur.numUtilisateur AND innovation='$numInnovation' AND idCommentaire='$numCommentaire'") or die("Erreur requete 11");

        ?>
        <div class="card-deck" id="innovations">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $prenom ,"  ",$nom; ?></h5>
                    <p class="card-text"><?php echo $txtCommentaire ?></p>
                    <p class="card-text"><?php echo $date ?></p>
                </div>
            </div>
        </div>
    <?php
      }
    ?>

</main>
<footer class="fixed-bottom text-center">
      Site créé par Ancelet Paul, El Baied Sami, Guitton Georges, Lécuyer Alexis et Oubenami Nour-Eddine.
</footer>
</body>
</html>