<?php

/*$host = "localhost";
$username = "root";
$password = "";
$database = "studentmanagementdb";*/

$connection = new mysqli("localhost","root","","transport");

if ($connection->connect_error) {
	echo "Failed to connect Database: " .$connection->connect_error;
}

?>