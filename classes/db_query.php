<?php

function getBeers($db, $type) {

  return $db->query("SELECT * FROM products WHERE type='$type'");
}

function addToCart($db, $product, $quantity){

  if ( !$stmt = $db->prepare("INSERT INTO waitingorder (client, product, quantity) VALUE (?, ?, ?)")){
	   echo "Prepare failed: [".$db->error."]";
   }

   if (!$stmt->bind_param('iii', $product, $product, $quantity)) {
   	echo "Bind failed: [".$db->error."]";
   }
   if (!$stmt->execute()) {
	    echo "Execute failed: [".$db->error."]";
    }
}
