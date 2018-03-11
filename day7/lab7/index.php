
<?php
ob_start();
session_start();
?>

<html>
<head>
	<title>SSD Lab07 -  Login / Registration System</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<style>label{ background-color:#eee;width:150px; display:inline-block;}</style>
</head>

<body>
<h1>SSD Lab07 -  Login / Registration System</h1>
<?php
   
    if(isset($_SESSION['message'])){
        //...dipslay the message
        echo $_SESSION['message'];
        //now that it's been displayed, clear the error message
        unset($_SESSION['message']);
    }

    $usernamefromcookie = "";
    if(  isset($_COOKIE['username']) ){
        $usernamefromcookie = $_COOKIE['username'];	   
    }
    $checkboxfromcookie = "";
    if(  isset($_COOKIE['remembercookie']) ){
        $checkboxfromcookie = $_COOKIE['remembercookie'];	   
    }

?>
<h2>Login</h2>
	<form method="POST" action="authorize.php">
		<label for="username">Username:</label>
		<input type="text" name="username" id="username" value="<?php echo $usernamefromcookie; ?>"/><br />
		<label for="password">Password:</label>
		<input type="password" name="password" id="password" /><br />
		<label for="rememberme">Remember Me:</label>
		<input type="checkbox" name="rememberme" id="rememberme" value="rememberme" <?php echo $checkboxfromcookie; ?>/><br />
		<input type="submit" /><br />
	</form>
	<p>Not a member of our <strong>exclusive</strong> club? <a href="register.php">Register now</a>!</p>
</body>
</html