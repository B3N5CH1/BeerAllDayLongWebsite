<?php

require "../db/connector.php";

$email = $_POST["email"];
$pw = md5($_POST["password"]);

if (login($email, $pw)) {
	session_start();
	echo "Session ID:<br>".session_id()."<br>";
	$values = getUserData($email);

	$_SESSION["email"] = $email;
	$_SESSION["name"] = $values[0];
	$_SESSION["address"] = $values[1];

	echo "<a href='../home.php'>Home</a>";

	echo "<!DOCTYPE html>";
	echo "<html lang='en'>";
		echo "<head>";
		echo "<meta charset='utf-8' />";
		echo "<title>User Page</title>";
		echo "<link rel='stylesheet' type='text/css' media='screen' href='../css/styleb.css' />";
	echo "</head>";
	echo "<body class='centered'>";
		echo "<h2>User Page</h2>";
		echo "<p>Success! You successfully logged in. See your information below.</p>";

		echo "<h3>Name</h3>";
		echo "<p>".$_SESSION["name"]."</p>";
		echo "<h3>Address</h3>";
		echo "<p>".$_SESSION["address"]."</p>";



	echo "</body>";

} else {
	echo "Failure<br>The passwords do not match!";
	echo "FOCKING BLOODY ERROR!";
}













