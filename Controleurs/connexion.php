<?php
    require_once('../modeles/bd.php');
    require_once('../modeles/utilisateur.php');

    if(isset($_POST["login"]) && isset($_POST["mdp"]))
    {
        $login=$_POST["login"];
        $mdp=$_POST["mdp"];

        $coBd= new bd("efreinnovation");
        $co=$coBd->connexion() or die("Erreur connexion");

        $result=mysqli_query($co,"SELECT * FROM utilisateur WHERE login='$login' AND mdp='$mdp'")
        or die("Erreur requete connexion");

        if(mysqli_num_rows($result)==1)
        {
            $m=new utilisateur($co,$login,$mdp);
            $m->connexion();
            header('Location:../vues/index.php');
        }
        else
        {
            header('Location:../vues/inscription.php');
        }
    }