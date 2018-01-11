<?php

 require_once("autoloader.php");

	echo "<!DOCTYPE html>";
		echo "<html lang='en'>";
			echo "<head>";
			echo "<meta charset='utf-8' />";
			echo "<title>LeBeerShop</title>";
			echo "<link rel='stylesheet' type='text/css' media='screen' href='./css/styleb.css' />";
		echo "</head>";

		echo "<body class='centered'>";

			if (session_status() == PHP_SESSION_NONE) {
				session_start();
			}

			if (isset($_POST["logout"])) {
				if ($_POST["logout"]) {
					session_destroy();
				}
			}

//			if (isset($_SESSION["email"])) {
//				echo session_id();
//				echo "<p>".$_SESSION["email"]."<br>".$_SESSION["name"]."</p>";
//			}

			echo "<h1>Beer</h1>";
			echo "<p>I need beer!</p>";
			echo "<a href='./pages/home.php?lang=en'><img src='images/landscape-beer-glasses.jpg' alt='BEER!' /></a><br>";
			echo "<a href='pages/home.php?lang=en'>Home</a><br>";
			echo "<p class = 'bold'>Oispa kaljaa</p>";
		echo "</body>";
	echo "</html>";
