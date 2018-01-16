<?php

require "../db/connector.php";$host="localhost"; // Host name

include '../classes/db_query.php';

$db = getDB();

$id = (isset($_POST['id_val']));
$qt = (isset($_POST['prod_num']));

// Insert data into mysq

// if successfully insert data into database, displays message "Successful".
if(updateCart($db,$client,$id,$qt)){
echo "Successful";
echo "<BR>";
}

else {
echo "ERROR";
}
?>
