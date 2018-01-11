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

function getData($table) {
	global $conn;

	$sql = "SELECT * FROM `".$table."`;";

	$res = $conn->query($sql);

	return $res;
}

echo "<!DOCTYPE html>";
	echo "<html lang='en'>";
		echo "<head>";
		echo "<meta charset='utf-8' />";
		echo "<title>Backend Access</title>";
		echo "<script src=\"../javascript/sliding_menu.js\"></script>";
		echo "<link rel='stylesheet' type='text/css' media='screen' href='../css/styleb.css' />";
	echo "</head>";
	echo "<body>";

		$values = getData("client");

		echo "<h3>Clients</h3>";
		echo "<table>";
			echo "<tr>";
				echo "<th>Email</th>";
				echo "<th>Name</th>";
				echo "<th>Address</th>";
				echo "<th>Birthday</th>";
				echo "<th>Orders</th>";
			echo "</tr>";

		if ($values->num_rows > 0) {
			// output data of each row
			while($row = $values->fetch_assoc()) {
				echo "<tr>";
					echo "<td>".$row['email']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".nl2br($row['address'])."</td>";
					echo "<td>".$row['birthday']."</td>";
					echo "<td>".$row['orders']."</td>";
				echo "</tr>";
			}
			echo "</table>";

		} else {
			echo "0 results";
		}


		$values = getData("products");

		echo "<h3>Products</h3>";
		echo "<table>";
			echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Name</th>";
				echo "<th>Description</th>";
				echo "<th>Size [cl]</th>";
				echo "<th>Price [CHF]</th>";
				echo "<th>Vol.-%</th>";
				echo "<th>Brand</th>";
				echo "<th>Type</th>";
				echo "<th>Nationality</th>";
			echo "</tr>";

		if ($values->num_rows > 0) {
			// output data of each row
			while($row = $values->fetch_assoc()) {
				echo "<tr>";
					echo "<td>".$row['id']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['description_fr']."</td>";
					echo "<td>".$row['size']."</td>";
					echo "<td>".$row['price']."</td>";
					echo "<td>".$row['percentage']."</td>";
					echo "<td>".$row['brand']."</td>";
					echo "<td>".$row['type']."</td>";
					echo "<td>".$row['nationality']."</td>";
				echo "</tr>";
			}
			echo "</table>";

		} else {
			echo "0 results";
		}


		$values = getData("order");

		echo "<h3>Order</h3>";
		echo "<table>";
			echo "<tr>";
				echo "<th>ID</th>";
				echo "<th>Client email</th>";
				echo "<th>Product ID</th>";
				echo "<th>Amount</th>";
			echo "</tr>";

		if ($values->num_rows > 0) {
			// output data of each row
			while($row = $values->fetch_assoc()) {
				echo "<tr>";
					echo "<td>".$row['id']."</td>";
					echo "<td>".$row['client']."</td>";
					echo "<td>".$row['product']."</td>";
					echo "<td>".$row['quantity']."</td>";
				echo "</tr>";
			}
			echo "</table>";

		} else {
			echo "0 results";
		}

		echo "</main>";
	echo "</body>";
echo "</html>";

























