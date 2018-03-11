<?php
ob_start();
session_start();
?>

<html>
<head>
	<title>SSD Lab07 -  Login / Registration System</title>
	<link rel="stylesheet" type="text/css" href="http://bcitcomp.ca/twd/css/style.css" />
	<style>label{ background-color:#eee;width:150px; display:inline-block;}</style>
</head>
<body>
<h1>SSD Lab07 -  Login / Registration System</h1>
<h2>Register</h2>
<?php
   
    if(isset($_SESSION['errormessage'])){
        //...dipslay the message
        echo $_SESSION['errormessage'];
        //now that it's been displayed, clear the error message
        unset($_SESSION['errormessage']);
    }
?>
	<form method="POST" action="adduser.php">
		<label for="username">Username:</label>
		<input type="text" name="username" id="username" /><br />
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" /><br />
		<label for="passwordRetyped">Re type password:</label>
		<input type="password" name="passwordRetyped" id="passwordRetyped" /><br />
		<input type="submit" /><br />
	</form>
	<p>Already one of us? <a href="index.php">Login</a></p>

</body>
</html>