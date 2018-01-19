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
		if (strpos($url, '/products.php?type')!==false){
			$url = add_param($url,'type',$_GET['type']);
		};
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
		'page' => array(
			'de'=>'Seite',
			'fr'=>'Page',
			'en'=>'Page'
		),
		'content' => array(
			'de'=>'Willkommen auf der Seite ',
			'fr'=>'Bienvenue à  la page ',
			'en'=>'Welcome to the page '
		),
		'button' => array(
			'de' => 'Zu den Produkten!',
			'fr' => 'Aux Produits!',
			'en' => 'To the Products!'
		),
		'blondebeer' => array(
			'de' => 'Zu den Produkten!',
			'fr' => 'Aux Produits!',
			'en' => 'To the Products!'
		),
		'darkbeer' => array(
			'de' => 'Zu den Produkten!',
			'fr' => 'Aux Produits!',
			'en' => 'To the Products!'
		),
		'fruitbeer' => array(
			'de' => 'Zu den Produkten!',
			'fr' => 'Aux Produits!',
			'en' => 'To the Products!'
		),
		'ipabeer' => array(
			'de' => 'Zu den Produkten!',
			'fr' => 'Aux Produits!',
			'en' => 'To the Products!'
		),
		'specialbeer' => array(
			'de' => 'Zu den Produkten!',
			'fr' => 'Aux Produits!',
			'en' => 'To the Products!'
		),
		'whitebeer' => array(
			'de' => 'Zu den Produkten!',
			'fr' => 'Aux Produits!',
			'en' => 'To the Products!'
		),
		'cart' => array(
			'de' => 'Warenkorb',
			'fr' => "Panier d'achats",
			'en' => 'Cart'
		),
		'about' => array(
			'de' => 'Über uns',
			'fr' => 'A propos de nous',
			'en' => 'About us'
		),
		'policy' => array(
			'de' => 'Policy',
			'fr' => 'Policy',
			'en' => 'Policy'
		),
		'contact' => array(
			'de' => 'Kontakt',
			'fr' => 'Contact',
			'en' => 'Contact'
		),
		'currency' => array(
			'de' => 'SFR',
			'fr' => 'CHF',
			'en' => 'CHF'
		),
		'addtocart' => array(
			'de' => 'Zum Warenkorb hinzufügen',
			'fr' => 'Ajout au panier',
			'en' => 'Add to cart'
		),
		'about_text' => array(
			'de' => 'Wir sind eine Gruppe von Studenten an der Berner Fachhochschule und besuchen das Studium in Informatik im dritten Jahr.',
			'fr' => 'Nous sommes un groupe de deux étudiants de la Haute école spécialisé de Berne, étudiant les TI depuis trois ans.',
			'en' => 'We are a group of two student from the University of Applied Science of Bern, studying IT for the third year now.'
		),
		'policy_text' => array(
			'de' => 'Momentan garantieren wir keine Lieferung, da dies nur ein Übungsshop ist. Deswegen behalten wir uns alle Rechte vor, was Lieferung oder Genauigkeit der Informationen auf dieser Webseite anbelangt.',
			'fr' => 'Ceci est notre policy',
			'en' => 'For the time being, we don\'t ensure any delivery, since this is only a trial shop. Therefore we reserve all rights, regarding delivery or accuracy of the information found on the webshop.'
		),
		'url' => array(
			'de' => 'lang=de',
			'fr' => 'lang=fr',
			'en' => 'lang=en'
		),
		'fill' => array(
			'de' => 'Füllen Sie das Formular aus, wenn Sie bereits ein Kunde sind.<br>Wenn Sie noch keinen haben, registrieren Sie sich ',
			'fr' => 'Remplissez le formulaire pour vous inscrire.<br>Si vous n\'avez pas de compte vous pouvez vous enregistrer ',
			'en' => 'Fill in the form to log in as an existing customer.<br>If you don\'t have an account yet, you can sign up for one ',
		),
		'here' => array(
			'de' => 'hier',
			'fr' => 'ici',
			'en' => 'here'
		),
		'pw' => array(
			'de' => 'Passwort',
			'fr' => 'Mot de passe',
			'en' => 'Password'
		),
		'loginError' => array(
			'de' => 'Fehler beim einloggen.<br>Passwort und Email stimmten mit keinem Eintrag in der Datenbank überein.<br>',
			'fr' => 'Problème lors du login.<br>Mot de passe et email ne correspondent à aucune entré de la base de donné.<br>',
			'en' => 'Could not log in.<br>Password and Email did not match any entry in the database.<br>'
		),
		'inproperAccess' => array(
			'de' => 'Sie möchten auf ungeeignetem Weg auf diese Seite zugreiffen. Bitte Verwenden Sie das Login.',
			'fr' => 'Vous essayez d\'acceder à cette page d\'une manière peu orthodoxe. Utilisez s\'il vous plait le login.',
			'en' => 'You\'re accessing this page imroperly. Plese use the login.'
		),
		'rmvBtn' => array(
			'de' => 'Aus dem Warenkorb entfernen',
			'fr' => 'Enlever du panier',
			'en' => 'Remove from Cart'
		),
		'errBday' => array(
			'de' => '[Error] Kein Geburtsdatum erhalten.',
			'fr' => '[Erreur] Aucune date de naissance reçue.',
			'en' => '[Error] No birthday received.'
		),
		'errEmail' => array(
			'de' => '[Error] Kein Email erhalten.',
			'fr' => '[Erreur] Aucun email reçu.',
			'en' => '[Error] No email received.'
		),
		'errPw' => array(
			'de' => '[Error] Kein Passwort erhalten.',
			'fr' => '[Erreur] Aucun mot de passe reçu.',
			'en' => '[Error] No password received.'
		),
		'errCountry' => array(
			'de' => '[Error] Kein Land erhalten.',
			'fr' => '[Erreur] Aucun pays reçu.',
			'en' => '[Error] No country received.'
		),
		'errCity' => array(
			'de' => '[Error] Keine Postleitzahl und/oder Stadt erhalten.',
			'fr' => '[Erreur] Aucun code postal/ville reçu.',
			'en' => '[Error] No zip and/or city received.'
		),
		'errAdd' => array(
			'de' => '[Error] Keine Strasse und/oder Hausnummer erhalten.',
			'fr' => '[Erreur] Aucune adresse/numéro reçu.',
			'en' => '[Error] No street and/or house number received.'
		),
		'errName' => array(
			'de' => '[Error] Keinen Namen erhalten.',
			'fr' => '[Erreur] Aucun nom reçu.',
			'en' => '[Error] No name received.'
		),
		'emailBody' => array(
			'de' => 'Hallo!\n\nSie haben sich erfolgreich auf LeBeerShop.ch registriert.\n\nSie können sich jetzt mit dieser Email Adresse einloggen.\n\nWir hoffen, Sie finden etwas, was Ihnen mundet.\n\nFreundliche Grüsse\nDas LeBeerShop Team',
			'fr' => 'Bonjours!\n\nVous vous êtes enregistrez avec succès auprès de LeBeerShop.ch.\n\nVous pouvez dorénavant vous connecter avec cette adresse email.\n\nNous espèrons que vous trouvez votre bonheure.\n\nMeilleures salutations\nLa team de LeBeerSop',
			'en' => 'Hi!\n\nYou successfully registrated on LeBeerShop.ch\n\nYou can login with this email address.\n\nWe hope you find something you\'ll enjoy!\n\nKind regards\nThe LeBeerShop Team'
		),
		'regSucc' => array(
			'de' => 'Sie haben sich erfolgreich registriert. Zum einloggen klicken sie ',
			'fr' => 'Vous vous êtes enregistrez avec succès. Pour vous connectez clickez ',
			'en' => 'You successfully registrated. You can log in '
		),
		'regErr' => array(
			'de' => 'Es gab einen unerwarteten Fehler, bitte versuchen Sie es erneut.',
			'fr' => 'Une erreur est apparue, veuillez réessayer.',
			'en' => 'There was an error signing up. Please try again.'
		),
		'tryAgain' => array(
			'de' => 'Bitte versuchen Sie es erneut.',
			'fr' => 'Veuillez réessayer.',
			'en' => 'Please try again.'
		),
		'logSucc' => array(
			'de' => 'Sie haben sich erfolgreich eingeloggt. Ihre Informationen sehen Sie unten.',
			'fr' => 'Vous vous êtes connecté avec succès. Vous pouvez voire vos information ci-dessous.',
			'en' => 'You are successfully logged in. See your information below.'
		),
		'name' => array(
			'de' => 'Name',
			'fr' => 'Nom',
			'en' => 'Name'
		),
		'address' => array(
			'de' => 'Adresse',
			'fr' => 'Adresse',
			'en' => 'Address'
		),
		'signFormText' => array(
			'de' => 'Füllen Sie das Formular aus, um sich als neuer Kunde zu registrieren.<br>
			Wenn Sie schon ein Konto haben, können Sie sich einloggen. Dafür klicken Sie ',
			'fr' => 'Remplissez le formulaire pour vous enregistrez en tant que nouvel utilisateur.<br> Si vous en possédez déjà un vous pouvez vous connecter ',
			'en' => 'Fill in the form to sign up as a new customer.<br>
			If you already have an account, you can log in'
		),
		'fname' => array(
			'de' => 'Vorname',
			'fr' => 'Prénom',
			'en' => 'First Name'
		),
		'lname' => array(
			'de' => 'Nachname',
			'fr' => 'Nom',
			'en' => 'Last Name'
		),
		'street' => array(
			'de' => 'Strasse',
			'fr' => 'Rue',
			'en' => 'Street'
		),
		'hnum' => array(
			'de' => 'Hausnummer',
			'fr' => 'Numéro de maison',
			'en' => 'House Number'
		),
		'zip' => array(
			'de' => 'Postleitzahl',
			'fr' => 'Code postal',
			'en' => 'ZIP Code'
		),
		'city' => array(
			'de' => 'Stadt',
			'fr' => 'Ville',
			'en' => 'City'
		),
		'country' => array(
			'de' => 'Land',
			'fr' => 'Pays',
			'en' => 'Country'
		),
		'bday' => array(
			'de' => 'Geburtsdatum',
			'fr' => 'Date d\'anniversaire',
			'en' => 'Birthday'
		),
		'vpw' => array(
			'de' => 'Passwort Verifizierung',
			'fr' => 'Vérifier le mot de passe',
			'en' => 'Verify Password'
		)
