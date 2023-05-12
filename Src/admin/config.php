<?php 
	$host='localhost';
	$user='root';
	$pass='';
	$con=mysqli_connect($host,$user,$pass) or die('Server Error'.mysqli_error($con));
	$db='lostandfound';
	mysqli_select_db($con,$db) or die("Couldn't Connect with database".mysqli_error($con));
?>