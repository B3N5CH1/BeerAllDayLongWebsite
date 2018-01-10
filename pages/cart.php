
<!DOCTYPE html>
<html lang="en">
	<head>
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<script src="../javascript/jquery_example.js"></script>
		<script src ="../javascript/incrementing.js"></script>
		<script src="../javascript/sliding_menu.js"></script>
		<meta charset="utf-8" />
		<title>Beer All Day Long</title>
		<link rel="stylesheet" type="text/css"
		media="screen" href="../css/styleb.css" />

	</head>

	<body>
		<?php
		require "../db/connector.php";
		include '../classes/burger.php';
		include '../classes/db_query.php';
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}

		$client = session_id();
		if (isset($_SESSION["email"])) {
			echo session_id();
			echo "<p>".$_SESSION["email"]."<br>".$_SESSION["name"]."</p>";
		} else {
			// user is not logged in -> Login page
		}
		createBurger();


		echo "<nav>
			<span>
				<span style=\"font-size:30px;cursor:pointer;position:relative;\" onclick=\"openNav()\">&#9776;
				</span>
			</span>
		</nav>";

		echo "<h1 class=\"centered\">";content('cart');echo "</h1>";

		$db = getDB();

			$lang = $db->escape_string($_GET["lang"]);

		$result = getWaitingList($client);
		echo "<span class=\"centered\">";
		while($product = $result->fetch_assoc()){
			$descr = "description_".$lang;

			$img =strtolower(str_replace(' ','',$product['name']));

			echo "<div id=\"wrap\">
				<img src=\"../images/beer/".$img.".jpg\" />
				<div id=\"text\">
					<p></p>
					<div class=\"prod_descr\"> ".$product[$descr]." </div>
					<div style=\"width:100%;\">
						<div class=\"prod_detailbs\">".$product['name']." </div>
						<div class=\"prod_details\">
						<div class=\"prod_details\" style=\"display:inline;\"> ".$product['price']." ".t('currency')." </div>
						<div class=\"prod_details\" style=\"display:inline;\"> ".$product['quantity']."</div>
						<div class=\"prod_details\" style=\"display:inline;\"> ".$product['size']."cl </div>
						<div class=\"prod_details\" style=\"display:inline;\"> ".$product['price']*$product['quantity']." ".t('currency')." </div>
						</div>
						</div>
					</div>
				</div>";
		}
		?>

</body>
</html>
