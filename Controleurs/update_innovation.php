<?php
    require_once('../modeles/bd.php');
    require_once('../modeles/utilisateur.php');
    require_once('../modeles/innovation.php');
    session_start();

    if(isset($_POST["titre"]))
    {
        $coBd= new bd("efreinnovation");
        $co=$coBd->connexion() or die("Erreur connexion");

        $idInnovation=$_POST["idInnovation"];
        $titre=$_POST["titre"];
        $descriptionCourte=$_POST["descriptionCourte"];
        $descriptionLongue=$_POST["descriptionLongue"];
        $image=$_POST["image"];
        $dateModification= date('Y-m-d');
        $fini= (isset($_POST['fini'])) ? 1 : 0;
        mysqli_query($co,"UPDATE innovation SET titre='$titre', descriptionCourte='$descriptionCourte', descriptionLongue='$descriptionLongue', dateModification='$dateModification', fini='$fini', image='$image' WHERE idInnovation='$idInnovation'") or die("aled");
        header('Location:../vues/innovation.php');
    }
?>