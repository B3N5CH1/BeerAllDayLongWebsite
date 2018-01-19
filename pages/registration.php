<?php

// Pear Mail Library
require_once "../pear_phpMail/Mail.php";

require "../db/connector.php";
include '../classes/burger.php';
include '../classes/db_query.php';

$conn = getDB();
$name;
$street;
$city;
$country;
$pw;
$bday;
$email;

$succ = false;

if (isset($_POST["fname"]) && isset($_POST["lname"])) {
	$name = $conn->escape_string($_POST["fname"])." ".$conn->escape_string($_POST["lname"]);

	if (isset($_POST["street"]) && isset($_POST["hnum"])) {
		$street = $conn->escape_string($_POST["street"])." ".$conn->escape_string($_POST["hnum"]);

		if (isset($_POST["zip"]) && isset($_POST["city"])) {
			$city = $conn->escape_string($_POST["zip"])." ".$conn->escape_string($_POST["city"]);

			if (isset($_POST["country"])) {
				$country = $conn->escape_string($_POST["country"]);

				if (isset($_POST["password"])) {
					$pw = md5($_POST["password"]);

					if (isset($_POST["bday"])) {
						$bday = date('Y-m-d', strtotime($_POST["bday"]));

						if (isset($_POST["email"])) {
							$email = $_POST["email"];

							$lf = "CHAR(13)";

							$address = "(SELECT CONCAT('".$street."', "."$lf".", '".$city."', ".$lf.", '".$country."'))";

							$values = array($name, $email, $pw, $address, $bday);

							$succ = addToDB("client", $values);

							//sendMail($email);
						} else {
							echo "[Error] No birthday received.";
						}
					} else {
						echo "[Error] No birthday received.";
					}
				} else {
					echo "[Error] No password received.";
				}
			} else {
				echo "[Error] No country received.";
			}
		} else {
			echo "[Error] No zip and/or city received.";
		}
	} else {
		echo "[Error] No street and/or house number received.";
	}
} else {
	echo "[Error] No name received.";
}

function sendMail($to) {
	$from = "LeBeerShop Team <LeBeerShop@gmail.com>";
	$subject = "Registration!";
	$body = "Hi!\n\nYou successfully registrated on LeBeerShop.ch\n\nYou can login with this email address.\n\nWe hope you find something you'll enjoy!\n\nKind regards\nThe LeBeerShop Team";

	$headers = array(
    	'From' => $from,
    	'To' => $to,
    	'Subject' => $subject
	);

	$smtp = Mail::factory('smtp', array(
        'host' => 'ssl://smtp.gmail.com',
        'port' => '465',
        'auth' => true,
        'username' => 'lebeershop@gmail.com',
        'password' => 'thisIsABadPassword'
    ));

	$mail = $smtp->send($to, $headers, $body);

	if (PEAR::isError($mail)) {
    	echo('<p>' . $mail->getMessage() . '</p>');
	} else {
    	echo('<p>Message successfully sent!</p>');
	}
}

echo $succ;


	echo "<!DOCTYPE html>";
	echo "<html lang='en'>";
		echo "<head>";
		echo "<meta charset='utf-8' />";
		echo "<title>Sign Up</title>";
		echo "<link rel='stylesheet' type='text/css' media='screen' href='../css/styleb.css' />";
	echo "</head>";
	echo "<body class='centered'>";
		if ($succ) {



			echo "<h2>Success</h2>";
			echo "<p>You successfully registrated. You can log in <a href='./login.php".add_param($url,'lang',$_GET['lang'])."'>here</a> now.</p>";
		} else {
			echo "<p>There was an error signing up.</p>";
		}


	echo "</body>";
