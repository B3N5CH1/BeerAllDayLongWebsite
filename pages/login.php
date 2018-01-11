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
		echo "<p>".t("fill")."<a href='./signup.php".add_param($url,'lang',$_GET['lang'])."'>".t("here")."</a></p>";
		echo "<div class='form'>";
			echo "<form action='./userPage.php".add_param($url,'lang',$_GET['lang'])."' method='post'>";

				echo "<div class='form_col_l'>";
					echo "<p><label>Email: </label><input type='email' name='email' required='required'>";
				echo "</div>";

				echo "<div class='form_col_r'>";
					echo "<p><label id='pwl'>".t("pw").": </label><input id='pw' type='password' name='password' required='required'></p>";
				echo "</div>";

				echo "<input type='submit' value='Submit'>";

			echo "</form>";
		echo "</div>";
		echo "</main>";
	echo "</body>";
echo "</html>";
