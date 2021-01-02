<?php
    session_start();
    $_SESSION["numInnovationSelect"]=$_POST["numInnovationSelect"];
    header('Location:../vues/vue_innovation.php');
?>