<?php 
	$pdo = new PDO('mysql:host=localhost;dbname=beeorganised', 'root', '');
	//require('dbconnect.php');
?>
<!DOCTYPE html> 
	<html> 
		<head>
			<title>Registrierung</title>
			<link rel="stylesheet" href="../_css/style - Copy.css" type="text/css" />				
		</head> 
		<body>
			
			<?php
			
			require('menu.php');
			?>
			<fieldset><legend>Hier k&ouml;nnen Sie registrieren</legend><form action="?register=1" method="post">
				Zahl:<br>
				<input type="text" size="40" maxlength="250" name="zahl"><img src = "../_bilder/bee.gif" style="float:right;">
				<br><br>
				Ort:<br>
				<input type="text" size="40" maxlength="250" name="ort">
				<br><br>
				Bezeichnung:<br>
				<input type="email" size="40" maxlength="250" name="bez">
				<br><br>
			 
				<input type="submit" name="submit"  onclick="alert('Danke dass Sie sich für unser System entschieden haben ')" value="Submit">  
				<input type="reset">
			</form>
			</fieldset>
			<br><br>
			<?php
				session_start();
				if(!isset($_SESSION['userid'])) {
				die('Bitte zuerst <a href="login.php"> einloggen</a>');
				}
 
				//Abfrage der Nutzer ID vom Login
				$userid = $_SESSION['userid'];
 
				echo "Hallo User: ".$userid;
			
				
			
				if(isset($_POST['speichern'])){
		
				$zahl = $_POST['zahl'];
				$ort = $_POST['ort'];
				$bez = $_POST['bez'];
		
				$insert = $pdo->prepare("INSERT INTO bstock (zahl, ort, bez)
				values(:zahl, :ort, :bez) ");
		
				$insert->bindParam(':zahl', $zahl);
				$insert->bindParam(':ort', $ort);
				$insert->bindParam(':bez', $bez);
		
				$insert->execute();
				
				if(strlen($ort) == 0) {
				echo 'Bitte ein Ort angeben<br>';
				$error = true;
				 }
				 
				if($insert) { 
				echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
				 } else {
				 echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
				 }
			
	}
				 
				
				 
				 
				 /*//Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
				 if(!$error) { 
				 $statement = $pdo->prepare("SELECT * FROM bstock WHERE zahl = :zahl");
				 $result = $statement->execute(array('zahl' => $zahl));
				 $user = $statement->fetch();
				 
				 //Überprüfe, dass der Bienestock noch nicht registriert wurde
				 if($user !== false) {
				 echo 'Dieses Bienestock ist bereits in DB vergeben<br>';
				 $error = true;
				 } 
				 }
				 
				 //Keine Fehler, wir können den Nutzer registrieren
				 if(!$error) { 
				 
				 $statement = $pdo->prepare("INSERT INTO beeuser (vname, fname, email, usrname, passwort, gebtag) VALUES (:vname, :fname, :email, :usrname, :passwort, :gebtag)");
				 $result = $statement->execute(array('vname' => $vname,'fname' => $vname, 'email' => $email, 'usrname' => $usrname, 'passwort' => $passwort_hash, 'gebtag' => $gebtag));
				 */
				 
				  
				
				
				// define variables and set to empty values
				//$vnameErr = $fnameErr = $emailErr = $usrErr = $pswErr = $gebtagErr  = "";
				//$vname = $fname = $email =  $usr = $psw = $gebtag =  "";
			?>
			
 
		</body>
	</html>