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
            'de' => 'Beim Produkten!',
            'fr' => 'Aux Produits!',
            'en' => 'To Products!'
        ),
        'blondebeer' => array(
            'de' => 'Beim Produkten!',
            'fr' => 'Aux Produits!',
            'en' => 'To Products!'
        ),
				'darkbeer' => array(
            'de' => 'Beim Produkten!',
            'fr' => 'Aux Produits!',
            'en' => 'To Products!'
        ),
				'fruitbeer' => array(
            'de' => 'Beim Produkten!',
            'fr' => 'Aux Produits!',
            'en' => 'To Products!'
        ),
				'ipabeer' => array(
            'de' => 'Beim Produkten!',
            'fr' => 'Aux Produits!',
            'en' => 'To Products!'
        ),
				'specialbeer' => array(
            'de' => 'Beim Produkten!',
            'fr' => 'Aux Produits!',
            'en' => 'To Products!'
        ),
				'whitebeer' => array(
            'de' => 'Beim Produkten!',
            'fr' => 'Aux Produits!',
            'en' => 'To Products!'
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
        'currency' => array(
            'de' => 'SFR',
            'fr' => 'CHF',
            'en' => 'CHF'
        ),
        'addtocart' => array(
            'de' => 'Zum Warenkorb hinzufügen',
            'fr' => 'Ajout au panier',
            'en' => 'Add to cart'
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

	<style>
	#wrap {
		position:relative; /* make this relative to have the inner div absolute without breaking out */
		width: 840px;  /* fix the width or else it'll be the entire page's width */
	}
	#text {
		position: absolute;
		width: 320px;
		height : 200px;
		right: 0;
		top: 0;
		bottom: 0;
		color: white;
		background-color: #3C3939;
	}
	.prod_descr{
	text-align: center;
	}
	.prod_details{
    margin-left: 10px;
    padding-top: 10px;
  }
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

#outer
{
    width:100%;
    text-align: center;
}
.inner
{
    display: inline-block;
}
	</style>

			<script src="../javascript/jquery-3.2.1.min.js"></script>
			<script src="../javascript/jquery_example.js"></script>
      <script src ="../javascript/incrementing.js"></script>
      <script src="../javascript/sliding_menu.js"></script>
      <meta charset="utf-8" />
      <title>Beer All Day Long</title>
      <link rel="stylesheet" type="text/css"
      media="screen" href="../css/styleq.css" />
			<link rel="stylesheet" type="text/css"
			media="screen" href="../css/styleb.css" />
    </head>
  <body>

  <main>

    <div id="mySidenav" class="sidenav">
      <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

			<?php
				$url = "home.php";
				echo "<a href=\"".add_param($url,'lang',$_GET['lang'])."\">Home</a>" ;?>
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
        <span style="font-size:30px;cursor:pointer;position:relative;" onclick="openNav()">&#9776; <?php content('content'); ?>
        </span>
      </span>
    </nav>

    <?php

      include '../classes/db_query.php';

      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbname = "beerbeerbeer";

      // Create connection
      $db = new mysqli($servername, $username, $password, $dbname);

      // Check connection
      if ($db->connect_error) {
        die(" Connection failed: " . $db->connect_error);
      }

      $type = $db->escape_string($_GET["type"]);

      $lang = $db->escape_string($_GET["lang"]);

      echo " Connected successfully </br>";
        if(!$result = getBeers($db, $type)){
          die("There was an error running the query [".$db->error."]");
      }

      echo $result->num_rows. " Products:<br />";
      while($product = $result->fetch_assoc()){
          $descr = "description_".$lang;

          $img =strtolower(str_replace(' ','',$product['name']));

          echo "<div id=\"wrap\">
      			<img src=\"../images/beer/".$img.".jpg\" />
      			<div id=\"text\">
      				<p></p>
      				<div class=\"prod_descr\"> ".$product[$descr]." </div>
      				<div style=\"width:100%;\">
                <div class=\"prod_details\">".$product['name']." </div>
      					<div class=\"prod_details\"> ".$product['price']." ".t('currency')." </div>
      					<div class=\"prod_details\"> ".$product['percentage']."% </div>
                <div class=\"prod_details\">".strtoupper($product['nationality'])." </div>
                <div id=\"outer\">
                  <div class=\"inner\"><button type=\"submit\" class=\"addBtn\" onClick=\"addItem(".$product['id'].")\" >+</button></div>
                <div class=\"inner\"><button type=\"submit\" class=\"removeBtn\" onClick=\"removeItem(".$product['id'].")\">-</button></div>
                <div class=\"inner\"><input type=\"number\" name=\"prod_num\" id=\"".$product['id']."\" value=\"0\"></div>
                <div class=\"inner\"><button class=\"msgBtnBack\" onClick=\"addToCart(".$product['id'].")\">".t('addtocart')."</button></div>
								<div class=\"inner\"><input type=\"submit\" class=\"button\" name=\"insert\" value=\"addToCart\" /></div>
              </div>
      				</div>
      			</div>
      		</div>";
      }


      $db->close();

    ?>
  </main>
  </body>
</html>
