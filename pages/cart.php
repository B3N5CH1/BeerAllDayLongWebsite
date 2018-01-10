<?php

if (session_status() == PHP_SESSION_NONE) {
	session_start();
}

if (isset($_SESSION["email"])) {
	echo session_id();
	echo "<p>".$_SESSION["email"]."<br>".$_SESSION["name"]."</p>";
} else {
	// user is not logged in -> Login page
}
