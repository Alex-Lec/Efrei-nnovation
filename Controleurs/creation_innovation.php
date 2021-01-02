<?php
    require_once('../modeles/bd.php');
    require_once('../modeles/utilisateur.php');
    require_once('../modeles/innovation.php');
    session_start();

    if(isset($_POST["titre"]))
    {
        $coBd= new bd("efreinnovation");
        $co=$coBd->connexion() or die("Erreur connexion");

        $titre=$_POST["titre"];
        $descriptionCourte=$_POST["descriptionCourte"];
        $descriptionLongue=$_POST["descriptionLongue"];
        $dateModification= date('Y-m-d');
        $fini=0;
        echo $titre;
        echo $descriptionCourte;
        echo $descriptionLongue;
        echo $dateModification;
        echo $fini;
        echo $_SESSION["numUtilisateur"];
        $i=new innovation($co,$titre,$descriptionCourte,$descriptionLongue,$dateModification,$fini);
        header('Location:../vues/innovation.php');
    }
?>