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
<main class="container">
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
      <h1><?php echo $titre;?></h1>
      <p>Créée par : <?php echo $prenom; echo ' ';echo $nom; ?></p>
      <img src=<?php echo $image;?>>
      <p><?php echo $descriptionCourte;?></p>
      <p><?php echo $descriptionLongue;?></p>
      <p>Modifié pour la dernière fois le : <?php echo $dateModification;?></p>

      <a href="../controleurs/vote.php"><button type="button" name="vote" class="btn btn-outline-primary"><img src="images/pouce_vert.jpg" width=15px></button></a>
      <a href="../controleurs/annuler_vote.php"><button type="button" name="annuler" class="btn btn-outline-primary">Annuler mon vote</button></a>

      <h3>Commentaires</h3>

          <form method="post" action="../controleurs/creation_commentaire.php">
            <TEXTAREA name="txtCommentaire" rows=1 cols=70 placeholder="Entrez ici un commentaire pour cette innovation" required></TEXTAREA>
            <br/>
            <input type="submit" class="btn btn-outline-primary" value="Publier ce commentaire"/>
          </form>

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
</body>
<footer class="page-footer font-small postion-sticky">
    <div class="text-center py-3">
        <span id="footer">Site créé par Ancelet Paul, El Baied Sami, Guitton Georges, Lécuyer Alexis et Oubenami
            Nour-Eddine.</span>
    </div>
</footer>
</html>