<?php
ob_start();
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sessions Secure Content Page 01</title>
<?php
require_once("./config.php");
require_once("./security_guard.php");
require_once("./stylesheet_handler.php");
?>
	</head>
	<body>
		<h1>Sessions Secure Content Page 01</h1>
		<p>Only users who have logged in should be permitted access to this page.</p>
		<?php 
		require_once("./navigation.php");
		$username = $_SESSION['username'];
		echo "<p>Hello, ".$username."!</p>";
		?>
		<p><a href="logout.php">Logout</a></p>
		
		
		
	</body>
</html>