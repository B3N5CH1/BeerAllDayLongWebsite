<?php

require "../db/connector.php";
include '../classes/db_query.php';

$conn = getDB();
$name;
$street;
$city;
$country;
$pw;
$bday;
$email;

$bname;
$descr_de;
$descr_fr;
$descr_en;
$size;
$price;
$perc;
$brand;
$type;
$nat;

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
} else if (isset($_POST["name"])) {
	$bname = $conn->escape_string($_POST["name"]);

	if (isset($_POST["description_de"]) && isset($_POST["description_fr"]) && isset($_POST["description_en"])) {
		$descr_de = $conn->escape_string($_POST["description_de"]);
		$descr_fr = $conn->escape_string($_POST["description_fr"]);
		$descr_en = $conn->escape_string($_POST["description_en"]);

		if (isset($_POST["size"])) {
			$size = $conn->escape_string($_POST["size"]);

			if (isset($_POST["price"])) {
				$price = $conn->escape_string($_POST["price"]);

				if (isset($_POST["percentage"])) {
					$perc = $conn->escape_string($_POST["percentage"]);

					if (isset($_POST["brand"])) {
						$brand = $conn->escape_string($_POST["brand"]);

						if (isset($_POST["type"])) {
							$type = $conn->escape_string($_POST["type"]);

							if (isset($_POST["nationality"])) {
								$nat = $conn->escape_string($_POST["nationality"]);

								$values = array($bname, $descr_de, $descr_fr, $descr_en, $size, $price, $perc, $brand, $type, $nat);

								$succ = addToDB("products", $values);
							} else {
								echo "[Error] No nationality received.";
							}
						} else {
							echo "[Error] No type received.";
						}
					} else {
						echo "[Error] No brand received.";
					}
				} else {
					echo "[Error] No percentage received.";
				}
			} else {
				echo "[Error] No price received.";
			}
		} else {
			echo "[Error] No size received.";
		}
	} else {
		echo "[Error] Not enough descriptions received.";
	}
} else {
	echo "[Error] No name received.";
}
