<?php
	$conn = new mysqli('localhost', 'root', '', 'barangaybalas1');

	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	
?>