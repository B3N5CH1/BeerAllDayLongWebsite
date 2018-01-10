<?php

require "../db/connector.php";

$name = $_POST["fname"]." ".$_POST["lname"];

$street = $_POST["street"]." ".$_POST["hnum"];
$city = $_POST["zip"]." ".$_POST["city"];
$country = $_POST["country"];
$lf = "CHAR(13)";

$address = "(SELECT CONCAT('".$street."', "."$lf".", '".$city."', ".$lf.", '".$country."'))";

$pw = md5($_POST["password"]);
$bday = date('Y-m-d', strtotime($_POST["bday"]));;

$values = array($name, $_POST["email"], $pw, $address, $bday);

$succ = addToDB("client", $values);





	echo "<!DOCTYPE html>";
	echo "<html lang='en'>";
		   echo "<head>";
		   echo "<meta charset='utf-8' />";
		   echo "<title>Sign Up</title>";
		   echo "<link rel='stylesheet' type='text/css' media='screen' href='../css/styleb.css' />";
	echo "</head>";
	echo "<body>";



	echo "</body>";
