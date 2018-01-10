<?php

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
  <body class="centered">

  <main>

  <?php
	 	include '../classes/burger.php';
		include '../classes/db_query.php';
		createBurger();


    echo "<nav>
      <span>
        <span style=\"font-size:30px;cursor:pointer;position:relative;\" onclick=\"openNav()\">&#9776; ",content('content'),"
        </span>
      </span>
    </nav>";


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
