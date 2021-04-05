<?php
session_start();

$code = $_SESSION['codeUtilisateur'];
include_once '_gestionBase.inc.php';

if(!empty($_POST["dateDebutReservation"]) && !empty($_POST["dateFinReservation"]) && !empty($_POST["codeVilleMiseDisposition"]) && !empty($_POST["codeVilleRendre"]) && !empty($_POST["volumeEstime"]))
{
    function validateDate($date, $format = 'Y-m-d')
    {
    $d = DateTime::createFromFormat($format, $date);
    // The Y ( 4 digits year ) returns TRUE for any integer with any number of digits so changing the comparison from == to === fixes the issue.
    return $d && $d->format($format) === $date;
    }
    
    $dateAujourdhui = new DateTime('now');
    $dateAujourdhui = date_modify($dateAujourdhui,'+2 day');
    $dateAujourdhui = date_format($dateAujourdhui, 'Y-m-d');
    
    
    $dateStart = $_POST["dateDebutReservation"];       
    $dateEnd = $_POST["dateFinReservation"];
    
    if(validateDate($dateStart) && validateDate($dateEnd))
    {
        $dateStart = new DateTime($dateStart);
        $dateEnd = new DateTime($dateEnd);

    }
    else{
            header("Location:saisirReservation.php"); 
            exit;
        }    

    if($dateStart >= $dateAujourdhui && $dateEnd >= $dateStart)
    {
        if(is_numeric($_POST["volumeEstime"]) && $_POST["volumeEstime"] > 0 && $_POST["codeVilleMiseDisposition"] != $_POST["codeVilleRendre"])
        {
            $dateDebutReservation =  $_POST["dateDebutReservation"];
            $dateDebutReservation = strtotime($dateDebutReservation);

            $dateFinReservation = $_POST["dateFinReservation"];
            $dateFinReservation = strtotime($dateFinReservation); 

            $dateReservation = time();

            $volumeEstime = $_POST["volumeEstime"];

            $codeVilleMiseDisposition = $_POST["codeVilleMiseDisposition"];
            $codeVilleRendre = $_POST["codeVilleRendre"];
            $codeUtilisateur = $code;

            $codeReservation  = creerReservation($dateDebutReservation,$dateFinReservation,
            $dateReservation,$volumeEstime,$codeVilleMiseDisposition,
            $codeVilleRendre,$codeUtilisateur);

            $_SESSION["codeReservation"] = $codeReservation;
            header("Location:saisirLigneReservation.php");       
               
        }
        
        else
        {
        header("Location:saisirReservation.php");
        exit;
        }
        
    }
    else{
      header("Location:saisirReservation.php");
      exit;
    }

  
}

else{
    header("Location:saisirReservation.php");
    exit;
}



/*

$dateDebutReservation=  $_POST["dateDebutReservation"];
$dateDebutReservation= convertToTimestamps($dateDebutReservation);

$dateFinReservation= $_POST["dateFinReservation"];
$dateFinReservation= convertToTimestamps($dateFinReservation) ;

$dateReservation = time();

$volumeEstime = $_POST["volumeEstime"];

$codeVilleMiseDisposition = $_POST["codeVilleMiseDisposition"];
$codeVilleRendre = $_POST["codeVilleRendre"];
$codeUtilisateur = 1;

$codeReservation  = creerReservation($dateDebutReservation,$dateFinReservation,
        $dateReservation,$volumeEstime,$codeVilleMiseDisposition,
        $codeVilleRendre,$codeUtilisateur);

$_SESSION["codeReservation"] = $codeReservation;

header("Location:saisirLigneReservation.php");
*/


