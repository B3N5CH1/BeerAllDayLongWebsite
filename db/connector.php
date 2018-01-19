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

function addToDB($tName, $values) {
	global $conn;

	$sql = "INSERT INTO `".$tName."` (";

	if ($tName == "client") {
		$sql = $sql."name, email, password, address, birthday";
		$sql = $sql.") VALUES (";
		$sql = $sql."'".$values[0]."', '".$values[1]."', '".$values[2]."', ".$values[3].", '".$values[4]."'";
	} else if ($tName == "products") {
		$sql = $sql."name, description_de, description_fr, description_en, size, price, percentage, brand, type, nationality";
		$sql = $sql.") VALUES (";
		$sql = $sql."'".$values[0]."', '".$values[1]."', '".$values[2]."', '".$values[3]."', '".$values[4]."', '".$values[5]."', '".$values[6]."', '".$values[7]."', '".$values[8]."', '".$values[9]."'";
	} else if ($tName == "order") {
		$sql = $sql."client, product, quantity";
	}

	$sql = $sql.");";

	echo $sql;

	$res = $conn->query($sql);

	return $res;
}

function login($email, $pw) {
	global $conn;

	$sql = "SELECT password FROM `client` WHERE email='";
	$sql = $sql.$email."';";

	$res = $conn->query($sql);

	if ($res) {
		while ($obj = $res->fetch_object()) {
			if ($obj->password == $pw) {
				return true;
			} else {
				return false;
			}
		}
	} else {
		echo "result is not 1";
		return false;
	}
}

function getUserData($email) {
	global $conn;

	$ret;

	$sql = "SELECT * FROM `client` WHERE email='".$email."';";

	$res = $conn->query($sql);

	if ($res) {
		while ($obj = $res->fetch_object()) {
			$ret[0] = $obj->name;
			$ret[1] = nl2br($obj->address);
			$ret[2] = $obj->birthday;
		}
	} else {
		echo "result is not 1";
	}

	return $ret;

}
function getAllDataFromTable($table) {
	global $conn;

	$sql = "SELECT * FROM `".$table."`;";

	$res = $conn->query($sql);

	return $res;
}

function getWaitingList($client){
	global $conn;
	return $conn->query("SELECT * FROM products, waitingorders WHERE waitingorders.client = '$client' AND products.id=waitingorders.product AND waitingorders.confirmed = 0 ORDER BY products.name ASC");

}

function getDB(){
	global $conn;
	return $conn;
}

function removeFromDB($table, $key) {
	global $conn;

	$sql = "DELETE FROM `".$table."` WHERE (";

	if ($table == 'client') {
		$sql = $sql."email='".$key."'";
	} else if ($table == 'products') {
		$sql = $sql."id='".$key."'";
	}

	$sql = $sql.");";

	$res = $conn->query($sql);

	return $res;
}

if (isset($_POST['rmemail'])) {
	echo removeFromDB('client', $_POST['rmemail']);
} else if (isset($_POST['id'])) {
	echo "<script>alert('post correct')</script>";
	echo removeFromDB('products', $_POST['id']);
}
