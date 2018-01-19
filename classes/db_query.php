<?php



function getBeers($db, $type) {

  return $db->query("SELECT * FROM products WHERE type='$type' ORDER BY name ASC");
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

function confirmOrder($client){
    include "../db/connector.php";
  $db = getDB();
  if ( !$stmt = $db->prepare("UPDATE  waitingorders SET confirmed = 1, orderGroup = client, client = ? WHERE client = ? AND confirmed = 0")){
  	   echo "Prepare failed: [".$db->error."]";
     }

     if (!$stmt->bind_param('ss', $logclient, $sesclient)) {
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

if (isset($_POST['confemail'])) {
	   confirmOrder($_POST['confemail']);
} else {
  echo "<script>console.log('Post values: ".var_dump($_POST)."')</script>";
}
