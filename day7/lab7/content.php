<?php

session_start();
$browserDetails = $_SERVER["HTTP_USER_AGENT"];
$strong_id = md5("Xas576-R^a" . session_id() . $browserDetails); 
//ensure the user has not changed since the time they logged inet_pton
if( $_SESSION['authentication'] != $strong_id){
	$_SESSION['message'] =  "<p>You need to log in to see the content...</p>";
	header("Location: index.php");	
}
else {
?>
<html>
<head>
	<title>SSD Lab07 -  Login / Registration System</title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<style>label{ background-color:#eee;width:150px; display:inline-block;}</style>
</head>
<h1>SSD Lab07 -  Login / Registration System</h1>
<h2>Secure content page</h2>
</html>


<?php
}
echo "<p>Hello ". $_SESSION['username'] .", you have been successfully logged in!</p>";
echo "Only authorized users can view this page.";
echo "<p><a href='logout.php'>Logout</a></p>";
?>