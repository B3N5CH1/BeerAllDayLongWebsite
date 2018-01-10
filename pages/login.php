<?php

echo "<!DOCTYPE html>";
	echo "<html lang='en'>";
		echo "<head>";
		echo "<meta charset='utf-8' />";
		echo "<title>Login</title>";
		echo "<link rel='stylesheet' type='text/css' media='screen' href='../css/styleb.css' />";
	echo "</head>";
	echo "<body class='centered'>";
		echo "<h1>Login</h1>";
		echo "<p>Fill in the form to log in as an existing customer.<br>
		If you don't have an account yet, you can sign up for one <a href='./signup.php'>here</a></p>";
		echo "<div class='form'>";
			echo "<form action='./userPage.php' method='post'>";

				echo "<div class='form_col_l'>";
					  echo "<p><label>Email: </label><input type='email' name='email' required='required'></p>";
				echo "</div>";

				echo "<div class='form_col_r'>";
					echo "<p><label id='pwl'>Password: </label><input id='pw' type='password' name='password' required='required'></p>";
				echo "</div>";

				echo "<input type='submit' value='Submit'>";

			echo "</form>";
		echo "</div>";
	echo "</body>";
echo "</html>";


