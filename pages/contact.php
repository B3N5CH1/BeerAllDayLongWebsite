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
            'de' => 'Politik',
            'fr' => 'Politique',
            'en' => 'Policy'
        ),
				'contact' => array(
            'de' => 'Kontakt',
            'fr' => 'Contact',
            'en' => 'Contact'
        ),
        'about_text' => array(
          'de' => '',
          'fr' => '',
          'en' => ''
        )

		);
		if (isset($texts[$key][$language])) {
			return $texts[$key][$language];
		} else {
			return "[$key]";
		}
	}

	$language = get_param('lang', 'en');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
				<script src="../javascript/sliding_menu.js"></script>
        <meta charset="utf-8" />
        <title>Beer All Day Long</title>
        <link rel="stylesheet" type="text/css"
        media="screen" href="../css/styleq.css" />
				<link rel="stylesheet" type="text/css"
        media="screen" href="../css/styleb.css" />

    </head>

    <body>
			<div id="mySidenav" class="sidenav">
  			<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
          <a href="../index.php" >Back</a>
				<?php
					$url = "cart.php";
					echo "<a href=\"".add_param($url,'lang',$_GET['lang'])."\">".t('cart')."</a>" ;?>
  			<?php
					$url = "about.php";
					echo "<a href=\"".add_param($url,'lang',$_GET['lang'])."\">".t('about')."</a>" ;?>
				<?php
					$url = "policy.php";
					echo "<a href=\"".add_param($url,'lang',$_GET['lang'])."\">".t('policy')."</a>" ;?>
					<?php
						$url = "contact.php";
						echo "<a href=\"".add_param($url,'lang',$_GET['lang'])."\">".t('contact')."</a>" ;?>
				<div><?php languages($language); ?></div>
			</div>

      <nav>
				<span>
					<span style="font-size:30px;cursor:pointer;position:relative;" onclick="openNav()">&#9776; <?php content('contact');?>
					</span>
				</span>
    	</nav>

      <div class="contactTxt">
        <div>benjaminlukas.graf@students.bfh.ch</div>
        <div>quentin.flueckiger@students.bfh.ch</div>
    </div>
    </main>
  </body>
</html>
