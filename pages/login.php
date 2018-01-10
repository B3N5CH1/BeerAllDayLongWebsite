<?php

function get_param($name, $default) {
	if (isset($_GET[$name]))
		return urldecode($_GET[$name]);
	else
		return $default;
}

function add_param(&$url, $name, $value) {
	$sep = strpos($url, '?') !== false ? '&' : '?';
	$url .= $sep . $name . "=" . urlencode($value);
	return $url;

}

function content($val) {
	echo t($val);
}

function languages($language) {
	$languages = array('de','fr', 'en');
	$urlBase = $_SERVER['PHP_SELF'];
	foreach( $languages as $lang ) {
		$url = $urlBase;
		$url = add_param($url,'type',$_GET['type']);
		$class = $language == $lang ? 'active' : 'inactive';
		echo "<a  href=\"".add_param($url,'lang', $lang)."\">".strtoupper($lang)."</a>";
	}
}

function t($key) {
	global $language;
	$texts = array(
		'url' => array(
			'de' => 'lang=de',
			'fr' => 'lang=fr',
			'en' => 'lang=en'
		),
		'fill' => array(
			'de' => 'Füllen Sie das Formular aus, wenn Sie bereits ein Kunde sind.<br>Wenn Sie noch keinen haben, registrieren Sie sich ',
			'fr' => '',
			'en' => 'Fill in the form to log in as an existing customer.<br>If you don\'t have an account yet, you can sign up for one ',
		),
		'here' => array(
			'de' => 'hier.',
			'fr' => 'ici.',
			'en' => 'here.'
		),
		'pw' => array(
			'de' => 'Passwort',
			'fr' => '',
			'en' => 'Password'
		)

	);
	if (isset($texts[$key][$language])) {
		return $texts[$key][$language];
	} else {
		return "[$key]";
	}
}

$language = get_param('lang', 'en');


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
		echo "<p>".t("fill")."<a href='./signup.php'>".t("here")."</a></p>";
		echo "<div class='form'>";
			echo "<form action='./userPage.php' method='post'>";

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
