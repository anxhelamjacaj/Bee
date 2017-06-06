<?php
	 if(isset($_SESSION)) {
		session_start();
	}
	?>
		<link rel="stylesheet" href="../_css/style - Copy.css" type="text/css" />	
		<div id="logo">
			<h1><a href="index.php" id="logoLink">Bee Organised</a></h1>
		</div>
		<div id="nav">
			<ul>
				<li><a href="index.php">Home</a></li>			
				<li><a href="login.php">Login</a></li>
				<li><a href="register.php">Register</a></li>	
				<li><a href="logout.php">Logout</a></li>
			</ul>	
		</div>