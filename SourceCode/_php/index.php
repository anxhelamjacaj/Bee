<!DOCTYPE html> 
	<html> 
		<head>

			<title>Bee Home | Login</title> 
			<link rel="stylesheet" href="../_css/style - Copy.css" type="text/css" />
			<?php require('menu.php'); ?>
			<?php 

				if(isset($_SESSION)) {
				session_start();
				}
			?>
		</head> 
		<body>
			<fieldset><legend>Beschreibung</legend><h2>Ausgangslage</h2>
				<p>In Albanien gibt es viele Imker, die auch sehr viel Bienenstöcke
				haben und es ist unmöglich für sie alle Bienenstöcke zu kontrollieren
				Es braucht auch sehr viel Zeit. Für den Imker ist es auch unmöglich, 
				dass er im Winter die Bienenstöcke in abgelegenen Orten wie z.B. Oblike 
				usw. ständig zu besuchen.Aufgrund der geografischen Lage der Bienenstöcke ist es nicht oder nur schwer möglich, 
				diese zu überwachen. Daher soll unseres Projekt "Bee Organised" Imkern ermöglichen, 
				Daten (Gewicht, Temperatur) des Bienenstocks entfernt über eine Webplattform abzurufen.
				Es gibt in Albanien kein derartiges oder ähnliches System.</p>
			<h2>Beschreibung der Idee</h2><img src = "../_bilder/bee.gif" style="float:right;">
				<p>Es soll eine Anwendung (Plattform) zur Verwaltung und Überwachung von Bienenstöcken erstellt werden. Diese soll 
				selbstständig Daten von den verwalteten Bienenstöcken abfragen und interpretieren sowie den Gesundheitszustand und 
				detaillierte Daten für den Anwender übersichtlich darstellen. </p>
				<p>Jeder Bienenstock wird dazu mit einer entsprechenden Sensorik ausgestattet, welche die wesentlichen Daten erfassen 
				und über eine Kommunikationsschnittstelle an die zentrale Plattform übertragen kann. Es soll möglich sein, mehrere 
				Bienenstöcke unabhängig vom Standort von der zentralen Plattform zu verwalten. Die Abfrage eines Bienenstocks soll 
				allerdings auch ohne zentrale Plattform möglich sein.<p>
			<table border = "5"><h2>Projektteam</h2>
			<h3> Name und Individuelle Themenstellung </h3>
				<tr>
					<td> Erda Ymeri | Projektleiterin </td>
					<td> Anxhela Mjacaj | Projektleiterin Stv. </td>
					<td> Ersamir Zekaj | Projektmitarbeiter </td>
					<td> Elidon Bala | Projektmitarbeiter </td>
				</tr>
				<tr>
					<td><ul>
						<li>Datenbank</li> 
						<li>Raspberry Pi</li>
						</ul>
					</td>
					<td><ul>
						<li>Webseite</li> 
						<li>Webdesign</li>
						</ul>
					</td>
					<td><ul>
						<li>Systemtechnik</li> 
						<li>Netzwerksicherheit</li>
						</ul>
					<td><ul>
						<li>Design</li> 
						<li>Raspberry Pi</li>
						</ul>
					</td>
				</tr>
			</table>
			</fieldset>	
				
					
		</body>
	</html>