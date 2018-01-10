<?php

	include '../classes/burger.php';
	include '../classes/db_query.php';


echo "<!DOCTYPE html>";
	echo "<html lang='en'>";
		echo "<head>";
		echo "<meta charset='utf-8' />";
		echo "<title>Login</title>";
		echo "<script src=\"../javascript/sliding_menu.js\"></script>";
		echo "<link rel='stylesheet' type='text/css' media='screen' href='../css/styleb.css' />";
	echo "</head>";
	echo "<body>";
		createBurger();
		echo "<nav><span><span style=\"font-size:30px;cursor:pointer;position:relative;\" onclick=\"openNav()\">&#9776;</span></span></nav>";
		echo "<main class='centered'>";
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
		echo "</main>";
	echo "</body>";
echo "</html>";
