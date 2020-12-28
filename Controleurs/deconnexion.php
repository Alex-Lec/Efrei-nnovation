<?php
    require_once('../modeles/bd.php');
    require_once('../modeles/utilisateur.php');
    session_start(); 

    $loginCo=$_SESSION["login"];

    $coBd= new bd("efreinnovation");
    $co=$coBd->connexion() or die("Erreur connexion");
    $result=mysqli_query($co,"SELECT * FROM utilisateur WHERE login='$loginCo'") or die("Erreur requete");
    while($donnees = mysqli_fetch_assoc($result))
      {
        $mdp=$donnees["mdp"];
      }
    $m=new utilisateur($co,$loginCo,$mdp);
    $m->deconnexion();
    header('Location:../Vues/index.php');
?>