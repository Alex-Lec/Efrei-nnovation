<?php
    require_once("../modeles/bd.php");
    session_start();

    $numInnovationSelect=$_SESSION["numInnovationSelect"];
    $numUtilisateurCo=$_SESSION["numUtilisateur"];

    $coBd = new bd("efreinnovation");
    $co = $coBd->connexion();

    $result=mysqli_query($co,"SELECT COUNT(*) AS nb FROM vote WHERE innovation='$numInnovationSelect' AND utilisateur='$numUtilisateurCo'")
      or die("Erreur requete");
      while($donnees = mysqli_fetch_assoc($result))
      {
        $nb=$donnees["nb"];
      }
      if($nb==0)
      {
        mysqli_query($co,"INSERT INTO vote VALUES ('$numUtilisateurCo','$numInnovationSelect')") or die("Erreur d'insertion");
      }
      header('Location:../vues/vue_innovation.php');
?>