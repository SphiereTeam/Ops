<?php

	//Set db variables
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "test";

	//Create a database connection
	$connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	//Test if connection occurred
	if(mysqli_connect_errno()){
		die("Database connection failed: " . mysqli_connect_error() . "(" . mysqli_connect_errno() . ")" );
	}

?>
