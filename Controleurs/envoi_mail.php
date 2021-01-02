<!doctype html>
<html lang="fr">

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

<?php
$email_subject=$_POST["objet"];
$email_message=$_POST["corps"];
?>
<body style="text-align:center;">
<button class="btn btn-primary" onclick="window.location.href='mailto:grossepoubelle225@gmail.com?subject=<?php echo $email_subject?> &body=<?php echo $email_message ?>'">Confirmer</a>

<button class="btn btn-primary" onclick="window.location.href='../Vues/index.php'">Retourner à la page d'accueil</button>
</body>
</html>
