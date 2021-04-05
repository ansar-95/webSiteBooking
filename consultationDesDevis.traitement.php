<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include_once '_gestionBase.inc.php';

  
    
  
if(isset($_POST['validation'])){
    
    $codeDevis = $_POST['validation'];
    valideDevis($codeDevis);
    header('Location: consultationDesDevis.php');
}

if(isset($_GET['codeDevis'])){
    
    
    $code = $_GET['codeDevis'];
    suprimmerDevis($code);
    header('Location: consultationDesDevis.php');
}





