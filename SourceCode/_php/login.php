<?php 
	
	$pdo = new PDO('mysql:host=localhost;dbname=beeorganised', 'root', '');
	//require('dbconnect.php');
	
	if(isset($_GET['login'])) {
	 $usrname = $_POST['usrname'];
	 $passwort = $_POST['passwort'];
	 
	 $statement = $pdo->prepare("SELECT * FROM beeuser WHERE usrname = :usrname");
	 $result = $statement->execute(array('usrname' => $usrname));
	 $user = $statement->fetch();
	 
	 //Überprüfung des Passworts
	 if ($user !== false && password_verify($passwort, $user['passwort'])) {
	 $_SESSION['userid'] = $user['id'];
	 die('Login erfolgreich. Weiter zu <a href="index.php">internen Bereich</a>');
	 } else {
	 $errorMessage = "E-Mail oder Passwort war ungültig<br>";
	 }
	 
	}
?>
<!DOCTYPE html> 
	<html> 
		<head>
		  <title>Login</title> 
		  <link rel="stylesheet" href="../_css/style -Copy.css" type="text/css" />	
		</head> 
		<body>
			<?php require('menu.php'); ?>
			<?php 
				if(isset($errorMessage)) {
				 echo $errorMessage;
				}
			?>
			<fieldset><legend>Hier k&oumlnnen Sie einloggen</legend>
			<form action="?login=1" method="post">
				Benutzername:<br>
				<input type="text" size="40" maxlength="250" name="usrname"><br><br><img src = "../_bilder/bee.gif" style="float:right;">
				 
				Passwort:<br>
				<input type="password" size="40"  maxlength="250" name="passwort"><br><br>
				 
				</br><input type="submit" value="Abschicken"><br>
			</form>
			</fieldset>
			

		</body>
	</html>