<?php

session_start();
include_once '_gestionBase.inc.php';

$codeReservation = $_SESSION["codeReservation"];
$ligneDeReservation = $_SESSION["ligneDeReservation"];


foreach ($ligneDeReservation as $numTypeContainer=>$qteReserver) 
{
    creerLigneDeReservation($codeReservation, $qteReserver, $numTypeContainer);
}

unset($_SESSION["codeReservation"]);
unset($_SESSION["ligneDeReservation"]);


header("Location:consultationDesReservations.php");