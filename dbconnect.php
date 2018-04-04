<?php 
	// Database details
	$servername = "localhost";
	$username = "admin";
	$password = "yi4v8p4hJt8sHxaO";
	$dbname = "ems";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
?>