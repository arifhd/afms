<?php 
	include 'dbconnection.php';
	 
	// Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
		echo "Connected successfully";
	}
    mysqli_close($conn);
	if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
		echo "Connected successfully";
	}
?>