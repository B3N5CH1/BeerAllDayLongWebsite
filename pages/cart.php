
<!DOCTYPE html>
<html lang="en">
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src ="../javascript/incrementing.js"></script>
		<script src="../javascript/sliding_menu.js"></script>
		<script src="../javascript/jquery_cart.js"></script>
		<meta charset="utf-8" />
		<title>Beer All Day Long</title>
		<link rel="stylesheet" type="text/css"
		media="screen" href="../css/styleb.css" />

		<script>
$(document).ready(function(){
    $(".buttonUpdate").submit(function(){
       alert("Bye! You now leave p1!");
    });
		$("#btn1").click(function(){
		alert("Text: " + $("#test").text());
});
});
</script>
	</head>

	<body>
		<?php
		require "../db/connector.php";
		include '../classes/burger.php';
		include '../classes/db_query.php';
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}

		if (isset($_SESSION["email"])) {
			$client = $_SESSION["email"];
			setOrderToUser($client, session_id());
		} else {
			$client = session_id();
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

		echo "<div class\"centered\">";
		if (isset($_SESSION["email"]) && $_SESSION["address"]) {
			echo "<button type=\"button\" class=\"checkout\" value=\"".$client."\">Checkout!</button>";
		} else {
			$url = "login.php";
			echo "<button type=\"button\" class=\"login\" value=\"".$client."\" onclick=\"location.href = '".add_param($url, 'lang',$lang)."'\">Login!</button>";
		}

		echo "</div>";
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
						<div id=\"outer\">
						<form method=\"post\" action=\"\">
							<div class=\"inner\" style=\"visibility: hidden;\"><input type=\"number\" name=\"id_val\" id=\"".$product['id']."\" value=\"".$product['id']."\"></div>
						<div class=\"inner\"><input type=\"submit\" class=\"buttonUpdate\" name=\"removeFromCart\" value=\"";content('rmvBtn');echo"\" /></div>
						</form>
					</div>
						</div>
						</div>
					</div>
				</div>";
		}
				if(isset($_POST['removeFromCart'])){ // button name
					 $id = $_POST['id_val'];
					removeFromCart($db, $client, $id);
					header('Location:./cart.php?lang='.$lang);
				}else{
				};
				echo "</span>";
		?>

</body>
</html>
