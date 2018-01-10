<
<!DOCTYPE html>
<html lang="en">
<head>

	<style>
	#wrap {
		position:relative; /* make this relative to have the inner div absolute without breaking out */
		width: 540px;  /* fix the width or else it'll be the entire page's width */
	}
	#text {
		position: absolute;
		width: 340px;
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
	.prod_price{
	width:60%;
	position:relative;
	}
	.prod_alcool{
	width:40%;
	position:relative;
	}
	</style>

      <script src="../javascript/sliding_menu.js"></script>
      <meta charset="utf-8" />
      <title>Beer All Day Long</title>
      <link rel="stylesheet" type="text/css"
      media="screen" href="../css/styleq.css" />
    </head>
  <body>

  <main>

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
          echo $product["name"]." " .$product["brand"]." ".$product[$descr]."<br />";
      }


      $db->close();

    ?>
		<div id="wrap">
			<img src="../images/beer/guinness.jpg" />
			<div id="text">
				<p></p>
				<div class="prod_descr">Some bullshit text </div>
				<div style="width:100%;">
					<div class="prod_price">The price</div>
					<div class="prod_alcool">The alcool</div>
				</div>
			</div>
		</div>
  </main>
  </body>
</html>
