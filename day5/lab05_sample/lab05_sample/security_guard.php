<?php
ob_start();
?>
<?php
/*
this page:
-----------------------------------------------------------------------
- determines if user is already logged in
	- if logged in, determines if user's login time has expired
		- if time is expired, forwards them to the logout page
		- if time is NOT expired, do nothing else
	- if not logged in, forwards user to login page
-----------------------------------------------------------------------
*/


session_start();
//re-build the strong id we first created at login.php 
$test_strong_id = "goBBledyg00p" . session_id() . $_SERVER["HTTP_USER_AGENT"]; 

//if there is no strong id in the session, or if it doesnt match the current strong id,
//we have a problem. better kick the user back to the login form
if( !isset($_SESSION["strong_id"]) || $test_strong_id != $_SESSION["strong_id"] ){
	
	//before we send them back the form, save a description of the problem in a session	
	$_SESSION["errors"] = "<p style='color:red;'>Please log in before accessing content...</p>";
	header("Location: login.php");
	die();
}


	


