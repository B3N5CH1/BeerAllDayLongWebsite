<?php
	header("content-type: text/xml");
	echo "<?xml version='1.0' standalone='yes'?>\n";

	$format = isset($_GET['format']) ? $_GET['format'] : "d. F Y";
	echo "<info>";
	echo 		"<time>".date("H:i:s")."</time>";
	echo 		"<date>".date($format)."</date>";
	echo "</info>";
