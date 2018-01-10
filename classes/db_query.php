<?php

function getBeers($db, $type) {

  return $db->query("SELECT * FROM products WHERE type='$type'");
}

function addToCart($db, $client, $product, $quantity){

  if ( !$stmt = $db->prepare("INSERT INTO waitingorders (client, product, quantity) VALUE (?, ?, ?)")){
	   echo "Prepare failed: [".$db->error."]";
   }

   if (!$stmt->bind_param('sii', $client, $product, $quantity)) {
   	echo "Bind failed: [".$db->error."]";
   }
   if (!$stmt->execute()) {
	    echo "Execute failed: [".$db->error."]";
    }
}
