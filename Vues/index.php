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

    <div class="container text-center mt-5">
        <p id="innovSemaine">Innovations de la semaine</p>
        <?php
            $result=mysqli_query($co,"SELECT idInnovation, titre, image, descriptionCourte, count(innovation) from vote, innovation WHERE vote.innovation=innovation.idInnovation GROUP BY innovation LIMIT 3") or die("Erreur requete");
            while($donnees = mysqli_fetch_assoc($result))
            {
                $idInnovation=$donnees["idInnovation"];
                $titre=$donnees["titre"];
                $image=$donnees["image"];
                $descriptionCourte=$donnees["descriptionCourte"];
            ?>
            <div class="d-inline-block">
                <div>
                    <div class="card .h-100" id="card-accueil">
                        <img class="card-img-top embed-responsive embed-responsive-16by9" src="<?php echo $image ?>" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $titre ?></h5>
                            <p class="card-text"><?php echo $descriptionCourte ?></p>
                            <form method="post" action="../Controleurs/session_innovation.php">
                                <input type="hidden" name="numInnovationSelect" value="<?php echo $idInnovation;?>">
                                <input type="submit" class="btn btn-primary" value="Consulter">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
            }
            ?>
    </div>

</body>
<footer class="page-footer font-small fixed-bottom">
    <div class="text-center py-3">
        <span id="footer">Site créé par Ancelet Paul, El Baied Sami, Guitton Georges, Lécuyer Alexis et Oubenami Nour-Eddine.</span>
    </div>
</footer>



</html>