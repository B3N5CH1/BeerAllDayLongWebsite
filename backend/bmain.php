<?php

require "../db/connector.php";

?>
<!DOCTYPE html>
<html lang='en'>
	<head>
		<meta charset='utf-8' />
		<title>Backend Access</title>
		<link rel='stylesheet' type='text/css' href='../css/jquery-ui.css'>
		<link rel='stylesheet' type='text/css' media='screen' href='../css/styleb.css' />
		<script src='../javascript/jquery-3.2.1.min.js'></script>
  		<script src='../javascript/jquery-ui.js'></script>
		<script src='../javascript/jquery_form.js'></script>
	</head>
	<body>

		<?php $values = getAllDataFromTable("client"); ?>

		<h3>Clients</h3>
		<?php
		if ($values->num_rows > 0) {

			?><table>
				<tr>
					<th>Email</th>
					<th>Name</th>
					<th>Address</th>
					<th>Birthday</th>
					<th>Orders</th>
					<th>Remove</th>
				</tr><?php

			// output data of each row
			while($row = $values->fetch_assoc()) {
				echo "<tr>";
					echo "<td id='".$row['email']."'>".$row['email']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".nl2br($row['address'])."</td>";
					echo "<td>".$row['birthday']."</td>";
					echo "<td>".$row['orders']."</td>";
					echo "<td><button id='remove-client' value='".$row['email']."' >Delete</button></td>";
				echo "</tr>";
			}
			echo "</table>";

		} else {
			echo "0 results";
		}

		echo "<br>";
		echo "<button id='create-client'>Add new client</button>";

		$values = getAllDataFromTable("products");

		if ($values->num_rows > 0) {
			?><h3>Products</h3>
			<table>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Description</th>
					<th>Size [cl]</th>
					<th>Price [CHF]</th>
					<th>Vol.-%</th>
					<th>Brand</th>
					<th>Type</th>
					<th>Nationality</th>
					<th>Remove</th>
				</tr><?php

			// output data of each row
			while($row = $values->fetch_assoc()) {
				echo "<tr>";
					echo "<td id='".$row['id']."'>".$row['id']."</td>";
					echo "<td>".$row['name']."</td>";
					echo "<td>".$row['description_en']."</td>";
					echo "<td>".$row['size']."</td>";
					echo "<td>".$row['price']."</td>";
					echo "<td>".$row['percentage']."</td>";
					echo "<td>".$row['brand']."</td>";
					echo "<td>".$row['type']."</td>";
					echo "<td>".$row['nationality']."</td>";
					echo "<td><button id='remove-product' value='".$row['id']."' >Delete</button></td>";
				echo "</tr>";
			}
			echo "</table>";

		} else {
			echo "0 results";
		}

		echo "<br>";
		echo "<button id='add-product'>Add new product</button>";


		$values = getAllDataFromTable("waitingorders");

		echo "<h3>Orders (including cart)</h3>";

		if ($values->num_rows > 0) {
			?><table>
				<tr>
					<th>ID</th>
					<th>Client email</th>
					<th>Product ID</th>
					<th>Amount</th>
					<th>Order Group</th>
					<th>Confirmed</th>
				</tr><?php

			// output data of each row
			while($row = $values->fetch_assoc()) {
				echo "<tr>";
					echo "<td>".$row['id']."</td>";
					echo "<td><a href='#".$row['client']."'>".$row['client']."</a></td>";
					echo "<td><a href='#".$row['product']."'>".$row['product']."</td>";
					echo "<td>".$row['quantity']."</td>";
					echo "<td>".$row['orderGroup']."</td>";
					echo "<td>".$row['confirmed']."</td>";
				echo "</tr>";
			}
			echo "</table>";

		} else {
			echo "0 results";
		}

		?>
		<div id='dialog-form-client' title='Add new Client'>
			<form>
				<p><label>First name: </label><input type='text' name='fname' id='fname' required='required'></p>
				<p><label>Last name: </label><input type='text' name='lname' id='lname' required='required'></p>

				<p><label>Street: </label><input type='text' name='street' id='street' required='required'></p>
				<p><label>House number: </label><input type='text', name='hnum' id='hnum' required='required'></p>

				<p><label>ZIP Code: </label><input type='text' name='zip' id='zip' required='required'></p>
				<p><label>City: </label><input type='text' name='city' id='city' required='required'></p>

				<p><label>Country: </label><input type='text' name='country' id='country' required='required'></p>

				<p><label>Email: </label><input type='email' name='email' id='email' required='required'></p>
				<p><label>Birthday: </label><input type='date' name='bday' id='bday' required='required'></p>

				<script>var check = function() {
					if (document.getElementById('pw').value ==
					document.getElementById('vpw').value) {
					document.getElementById('pwl').style.color = 'green';
					document.getElementById('pwl').innerHTML = 'The passwords match';
				} else {
					document.getElementById('pwl').style.color = 'red';
					document.getElementById('pwl').innerHTML = 'The passwords do not match';
				}
			  }
			</script>

			<p><label>Password: </label><input id='pw' type='password' name='password' required='required'></p>
			<p><label id='pwl'>Verify password: </label><input id='vpw' type='password' name='vpassword' required='required' onkeyup='check();'></p>

			<p class='validateTips'>All form fields are required.</p>


      		<!-- Allow form submission with keyboard without duplicating the dialog button -->
		    <input type='submit' value='Submit' tabindex='-1' style='position:absolute; top:-1000px'>
			</form>
		</div>

		<div id='dialog-form-product' title='Add new Product'>
			<form>
				<p><label>Name: </label><input type='text' name='name' id='name' required='required'></p>

				<p><label>Description German: </label><input type='text' name='description_de' id='description_de' required='required'></p>
				<p><label>Description French: </label><input type='text' name='description_fr' id='description_fr' required='required'></p>
				<p><label>Description English: </label><input type='text', name='description_en' id='description_en' required='required'></p>

				<p><label>Size [cl]: </label><input type='number'  min='0' step='1' name='size' id='size' required='required'></p>

				<p><label>Price [CHF]: </label><input type='number' min='0' step='0.05' name='price' id='price' required='required'></p>

				<p><label>Percentage: </label><input type='number' min='0' step='0.01' name='percentage' id='percentage' required='required'></p>

				<p><label>Brand: </label><input type='text' name='brand' id='brand' required='required'></p>

				<p><label>Type: </label><input type='text' name='type' id='type' required='required'></p>

				<p><label>Nationality: </label><input type='text' name='nationality' id='nationality' required='required'></p>

				<p class='validateTips'>All form fields are required.</p>


      		<!-- Allow form submission with keyboard without duplicating the dialog button -->
		    <input type='submit' value='Submit' tabindex='-1' style='position:absolute; top:-1000px'>
			</form>
		</div>

		</main>
	</body>
</html>
