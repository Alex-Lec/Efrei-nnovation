<?php class commentaire
{
private $co;
private $idCommentaire;
var $txtCommentaire;
var $dateCommentaire;
var $numUtilisateur;
var $numInnovation;

public function __construct($co,$txtCommentaire,$dateCommentaire)
{       
    $numUtilisateurCo=$_SESSION["numUtilisateur"];
    $numInnovSelect=$_SESSION["numInnovSelect"];

    mysqli_query($co,"INSERT INTO commentaire VALUES ('','$txtCommentaire', '$dateCommentaire','$numUtilisateurCo','$numInnovSelect')") or die("Erreur d'insertion");
    $this->co=$co;
    $this->idCommentaire=mysqli_insert_id($co); //Recupérer la valeur de id (auto increment)
    $this->txtCommentaire=$txtCommentaire;
    $this->dateCommentaire=$dateCommentaire;
    $this->numUtilisateur=$numUtilisateurCo;
    $this->numInnovation=$numInnovSelect;
}
}?> 