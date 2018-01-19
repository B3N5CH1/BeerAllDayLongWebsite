
<!DOCTYPE html>
<html lang="en">
<head>


			<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
      <script src ="../javascript/incrementing.js"></script>
      <script src="../javascript/sliding_menu.js"></script>
      <meta charset="utf-8" />
      <title>Beer All Day Long</title>
			<link rel="stylesheet" type="text/css"
			media="screen" href="../css/styleb.css" />
    </head>
  <body>

  <main>

  <?php
	  require "../db/connector.php";
	 	include '../classes/burger.php';
		include '../classes/db_query.php';
		if (session_status() == PHP_SESSION_NONE) {
			session_start();
		}


		if (isset($_SESSION["email"])) {
			$client = $_SESSION["email"];
		} else {
			$client = session_id();
			// user is not logged in -> Login page
		}
		createBurger();


    echo "<nav>
      <span>
        <span style=\"font-size:30px;cursor:pointer;position:relative;\" onclick=\"openNav()\">&#9776;
        </span>
      </span>
    </nav>";


			echo "<h1 class=\"centered\">";content('content');echo "</h1>";

    $db = getDB();

      $type = $db->escape_string($_GET["type"]);

      $lang = $db->escape_string($_GET["lang"]);


        if(!$result = getBeers($db, $type)){
          die("There was an error running the query [".$db->error."]");
      }

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
      					<div class=\"prod_details\" style=\"display:inline;\"> ".$product['percentage']."% </div>
      					<div class=\"prod_details\" style=\"display:inline;\"> ".$product['size']."cl </div>
                <div class=\"prod_details\" style=\"display:inline;\">".strtoupper($product['nationality'])." </div>
								</div>
								<div id=\"outer\">
								<form method=\"post\" action=\"./products.php?type=".$type."&lang=".$lang."\">
								  <div class=\"inner\" style=\"visibility: hidden;\"><input type=\"number\" name=\"id_val\" id=\"".$product['name']."\" value=\"".$product['id']."\"></div>
                <div class=\"inner\"><input type=\"number\" name=\"prod_num\" min=\"1\" id=\"".$product['id']."\" value=\"0\"></div>
								<div class=\"inner\"><input type=\"submit\" class=\"button\" name=\"addToCart\" value=\"addToCart\" /></div>
								</form>
              </div>
      				</div>
      			</div>
      		</div>";
      }

				$count = 0;
						if(isset($_POST['addToCart'])){ // button name
							if ($count > 0) $count = 1;
							else {
							 $quantity = $_POST['prod_num'];
							 $product = $_POST['id_val'];
							 $sessionid = session_id();
							addToCart($db, $client, $product, $quantity, $sessionid);
							$count = $count + 1;
						}
						}else{
						};
			echo "</span>";

      $db->close();

    ?>
  </main>
  </body>
</html>
