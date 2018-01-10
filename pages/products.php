
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

  <main>

  <?php
	 	include '../classes/burger.php';
		include '../classes/db_query.php';
		createBurger();


    echo "<nav>
      <span>
        <span style=\"font-size:30px;cursor:pointer;position:relative;\" onclick=\"openNav()\">&#9776;
        </span>
      </span>
    </nav>";


			echo "<h1 class=\"centered\">";content('content');echo "</h1>";

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
                <div class=\"prod_details\" style=\"display:inline;\">".strtoupper($product['nationality'])." </div>
								</div>
								<div id=\"outer\">
                  <div class=\"inner\"><button type=\"submit\" class=\"addBtn\" onClick=\"addItem(".$product['id'].")\" >+</button></div>
                <div class=\"inner\"><button type=\"submit\" class=\"removeBtn\" onClick=\"removeItem(".$product['id'].")\">-</button></div>
                <div class=\"inner\"><input type=\"number\" name=\"prod_num\" id=\"".$product['id']."\" value=\"0\"></div>
								<div class=\"inner\"><input type=\"submit\" class=\"button\" name=\"insert\" value=\"addToCart\" /></div>
                <div class=\"inner\"><button class=\"msgBtnBack\" onClick=\"addToWaitList(".$product['id'].")\">".t('addtocart')."</button></div>

              </div>
      				</div>
      			</div>
      		</div>";
      }
			echo "</span>";

      $db->close();

    ?>
  </main>
  </body>
</html>
