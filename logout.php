<?php 
// Session starten und beenden
session_start(); session_destroy(); 
// Umaddressierung zur Home Seite
header ('Location: probeLogin.php');
?>