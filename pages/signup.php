<?php

echo "<!DOCTYPE html>";
	echo "<html lang='en'>";
		echo "<head>";
		echo "<meta charset='utf-8' />";
		echo "<title>Sign Up</title>";
		echo "<link rel='stylesheet' type='text/css' media='screen' href='../css/style.css' />";
	echo "</head>";
	echo "<body>";
		echo "<h1>Sign Up</h1>";
		echo "<p>Fill in the form to sign up as a new customer.<br>
		If you already have an account, you can log in <a href='./login.php'>here</a></p>";
		echo "<div class='form'>";
			echo "<form action='./registration.php' method='post'>";

				echo "<div class='form_col_l'>";
					echo "<p><label>First name: </label><input type='text' name='fname' required='required'></p>";
				echo "</div>";
				echo "<div class='form_col_r'>";
					echo "<p><label>Last name: </label><input type='text' name='lname' required='required'></p>";
				echo "</div>";

				echo "<div class='form_col_l'>";
					echo "<p><label>Street: </label><input type='text' name='street' required='required'></p>";
				echo "</div>";
				echo "<div class='form_col_r'>";
					echo "<p><label>House number: </label><input type='text', name='hnum' required='required'></p>";
				echo "</div>";

				echo "<div class='form_col_l'>";
					echo "<p><label>ZIP Code: </label><input type='text' name='zip' required='required'></p>";
				echo "</div>";
				echo "<div class='form_col_r'>";
					echo "<p><label>City: </label><input type='text' name='city' required='required'></p>";
				echo "</div>";

				echo "<p><label>Country: </label><input type='text' name='country' required='required'></p>";

				echo "<div class='form_col_l'>";
					  echo "<p><label>Email: </label><input type='email' name='email' required='required'></p>";
				echo "</div>";
				echo "<div class='form_col_r'>";
					  echo "<p><label>Birthday: </label><input type='date' name='bday' required='required'></p>";
				echo "</div>";

				echo "<script>var check = function() {";
					  echo "if (document.getElementById('pw').value ==";
						echo "document.getElementById('vpw').value) {";
						echo "document.getElementById('pwl').style.color = 'green';";
						echo "document.getElementById('pwl').innerHTML = 'matching';";
					  echo "} else {";
						echo "document.getElementById('pwl').style.color = 'red';";
						echo "document.getElementById('pwl').innerHTML = 'not matching';";
					  echo "}";
				  echo "}";
				echo "</script>";

				echo "<div class='form_col_l'>";
					echo "<p><label id='pwl'>Password: </label><input id='pw' type='password' name='password' required='required'></p>";
				echo "</div>";
				echo "<div class='form_col_r'>";
					echo "<p><label id='pwl'>Verify password: </label><input id='vpw' type='password' name='vpassword' required='required' onkeyup='check();'></p>";
				echo "</div>";

				echo "<input type='submit' value='Submit'>";

			echo "</form>";
		echo "</div>";
	echo "</body>";
echo "</html>";


