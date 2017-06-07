<?php 
	
	$pdo = new PDO('mysql:host=localhost;dbname=beeorganised', 'root', '');
	 
	if(isset($_GET['login'])) {
	 $usrname = $_POST['usrname'];
	 $passwort = $_POST['passwort'];
	 
	 $statement = $pdo->prepare("SELECT * FROM beeuser WHERE usrname = :usrname");
	 $result = $statement->execute(array('usrname' => $usrname));
	 $user = $statement->fetch();
	 
	 
	 //Überprüfung des Passworts
	 if ($user !== false && password_verify($passwort, $user['passwort']) && $user['aktiv'] == 1) {
	 $_SESSION['userid'] = $user['id'];
	 die('Login erfolgreich. Weiter zu <a href="probe.php">internen Bereich</a>');
	 } else {
	 $errorMessage = "E-Mail oder Passwort war ungültig. Oder du hast kein Zugriff<br>";
	 }
	 
	}
?>
<!DOCTYPE html>
<html>

<head>
	<meta name="description" content=""/>
	<meta name="keywords" content="" />
	<meta name="author" content="" />
	<link rel="stylesheet" type="text/css" href="../_css/style.css" media="screen" />
	<title>Bee Organised | Register</title>
</head>

<body>
		

<div id="site-wrapper">

	<div id="header">

		<div id="top">

			<div class="left" id="logo">
				<a href="probe.php"><img src="../_bilder/logo.jpg"/></a>
				
			</div>

			<div class="left navigation" id="main-nav">

				<!--<a href="probe.php" id="logo">Bee Organised</a>-->
				

				<div class="section-content">

					<form method="post" action="">
						<input type="text" class="text" size="28" placeholder = "Suchen..." /> &nbsp; <input type="submit" class="button" value="Submit" />
					</form>
				</div>


				<div class="clearer">&nbsp;</div>

			</div>

			<div class="clearer">&nbsp;</div>

		</div>

		<div class="navigation" id="sub-nav">

			<ul class="tabbed">
					<li><a href="probe.php">Home</a></li>
					<li><a href="probeRegister.php">Registrieren</a></li>
					<li><a href="probeLogin.php">Einloggen</a></li>
					<li><a href="logout.php">Logout</a></li>
				</ul>

			<div class="clearer">&nbsp;</div>

		</div>

	</div>

	<div id="splash">

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

		</div>
		<div class="center" id="footer-right">

			<p>Copyright &copy; Copyright HTL SHKODER | Bee Organised Team 2017</p>

		</div>

		<div class="clearer">&nbsp;</div>

	</div>

</div>
 
</body>
</html>
