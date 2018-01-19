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
						$bday = date('Y-m-d', strtotime($conn->escape_string($_POST["bday"])));

						if (isset($_POST["email"])) {
							$email = $conn->escape_string($_POST["email"]);

							$lf = "CHAR(13)";

							$address = "(SELECT CONCAT('".$street."', "."$lf".", '".$city."', ".$lf.", '".$country."'))";

							$values = array($name, $email, $pw, $address, $bday);

							$succ = addToDB("client", $values);

							sendMail($email);
						} else {
							echo t('errMail');
						}
					} else {
						echo t('errBday');
					}
				} else {
					echo t('errPw');
				}
			} else {
				echo t('errCountry');
			}
		} else {
			echo t('errCity');
		}
	} else {
		echo t('errAdd');
	}
} else {
	echo t('errName');
}

function sendMail($to) {
	$from = "LeBeerShop Team <LeBeerShop@gmail.com>";
	$subject = "Registration!";
	$body = t('emailBody');

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
    	echo('<p>' . $mail->getUserInfo() . '</p>');
	} else {
    	echo('<p>Message successfully sent!</p>');
	}
}

	echo "<!DOCTYPE html>";
	echo "<html lang='en'>";
		echo "<head>";
		echo "<meta charset='utf-8' />";
		echo "<title>Sign Up</title>";
		echo "<link rel='stylesheet' type='text/css' media='screen' href='../css/styleb.css' />";
		echo "<script src=\"../javascript/sliding_menu.js\"></script>";
	echo "</head>";
	echo "<body>";
		createBurger();

		echo "<nav>";
		  echo "<span>";
			echo "<span style='font-size:30px;cursor:pointer;position:relative;' onclick='openNav()'>&#9776;";
			echo "</span>";
		  echo "</span>";
		echo "</nav>";

		echo "<main  class='centered'>";
		if ($succ) {
			echo "<h2>Success</h2>";
			echo "<p>".t('regSucc')." <a href='./login.php".add_param($url,'lang',$_GET['lang'])."'>".t('here')."</a> now.</p>";
		} else {
			echo "<p>".t('regErr')."</p>";
		}

		echo "</main>";


	echo "</body>";
