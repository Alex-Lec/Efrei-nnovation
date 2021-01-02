<?php
  require_once('../modeles/bd.php');
  require_once('../modeles/commentaire.php');
  require_once('../modeles/innovation.php');
  session_start();

    $numMembreCo=$_SESSION["numMembre"];
    $txtCommentaire=$_POST["txtCommentaire"];
    $date = date('Y-m-d');
    
    $coBd= new bd("efreinnovation");
    $co=$coBd->connexion() or die("Erreur connexion");

    $com=new commentaire($co,$txtCommentaire,$date);
    header('Location:../Vues/vue_innovation.php');
?>