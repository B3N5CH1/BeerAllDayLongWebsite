<?php



function getBeers($db, $type) {

  return $db->query("SELECT * FROM products WHERE type='$type' ORDER BY name ASC");
}

function addToCart($db, $client, $product, $quantity, $sessionid){

  if ( !$stmt = $db->prepare("INSERT INTO waitingorders (client, product, quantity, orderGroup) VALUE (?, ?, ?, ?)")){
	   echo "Prepare failed: [".$db->error."]";
   }

   if (!$stmt->bind_param('siis', $client, $product, $quantity, $sessionid)) {
	   echo "Bind failed: [".$db->error."]";
   }
   if (!$stmt->execute()) {
		echo "Execute failed: [".$db->error."]";
	}
}

function updateCart($db, $client, $id, $qt){

  if ( !$stmt = $db->prepare("UPDATE  waitingorders SET quantity = ? WHERE client = ? AND id = ?")){
	   echo "Prepare failed: [".$db->error."]";
   }

   if (!$stmt->bind_param('isi', $qt, $client, $id)) {
	   echo "Bind failed: [".$db->error."]";
   }
   if (!$stmt->execute()) {
		echo "Execute failed: [".$db->error."]";
	}
}

function removeFromCart($db, $client, $id){
  if ( !$stmt = $db->prepare("DELETE FROM waitingorders WHERE client = ? AND id = ? ")){
    echo "Prepare failed: [".$db->error."]";
  }

  if (!$stmt->bind_param('si', $client, $id)) {
    echo "Bind failed: [".$db->error."]";
  }
  if (!$stmt->execute()) {
    echo "Execute failed: [".$db->error."]";
  }
}
