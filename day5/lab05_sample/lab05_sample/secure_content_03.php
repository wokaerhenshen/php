<?php
ob_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sessions Secure Content Page 3</title>
<?php
require_once("./config.php");
require_once("./security_guard.php");
require_once("./stylesheet_handler.php");
?>

	</head>
	<body>
	
		<h1>Sessions Secure Content Page 3</h1>
		<p>Only users who have logged in should be permitted access to this page.</p>
		<?php 
		require_once("./config.php");
		require_once("./security_guard.php");
		require_once("./navigation.php");
		if(strtolower($_SESSION['studentNumber']) != SUPER_USER){
			$message = urlencode("Please log in...");
			header("Location: login.php?message=".	$message);
			die();
		}
		$username = $_SESSION['username'];
		echo "<h2>Super Secret Content!!!</h2>";
		echo "<p>Hello, ".$username."!</p>";
		?>
		<p><a href="logout.php">Logout</a></p>
		
	</body>
</html>