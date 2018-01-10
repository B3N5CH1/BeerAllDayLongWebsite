<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "beerbeerbeer";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
	die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM `client`";

$res = $conn->query($sql);

if ($res->num_rows > 0) {
	// output data of each row
	while($row = $res->fetch_assoc()) {
		echo "name: " . $row["name"]. " - mail: " . $row["email"]. " - address" . $row["address"]. "<br>";
	}
} else {
	echo "0 results";
}


function addToDB($tName, $values) {
	global $conn;

	$sql = "INSERT INTO `".$tName."` (";

	if ($tName == "client") {
		$sql = $sql."name, email, password, address, birthday";
		$sql = $sql.") VALUES (";
		$sql = $sql."'".$values[0]."', '".$values[1]."', '".$values[2]."', ".$values[3].", '".$values[4]."'";
		$sql = $sql.");";
	} elseif ($tName == "products") {
		$sql = $sql."name, description_de, description_fr, description_en, ".
			"size, price, percentage, brand, type, country";
	} elseif ($tName == "order") {
		$sql = $sql."client, product, quantity";
	}
//
//	$sql = $sql.") VALUES (";
//
//	for ($i = 0; $i < count($values); $i++) {
//		$sql = $sql."'".$values[$i]."'";
//		if ($i < (count($values)-1)) {
//			$sql = $sql.", ";
//		}
//	}
//
//	$sql = $sql.");";
//
	echo $sql;

	$res = $conn->query($sql);

	echo $res;
}