// <<<<<<< HEAD
// 	function t($key) {
// 	  global $language;
// 	  $texts = array(
// 	      'url' => array(
// 	        'de' => 'lang=de',
// 	        'fr' => 'lang=fr',
// 	        'en' => 'lang=en'
// 	      ),
// 	      'page' => array(
// 	          'de'=>'Seite',
// 	          'fr'=>'Page',
// 	          'en'=>'Page'
// 	      ),
// 	      'content' => array(
// 	          'de'=>'Unsere Produkte ',
// 	          'fr'=>'Nos Produits ',
// 	          'en'=>'Our Products '
// 	      ),
// 	      'button' => array(
// 	          'de' => 'Zu den Produkten!',
// 	          'fr' => 'Aux Produits!',
// 	          'en' => 'To the Products!'
// 	      ),
// 	      'blondebeer' => array(
// 	          'de' => 'Zu den Produkten!',
// 	          'fr' => 'Aux Produits!',
// 	          'en' => 'To the Products!'
// 	      ),
// 	      'darkbeer' => array(
// 	          'de' => 'Zu den Produkten!',
// 	          'fr' => 'Aux Produits!',
// 	          'en' => 'To the Products!'
// 	      ),
// 	      'fruitbeer' => array(
// 	          'de' => 'Zu den Produkten!',
// 	          'fr' => 'Aux Produits!',
// 	          'en' => 'To the Products!'
// 	      ),
// 	      'ipabeer' => array(
// 	          'de' => 'Zu den Produkten!',
// 	          'fr' => 'Aux Produits!',
// 	          'en' => 'To the Products!'
// 	      ),
// 	      'specialbeer' => array(
// 	          'de' => 'Zu den Produkten!',
// 	          'fr' => 'Aux Produits!',
// 	          'en' => 'To the Products!'
// 	      ),
// 	      'whitebeer' => array(
// 	          'de' => 'Zu den Produkten!',
// 	          'fr' => 'Aux Produits!',
// 	          'en' => 'To the Products!'
// 	      ),
// 	      'cart' => array(
// 	          'de' => 'Warenkorb',
// 	          'fr' => "Panier d'achats",
// 	          'en' => 'Cart'
// 	      ),
// 	      'about' => array(
// 	          'de' => 'Über uns',
// 	          'fr' => 'A propos de nous',
// 	          'en' => 'About us'
// 	      ),
// 	      'policy' => array(
// 	          'de' => 'Policy',
// 	          'fr' => 'Policy',
// 	          'en' => 'Policy'
// 	      ),
// 	      'contact' => array(
// 	          'de' => 'Kontakt',
// 	          'fr' => 'Contact',
// 	          'en' => 'Contact'
// 	      ),
// 	      'currency' => array(
// 	          'de' => 'SFR',
// 	          'fr' => 'CHF',
// 	          'en' => 'CHF'
// 	      ),
// 	      'addtocart' => array(
// 	          'de' => 'Zum Warenkorb hinzufügen',
// 	          'fr' => 'Ajout au panier',
// 	          'en' => 'Add to cart'
// 	      ),
// 	      'about_text' => array(
// 	        'de' => 'Wir sind eine Gruppe von Studenten an der Berner Fachhochschule und besuchen das Studium in Informatik.',
// 	        'fr' => 'Nous sommes un groupe de deux étudiants de la Haute école spécialisé de Berne, étudiant les TI depuis trois ans.',
// 	        'en' => 'We are a group of two student from the University of Applied Science of Bern, studying IT for the third year now.'
// 	      ),
// 	  'policy_text' => array(
// 	    'de' => 'Hier ist unsere Policy',
// 	    'fr' => 'Ceci est notre policy',
// 	    'en' => 'This is our policy'
// 	  ),
// 	  'url' => array(
// 	    'de' => 'lang=de',
// 	    'fr' => 'lang=fr',
// 	    'en' => 'lang=en'
// 	  ),
// 	  'fill' => array(
// 	    'de' => 'Füllen Sie das Formular aus, wenn Sie bereits ein Kunde sind.<br>Wenn Sie noch keinen haben, registrieren Sie sich ',
// 	    'fr' => 'Remplissez le formulaire pour vous inscrire.<br>Si vous n\'avez pas de compte vous pouvez vous enregistrer ',
// 	    'en' => 'Fill in the form to log in as an existing customer.<br>If you don\'t have an account yet, you can sign up for one ',
// 	  ),
// 	  'here' => array(
// 	    'de' => 'hier',
// 	    'fr' => 'ici',
// 	    'en' => 'here'
// 	  ),
// 	  'pw' => array(
// 	    'de' => 'Passwort',
// 	    'fr' => 'Mot de passe',
// 	    'en' => 'Password'
// 	  ),
// 	  'loginError' => array(
// 	    'de' => 'Fehler beim einloggen.<br>Passwort und Email stimmten mit keinem Eintrag in der Datenbank überein.<br>',
// 	    'fr' => 'Problème lors du login.<br>Mot de passe et email ne correspondent à aucune entré de la base de donné.<br>',
// 	    'en' => 'Could not log in.<br>Password and Email did not match any entry in the database.<br>'
// 	  ),
// 	  'inproperAccess' => array(
// 	    'de' => 'Sie möchten auf ungeeignetem Weg auf diese Seite zugreiffen. Bitte Verwenden Sie das Login.',
// 	    'fr' => 'Vous essayez d\'acceder à cette page d\'une manière peu orthodoxe. Utilisez s\'il vous plait le login.',
// 	    'en' => 'You\'re accessing this page imroperly. Plese use the login.'
//
// 	  ),
// 	  'rmvBtn' => array(
// 	    'de' => 'Aus dem Warenkorb entfernen',
// 	    'fr' => 'Enlever du panier',
// 	    'en' => 'Remove from Cart'
// 	  ),
// 		'congrats' => array (
// 			'de' => 'Danke für ihren Einkaufe !',
// 			'fr' => 'Merci pour votre commande !',
// 			'en' => 'Thank you for your purchase !!'
// 		)
//
// 	  );
// 	  if (isset($texts[$key][$language])) {
// 	    return $texts[$key][$language];
// 	  } else {
// 	    return "[$key]";
// 	  }
// =======


	);
	if (isset($texts[$key][$language])) {
		return $texts[$key][$language];
	} else {
		return "[$key]";
	}
}

