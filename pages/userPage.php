<?php

require "../db/connector.php";


if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

echo "<!DOCTYPE html>";
echo "<html lang='en'>";
	echo "<head>";
	echo "<meta charset='utf-8' />";
	echo "<title>User Page</title>";
	echo "<link rel='stylesheet' type='text/css' media='screen' href='../css/styleb.css' />";
echo "</head>";
echo "<body class='centered'>";
	echo "<h2>User Page</h2>";


	if (isset($_SESSION["email"])) {
		// logged in
		// showUserInfo();
	} elseif (isset($_POST["email"])) {
		$email = $_POST["email"];
		$pw = md5($_POST["password"]);

		if (login($email, $pw)) {
			$values = getUserData($email);

			$_SESSION["email"] = $email;
			$_SESSION["name"] = $values[0];
			$_SESSION["address"] = $values[1];
			// showUserInfo();
		} else {
			// login failure
		}




	// not logged in
	// post data
} else {
	// not logged in
	// no post data
}



	echo "<a href='../home.php'>Home</a>";

		echo "<p>Success! You successfully logged in. See your information below.</p>";

		echo "<h3>Name</h3>";
		echo "<p>".$_SESSION["name"]."</p>";
		echo "<h3>Address</h3>";
		echo "<p>".$_SESSION["address"]."</p>";

		echo "<p class='bottom'>Logout Button</p>";

	echo "</body>";

} else {
	echo "Failure<br>The passwords do not match!";
	echo "FOCKING BLOODY ERROR!";
}













