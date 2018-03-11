<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<?php
/*
this login page send the form data to itself
if appropriately filled out, this page will
prepare a session and send the user to the 
content pages
*/

//load some application wide constants
session_start();
require_once("./config.php");

$message = "";			//messages to the user if login unsucessful
$username = "";			//remember the username if its filled out correctly
$studentNumber = "";	//remember the studentnumber if its filled out correctly
$usernameErrorDisplay = "";			//error message for the username
$studentNumberErrorDisplay = ""; 	//error message for the studentnumber

?>
	<head>
		<title>Sessions: Lab05 Sample</title>
		<link href="./css/<?php echo DEFAULT_CSS;?>" type="text/css" rel="stylesheet" />
	</head>
	<body>
	<h1>Sessions: Lab05 Sample</h1>
	
<?php
//get any messages from other pages
//for later display
if(isset($_SESSION["errors"])){
	$message .= $_SESSION["errors"];
	unset($_SESSION["errors"]);
}

//IF the user has submitted the form, validate the data
if(isset($_POST['username']) && isset($_POST['studentNumber']) && isset($_POST['stylesheetPreference'])){
	//ensure username is ok
	if(preg_match(USERNAME_PATTERN, $_POST['username'])){
		$username = strtolower(trim($_POST['username']));
	}else{
		$message .= "<p>The username must be at least 2 alphanumeric characters</p>";
		$usernameErrorDisplay = "class='error'";
	}
	//ensure student number is ok
	if( preg_match(STUDENT_NUMBER_PATTERN, $_POST['studentNumber'])){
		$studentNumber = strtolower(trim($_POST['studentNumber']));
	}else{
		$message .= "<p>The student number must match the pattern 'A00xxxxxx'</p>";
		$studentNumberErrorDisplay = "class='error'";
	}
	//final test to see if any errors occured
	//during form validation
	if($message == ""){
		//if no errors, log them in,
		//prepare session variables
		//and forward user to content pages

		//create session, store values
		$_SESSION['username'] = $username; 
		$_SESSION['studentNumber'] = $studentNumber;

		//build a salted, client specific, difficult to guess 
		//strong ID for this user
		$strong_id = "goBBledyg00p" . session_id() . $_SERVER["HTTP_USER_AGENT"]; 
		$_SESSION["strong_id"] = $strong_id;
		$_SESSION['cssPreference'] = $_POST['stylesheetPreference'];
		header("Location: ./secure_content_01.php");
		die();
	}
}//end IF

//the user did not fill out the form correctly
//display any relevent error messages and
//show the login form
echo $message;
?>	
<form method="POST" action="login.php">
	<input	type="text" 
			<?php echo $usernameErrorDisplay; ?>
			value="<?php echo $username; ?>"
			id="username" 
			name="username" />
	: <label for="username">Username</label>			
	<br />
	<input	type="text" 
			<?php echo $studentNumberErrorDisplay; ?>
			value="<?php echo $studentNumber; ?>"
			id="studentNumber" 
			name="studentNumber" />
	: <label for="studentNumber">Student Number</label>			
	<br />
	<select name="stylesheetPreference" id="stylesheetPreference">
		<option value="dark.css">dark</option>
		<option value="light.css">light</option>
		<option value="mellow.css">mellow</option>
	</select>
	: <label for="stylesheetPreference">Stylesheet Preference</label>	
	<br />
	<input	type="submit" 
			value="Submit" />		
</form>		
	
	</body>
</html>