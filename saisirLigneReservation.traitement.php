<?php
session_start();
/*
$numTypeContainer = $_POST["numTypeContainer"];
$qteReserver = $_POST["qteReserver"];

$_SESSION["ligneDeReservation"][$numTypeContainer] = $qteReserver ;

header("Location:saisirLigneReservation.php");

*/



if(!empty($_POST['numTypeContainer']) && !empty($_POST['qteReserver']))
{
    $numTypeContainer = $_POST["numTypeContainer"];
    $qteReserver = $_POST["qteReserver"];

    $_SESSION["ligneDeReservation"][$numTypeContainer] = $qteReserver;
    
    
    

    header("Location:saisirLigneReservation.php");
    
}