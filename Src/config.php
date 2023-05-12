<?php
	$host='localhost';
	$user='root';
	$pass='';
	$dbname='lostandfound';

	$con = new mysqli($host, $user, $pass, $dbname);

	if ($con->connect_error) {
		die("Connection failed: " . $con->connect_error);
	}

	// Perform database operations here...

	// $con->close();
?>