$language = get_param('lang', 'en');



function createBurger(){
	$language = get_param('lang', 'en');

	echo  "<div id=\"mySidenav\" class=\"sidenav\">
	<a href=\"javascript:void(0)\" class=\"closebtn\" onclick=\"closeNav()\">&times;</a>
	";

	$url = "home.php";
	echo "<a href=\"".add_param($url,'lang',$_GET['lang'])."\">Home</a>" ;

	if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

	if (isset($_SESSION["email"]) && $_SESSION["address"]) {
		$url = "userPage.php";
		echo "<a href=\"".add_param($url,'lang',$_GET['lang'])."\">User</a>" ;
	} else {
		$url = "login.php";
		echo "<a href=\"".add_param($url,'lang',$_GET['lang'])."\">Login/Sign up</a>" ;
	}

	$url = "cart.php";
	echo "<a href=\"".add_param($url,'lang',$_GET['lang'])."\">".t('cart')."</a>" ;

	$url = "about.php";
	echo "<a href=\"".add_param($url,'lang',$_GET['lang'])."\">".t('about')."</a>" ;

	$url = "policy.php";
	echo "<a href=\"".add_param($url,'lang',$_GET['lang'])."\">".t('policy')."</a>" ;

	$url = "contact.php";
	echo "<a href=\"".add_param($url,'lang',$_GET['lang'])."\">".t('contact')."</a>" ;
	echo "<div>".languages($language)." </div>";
	echo "</div>";
}



?>
