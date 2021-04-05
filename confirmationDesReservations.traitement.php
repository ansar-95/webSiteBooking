<?php
session_start();


include_once '_gestionBase.inc.php';

$code = $_POST['reservation'];

changeEtat($code);

header("Location:consultationDesDevis.php");


