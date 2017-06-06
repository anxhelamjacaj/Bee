<?php 
	$pdo = new PDO('mysql:host=localhost;dbname=beeorganised', 'root', '');
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
				$showFormular = true; //Variable ob das Registrierungsformular anezeigt werden soll
				 
				if(isset($_GET['register'])) {
				 $error = false;
				 $vname = $_POST['vname'];
				 $fname = $_POST['fname'];
				 $email = $_POST['email'];
				 $usrname = $_POST['usrname'];
				 $passwort = $_POST['passwort'];
				 $passwort2 = $_POST['passwort2'];
				 $gebtag = $_POST['gebtag'];
				  
				 if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				 echo 'Bitte eine gültige E-Mail-Adresse eingeben<br>';
				 $error = true;
				 } 
				 if(strlen($passwort) == 0) {
				 echo 'Bitte ein Passwort angeben<br>';
				 $error = true;
				 }
				 if($passwort != $passwort2) {
				 echo 'Die Passwörter müssen übereinstimmen<br>';
				 $error = true;
				 }
				 
				 //Überprüfe, dass die E-Mail-Adresse noch nicht registriert wurde
				 if(!$error) { 
				 $statement = $pdo->prepare("SELECT * FROM beeuser WHERE email = :email");
				 $result = $statement->execute(array('email' => $email));
				 $user = $statement->fetch();
				 
				 if($user !== false) {
				 echo 'Diese E-Mail-Adresse ist bereits vergeben<br>';
				 $error = true;
				 } 
				 }
				 //Überprüfe, dass der Benutzername noch nicht registriert wurde
				 if(!$error) { 
				 $statement = $pdo->prepare("SELECT * FROM beeuser WHERE usrname = :usrname");
				 $result = $statement->execute(array('usrname' => $usrname));
				 $user = $statement->fetch();
				 
				 if($user !== false) {
				 echo 'Dieser Benutzername ist bereits vergeben<br>';
				 $error = true;
				 } 
				 }
				 //Keine Fehler, wir können den Nutzer registrieren
				 if(!$error) { 
				 $passwort_hash = password_hash($passwort, PASSWORD_DEFAULT);
				 
				 $statement = $pdo->prepare("INSERT INTO beeuser (vname, fname, email, usrname, passwort, gebtag) VALUES (:vname, :fname, :email, :usrname, :passwort, :gebtag)");
				 $result = $statement->execute(array('vname' => $vname,'fname' => $vname, 'email' => $email, 'usrname' => $usrname, 'passwort' => $passwort_hash, 'gebtag' => $gebtag));
				 
				 if($result) { 
				 echo 'Du wurdest erfolgreich registriert. <a href="login.php">Zum Login</a>';
				 $showFormular = false;
				 } else {
				 echo 'Beim Abspeichern ist leider ein Fehler aufgetreten<br>';
				 }
				 } 
				}
				
				// define variables and set to empty values
				$vnameErr = $fnameErr = $emailErr = $usrErr = $pswErr = $gebtagErr  = "";
				$vname = $fname = $email =  $usr = $psw = $gebtag =  "";

				if ($_SERVER["REQUEST_METHOD"] == "POST") {
				  if (empty($_POST["vname"])) {
					$vnameErr = "Name is required";
				  } else {
					$vname = test_input($_POST["vname"]);
					// check if name only contains letters and whitespace
					if (!preg_match("/^[a-zA-Z ]*$/",$vname)) {
					  $vnameErr = "Only letters and white space allowed"; 
					}
				  }
				  if (empty($_POST["fname"])) {
					$fnameErr = "Name is required";
				  } else {
					$fname = test_input($_POST["fname"]);
					// check if name only contains letters and whitespace
					if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {
					  $fnameErr = "Only letters and white space allowed"; 
					}
				  }
				   if (empty($_POST["email"])) {
					$emailErr = "Email is required";
				  } else {
					$email = test_input($_POST["email"]);
					// check if e-mail address is well-formed
					 // check if e-mail address is well-formed
					if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					  $usrErr = "Invalid username format"; 
					}
				  }
				   if (empty($_POST["usrname"])) {
					$usrErr = "Username is required";
				  } else {
					$usr = test_input($_POST["usrname"]);
					// check if e-mail address is well-formed
				  }
				  if (empty($_POST["passwort"])) {
					$pswErr = "Password is required";
				  } else {
					$psw = test_input($_POST["passwort"]);
				  }

				  if (empty($_POST["gebtag"])) {
					$gebtagErr = "Birthdate is required";
				  } else {
					$gebtag = test_input($_POST["gebtag"]);
				  }

				}

				function test_input($data) {
				  $data = trim($data);
				  $data = stripslashes($data);
				  $data = htmlspecialchars($data);
				  return $data;
				}
				 
				if($showFormular) {
			?> 
			<fieldset><legend>Hier k&ouml;nnen Sie registrieren</legend><form action="?register=1" method="post">
				Vorname:<br>
				<input type="text" size="40" maxlength="250" name="vname"><img src = "../_bilder/bee.gif" style="float:right;">
				<span class="error">* <?php echo $vnameErr;?></span>
				<br><br>
				Nachname:<br>
				<input type="text" size="40" maxlength="250" name="fname">
				<span class="error">* <?php echo $fnameErr;?></span>
				<br><br>
				E-Mail:<br>
				<input type="email" size="40" maxlength="250" name="email">
				<span class="error">* <?php echo $emailErr;?></span>
				<br><br>
				Benutzername:<br>
				<input type="text" size="40" maxlength="250" name="usrname">
				<span class="error">*<?php echo $usrErr;?></span>
				<br><br>
				Passwort:<br>
				<input type="password" size="40"  maxlength="250" name="passwort">
				<span class="error">*<?php echo $pswErr;?></span>
				<br><br>
				 
				Passwort wiederholen:<br>
				<input type="password" size="40" maxlength="250" name="passwort2">
				<span class="error">*<?php echo $pswErr;?></span>
				<br><br>
				Geburtstag:<br>
				<input type="date"  name="gebtag"><br><br>
			 
				<input type="submit" name="submit"  onclick="alert('Danke dass Sie sich für unser System entschieden haben ')" value="Submit">  
				<input type="reset">
			</form>
			</fieldset>
			<?php
			 }  //Ende von if($showFormular)
			?>
 
		</body>
	</html>