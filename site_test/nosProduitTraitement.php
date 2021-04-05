<?php
session_start();
include "_fonction.inc.php";
$qteReserver = $_REQUEST["quantity"];
$typeContainer = $_REQUEST["typeContainer"];

$reussi = ajouterArticle($typeContainer, $qteReserver);
header("Location:nosProduits.php");
