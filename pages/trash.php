<!DOCTYPE html>
<html lang="en">
<head>



      <script src="../javascript/sliding_menu.js"></script>
      <meta charset="utf-8" />
      <title>Beer All Day Long</title>
      <link rel="stylesheet" type="text/css"
      media="screen" href="../css/style.css" />
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
  </main>
  </body>
</html>
