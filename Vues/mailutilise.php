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
    <main class="mb-5">
        <div class="text-center">
            <p>Mail deja utilisé, cliquez sur le bouton ci-dessous pour retourner à la page d'inscription<p>
            <button class="btn btn-primary" onclick="window.location.href='../Vues/inscription.php';">Retour</button>
        </div>
        </main>

<footer class="fixed-bottom text-center">
      Site créé par Ancelet Paul, El Baied Sami, Guitton Georges, Lécuyer Alexis et Oubenami Nour-Eddine.
  	</footer>
</body>
</html>
