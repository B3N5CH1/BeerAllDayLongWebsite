<?php

echo "<!DOCTYPE html>";
	echo "<html lang='en'>";
		echo "<head>";
		echo "<meta charset='utf-8' />";
		echo "<title>Sign Up</title>";
		echo "<link rel='stylesheet' type='text/css' media='screen' href='../css/styleb.css' />";
		echo "<script src=\"../javascript/sliding_menu.js\"></script>";
	echo "</head>";
	echo "<body>";
	include '../classes/burger.php';
 include '../classes/db_query.php';
 createBurger();


 echo "<nav>
	 <span>
		 <span style=\"font-size:30px;cursor:pointer;position:relative;\" onclick=\"openNav()\">&#9776;
		 </span>
	 </span>
 </nav>";
		echo "<main  class='centered'>";
		echo "<h1>Sign Up</h1>";
		echo "<p>".t('signFormText')."<a href='./login.php".add_param($url,'lang',$_GET['lang'])."'>".t('here')."</a></p>";
		echo "<div class='form'>";
			echo "<form action='./registration.php".add_param($url,'lang',$_GET['lang'])."' method='post'>";

				echo "<div class='form_col_l'>";
					echo "<p><label>".t('fname').": </label><input type='text' name='fname' required='required'></p>";
				echo "</div>";
				echo "<div class='form_col_r'>";
					echo "<p><label>".t('lname').": </label><input type='text' name='lname' required='required'></p>";
				echo "</div>";

				echo "<div class='form_col_l'>";
					echo "<p><label>".t('street').": </label><input type='text' name='street' required='required'></p>";
				echo "</div>";
				echo "<div class='form_col_r'>";
					echo "<p><label>".t('hnum').": </label><input type='text', name='hnum' required='required'></p>";
				echo "</div>";

				echo "<div class='form_col_l'>";
					echo "<p><label>".t('hnum').": </label><input type='text' name='zip' required='required'></p>";
				echo "</div>";
				echo "<div class='form_col_r'>";
					echo "<p><label>".t('city').": </label><input type='text' name='city' required='required'></p>";
				echo "</div>";

				echo "<p><label>".t('country').": </label><input type='text' name='country' required='required'></p>";

				echo "<div class='form_col_l'>";
					  echo "<p><label>Email: </label><input type='email' name='email' required='required'></p>";
				echo "</div>";
				echo "<div class='form_col_r'>";
					  echo "<p><label>".t('bday').": </label><input type='date' name='bday' required='required'></p>";
				echo "</div>";

				echo "<script>var check = function() {";
					  echo "if (document.getElementById('pw').value ==";
						echo "document.getElementById('vpw').value) {";
						echo "document.getElementById('pwl').style.color = 'green';";
						echo "document.getElementById('pwl').innerHTML = 'The passwords match';";
					  echo "} else {";
						echo "document.getElementById('pwl').style.color = 'red';";
						echo "document.getElementById('pwl').innerHTML = 'The passwords do not match';";
					  echo "}";
				  echo "}";
				echo "</script>";

				echo "<div class='form_col_l'>";
					echo "<p><label>".t('pw')."</label><input id='pw' type='password' name='password' required='required'></p>";
				echo "</div>";
				echo "<div class='form_col_r'>";
					echo "<p><label id='pwl'>".t('vpw').": </label><input id='vpw' type='password' name='vpassword' required='required' onkeyup='check();'></p>";
				echo "</div>";

				echo "<input type='submit' value='Submit'>";

			echo "</form>";
		echo "</div>";
		echo"</main>";
	echo "</body>";
echo "</html>";
