<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '_gestionBase.inc.php';

if (isset($_REQUEST["login"]) && isset($_REQUEST["mdp"])) {
    $resultat = verification($_REQUEST["login"], $_REQUEST["mdp"]);
    if ($resultat != null) {
        
        session_start();
        $_SESSION['codeUtilisateur'] = $resultat['code'];
        header('location: consultationDesReservations.php');
        exit;

    }
    
    else{
        header('location: connexion.php');
        exit;
    }
}
