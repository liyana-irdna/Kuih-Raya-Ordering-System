<?php

$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "kuihraya";

	//Create Connection
	$conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname) or die($conn->connect_error);
?>
	