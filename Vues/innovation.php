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
                $coBd = new bd("bdémocratie");
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
        <div class="card-deck" id="innovations">
            <div class="card mb-4">
                <img class="card-img-top" src="images/image-test.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Innovation 1</h5>
                    <p class="card-text">Courte description de l'innovation</p>
                </div>
            </div>
            <div class="card mb-4">
                <img class="card-img-top" src="images/image-test.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Innovation 2</h5>
                    <p class="card-text">Courte description de l'innovation</p>
                </div>
            </div>
            <div class="card mb-4">
                <img class="card-img-top" src="images/image-test.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Innovation 3</h5>
                    <p class="card-text">Courte description de l'innovation</p>
                </div>
            </div>
            <div class="card mb-4">
                <img class="card-img-top" src="images/image-test.png" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">Innovation 4</h5>
                    <p class="card-text">Courte description de l'innovation</p>
                </div>
            </div>
        </div>

    </main>
    
</body>
<footer class="page-footer font-small postion-sticky">
    <div class="text-center py-3">
        <span id="footer">Site créé par Ancelet Paul, El Baied Sami, Guitton Georges, Lécuyer Alexis et Oubenami
            Nour-Eddine.</span>
    </div>
</footer>




</html>