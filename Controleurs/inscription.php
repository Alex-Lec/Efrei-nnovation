<?php
    session_start();
    require_once("../modeles/bd.php");
    require_once("../modeles/utilisateur.php");

    if (isset($_POST["login"]) && isset($_POST["mdp"]) && isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["statut"]))
    {
        $login = $_POST["login"];
        $mdp = $_POST["mdp"];
        $nom = $_POST["nom"];
        $prenom=$_POST["prenom"];
        $statut=$_POST["statut"];

        $coBd= new bd("efreinnovation");
        $co=$coBd->connexion() or die("Erreur connexion");

        $result=mysqli_query($co,"SELECT login FROM utilisateur WHERE login='$login'")
        or die("Erreur requete connexion");

        if(mysqli_num_rows($result)==1)
        { 
            ?>
            <script>
                alert("Cet email est deja utilisé pr un utilisateur");
            </script>
            <?php
        }
        else
        {
            $coBd = new bd("efreinnovation");
            $co = $coBd->connexion();
            $m = new utilisateur($co,$login,$mdp,$nom,$prenom,$statut);
            header('Location:../Vues/connexion.html');
        }
    } 
    $coBd = new bd("efreinnovation");
    $co = $coBd->connexion();
    $m = new utilisateur($co,$login,$mdp,$nom,$prenom,$statut);
    }
    header('Location:../Vues/connexion.html');
?>



