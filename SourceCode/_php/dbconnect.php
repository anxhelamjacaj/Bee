<?php

$url = "mysql:host=localhost;dbname=beeorganised";
$usr = "root";
$pwd = "";

try {
$dbh= new PDO($url, $usr, $pwd);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
}
catch(PDOException $e){
print "Error!:" . $e->getMessage() . "<br/>";
die();
}

?>