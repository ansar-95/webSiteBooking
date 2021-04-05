<?php
$_SESSION = array(); // vide le tableau des sessions
session_destroy();
header("Location:index.php");
