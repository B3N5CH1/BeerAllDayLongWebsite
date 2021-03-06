<?php
function __autoload($class_name){

	// Directories to look in
	// (relative to the current file)
	$dirs = [
		'classes/',
    'css/',
    'db/',
    'images/',
    'javascript/',
    'lang/',
    'pages/'
	];

	// Try to load class
	foreach($dirs as $dir) {
		$file = __DIR__."/$dir$class_name.class.php";
		if(file_exists($file)) {
			require_once($file);
			break;
		}
	}
}
