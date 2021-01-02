<?php class Utilisateur
{
private $numUtilisateur;
var $login;
var $mdp;
var $nom;
var $prenom;
var $etudiant;

public function __construct()
{
    $ctp=func_num_args();
    $args=func_get_args();
    switch ($ctp)
    {
        case 3:
            $co=$args[0];
            $login=$args[1];
            $mdp=$args[2];

            //Cas où le Utilisateur existe déjà
            $result=mysqli_query($co,"SELECT * FROM Utilisateur WHERE login='$login' AND mdp='$mdp'")
            or die("Erreur requête");

            while($row=mysqli_fetch_assoc($result))
            {
                $this->numUtilisateur=$row["numUtilisateur"];
                $this->login=$login;
                $this->mdp=$mdp;
                $this->nom=$row["nom"];
                $this->prenom=$row["prenom"];
                $this->etudiant=$row["etudiant"];
            }
            break;
        case 6:
            $co=$args[0];
            $login=$args[1];
            $mdp=$args[2];
            $nom=$args[3];
            $prenom=$args[4];
            $etudiant=$args[5];
            
            mysqli_query($co,"INSERT INTO Utilisateur VALUES ('','$login','$mdp','$nom','$prenom','$etudiant')")
            or die("Erreur d'insertion");
            $this->co=$co;
            $this->numUtilisateur=mysqli_insert_id($co); //Recupérer la valeur de id (auto increment)
            $this->login=$login;
            $this->mdp=$mdp;
            $this->nom=$nom;
            $this->prenom=$prenom;
            $this->etudiant=$etudiant;
            break;
    }
}

function connexion()
{  
    session_start();
    $_SESSION["login"]=$this->login;
    $_SESSION["numUtilisateur"]=$this->numUtilisateur;
}

function deconnexion()
{  
    session_destroy();
    mysqli_close($co);
}
}?> 