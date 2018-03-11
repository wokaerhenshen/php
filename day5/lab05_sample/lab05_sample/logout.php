<!DOCTYPE html>
<html>
	<head>
<?php
	session_start();
	require_once("./config.php");
	session_destroy();
?>
		<title>Sessions: Lab05 Sample</title>
		<link href="./css/<?php echo DEFAULT_CSS;?>" type="text/css" rel="stylesheet" />
	</head>
	<body>
		<h1>Log Out</h1>
		<p>You have been logged out. <a href='login.php'>Log In</a></p>

</body>
</html>
