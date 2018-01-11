
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
			<?php

			include '../classes/burger.php';
			include '../classes/db_query.php';
			createBurger();

			 ?>

      <nav>
				<span>
					<span style="font-size:30px;cursor:pointer;position:relative;" onclick="openNav()">&#9776;
          </span>
				</span>
    	</nav>

      <h1  style="text-align:center;"><?php content('contact'); ?></h1>

      <div class="contactTxt" style="text-align:center;">
        <div>benjaminlukas.graf@students.bfh.ch</div>
        <div>quentin.flueckiger@students.bfh.ch</div>
    </div>
    </main>
  </body>
</html>
