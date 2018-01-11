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
				  'de' => 'Über uns text',
				  'fr' => 'Sur nous text',
				  'en' => 'About us text'
				),
		'policy_text' => array(
		  'de' => 'Hier ist unsere Policy',
		  'fr' => 'C\'est notre policy',
		  'en' => 'This is our policy'
		),
		'url' => array(
			'de' => 'lang=de',
			'fr' => 'lang=fr',
			'en' => 'lang=en'
		),
		'fill' => array(
			'de' => 'Füllen Sie das Formular aus, wenn Sie bereits ein Kunde sind.<br>Wenn Sie noch keinen haben, registrieren Sie sich ',
			'fr' => 'asdf',
			'en' => 'Fill in the form to log in as an existing customer.<br>If you don\'t have an account yet, you can sign up for one ',
		),
		'here' => array(
			'de' => 'hier',
			'fr' => 'ici',
			'en' => 'here'
		),
		'pw' => array(
			'de' => 'Passwort',
			'fr' => 'asdf',
			'en' => 'Password'
		),
		'loginError' => array(
			'de' => 'Fehler beim einloggen.<br>Passwort und Email stimmten mit keinem Eintrag in der Datenbank überein.<br>',
			'fr' => '',
			'en' => 'Could not log in.<br>Password and Email did not match any entry in the database.<br>'
		),
		'inproperAccess' => array(
			'de' => 'Sie möchten auf ungeeignetem Weg auf diese Seite zugreiffen. Bitte Verwenden Sie das Login.',
			'fr' => 'ahfi',
			'en' => 'You\'re accessing this page imroperly. Plese use the login.'

		),
		'rmvBtn' => array(
			'de' => 'Aus dem Warenkorb entfernen',
			'fr' => 'Enlever du panier',
			'en' => 'Remove from Cart'
		)

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
