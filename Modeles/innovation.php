<?php class innovation
{
private $co;
private $numInnovation;
var $titre;
var $descriptionCourte;
var $descriptionLongue;
var $dateModification;
var $fini;
var $image;
var $numUtilisateur;


public function __construct($co,$titre,$descriptionCourte,$descriptionLongue,$dateModification,$fini,$image)
{       
    $numUtilisateurCo=$_SESSION["numUtilisateur"];

    mysqli_query($co,"INSERT INTO innovation VALUES ('','$titre','$descriptionCourte','$descriptionLongue','$dateModification','$fini','$image','$numUtilisateurCo')") or die("aled");
    $this->co=$co;
    $this->numInnovation=mysqli_insert_id($co); //Recupérer la valeur de id (auto increment)
    $this->titre=$titre;
    $this->$descriptionCourte=$descriptionCourte;
    $this->descriptionLongue=$descriptionLongue;
    $this->dateModification=$dateModification;
    $this->fini=$fini;
    $this->image=$image;
    $this->numUtilisateur=$numUtilisateurCo;
}
}?> 