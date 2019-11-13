<?php
	// Start the session
	session_start();
?>

<!DOCTYPE html>
<html>
<body>

<?php
	if(isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
	   echo 'Buka Dashboard';
	} else {
		header("Location: login.php");
	}
?>

<?php
// remove all session variables
	session_unset();

	// destroy the session
	session_destroy(); 
	
	print_r($_SESSION);
?>
<?php
	if(isset($_SESSION["user"]) && !empty($_SESSION["user"])) {
	   echo 'Ada ses!';
	} else {
		echo 'G Ada ses!';
	}
?>

</body>
</html> 