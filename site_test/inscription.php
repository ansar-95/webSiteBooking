<?php

include("_fonction.inc.php");

if (isset($_REQUEST)) {

    $raisonSociale = $_REQUEST['raisonSociale'];
    $adresse = $_REQUEST['adresse'];
    $cp = $_REQUEST['cp'];
    $ville = $_REQUEST['ville'];
    $adrMel = $_REQUEST['adrMel'];
    $telephone = $_REQUEST['telephone'];
    $contact = $_REQUEST['contact'];
    $login = $_REQUEST['login'];
    $mdp = $_REQUEST['mdp'];
    $mdp2 = $_REQUEST['mdp2'];
    $codePays = $_REQUEST['codePays'];

    if ($mdp == $mdp2) {
        $reussi = inscrire($raisonSociale, $adresse, $cp, $ville, $adrMel, $telephone, $contact, $login, $mdp, $codePays);
    }
}

header('Location: index2.php');
