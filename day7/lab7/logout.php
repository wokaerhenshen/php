<?php
ob_start();
session_start();

?>

<html>
	<head>
		<title>Sessions Logout</title>
        <link rel="stylesheet" href="http://bcitcomp.ca/ssd/css/style.css" />

	</head>
	<body>
        <h1>SSD Lab07 -  Login / Registration System</h1>
        <h2>Secure content page</h2>
        <p>You have been logged out.</p>
        <p><a href="index.php">Return to the form</a></p>

        <?php
		/*
		you need to start a session before you can destroy it
		*/
        
		if(isset($_SESSION['message'])){
			echo $_SESSION['message'];
			unset($_SESSION['message']);
		}		
		$_SESSION = array();
		session_destroy();		
        ?>
		

	</body>
</html>