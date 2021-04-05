<?php

session_start();
if($_SESSION['codeUtilisateur'] != null){
$code = $_SESSION['codeUtilisateur'];
}else{
    header('location: connexion.php');
}
?>