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
        'policy_text' => array(
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
				<style>

					.sidenav {
    			height: 100%;
    			width: 0;
    			position: fixed;
    			z-index: 1;
    			top:0;
    			left: 0;
    			background-color: #111;
    			overflow-x: hidden;
    			transition: 0.5s;
    			padding-top: 60px;
					}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 200px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}

.some_text{
  font-size: 30px;
  padding-left: 5%;
  padding-top: 5%;
}

</style>
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
					<span style="font-size:30px;cursor:pointer;position:relative;" onclick="openNav()">&#9776; <?php content('policy');?>
					</span>
				</span>
    	</nav>

      <div class="some_text">
        <?php content('policy_text');?>
    </div>
    </main>
  </body>
</html>
