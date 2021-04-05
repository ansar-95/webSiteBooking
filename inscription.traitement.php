<?php
include_once '_gestionBase.inc.php';
if(!empty($_POST['raisonSociale']) && !empty($_POST['adresse']) && !empty($_POST['cp']) && !empty($_POST['ville']) && !empty($_POST['adrMel']) && !empty($_POST['telephone']) && !empty($_POST['contact']) && !empty($_POST['pays']) && !empty($_POST['login']) && !empty($_POST['mdp']))
{
       
    $codePays = $_POST['pays'];
    $codePays = strtoupper($codePays);
    
    $raisonSociale = $_POST['raisonSociale'];
    $adresse = $_POST['adresse'];
    $cp = $_POST['cp'];
    $ville = $_POST['ville'];
    $adrMel = $_POST['adrMel'];
    $telephone = $_POST['telephone'];
    $contact  = $_POST['contact'];
    $login = $_POST['login'];
    $mdp = $_POST['mdp'];    
    
    $codeUtilisateur = creerUtilisateur($raisonSociale,$adresse,$cp,$ville,$adrMel,$telephone,$contact,$codePays,$login,$mdp);
  
    if(isset($codeUtilisateur)){
        session_start();
        $_SESSION['codeUtilisateur'] = $codeUtilisateur;
        header('location: saisirReservation.php');
        exit;
    }
    else{
        header('location: inscription.php');
        exit;
    }

}
else{
    header('location: inscription.php');
    exit;
}



