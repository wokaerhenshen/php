
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="style.css" />
</head>
<body>

<?php
session_start();
require_once("dbinfo.php");
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if( mysqli_connect_errno() != 0  ){
	die("<p>Ack, sorry couldnt connect to DB</p>");	
}

if( isset($_GET['id']) ){
	$id = $mysqli->real_escape_string($_GET['id']);
	$query = "SELECT id, firstname, lastname FROM students WHERE id='".$id."';";
    $result = $mysqli->query($query);
    $record = $result->fetch_assoc();
    // can i have a better way to do this?
    $_SESSION['id'] = $record['id'];
    $_SESSION['firstname'] = $record['firstname'];
    $_SESSION['lastname'] = $record['lastname'];
}
$mysqli->close();
?>
<h1>Administering DB From a Form</h1>
<h2>Update a student...</h2>	<fieldset>
	<legend>Update a record</legend>
	<form method="post" action="update_query.php">
		<input type="hidden" name="target" value="A00666611" />
		<input type="hidden" name="update" value="update" />
		<fieldset>
		<legend>New data</legend>
			<input 	type="text" 
					name="studentnumber" 
					id="studentnumber"
					value=<?php echo $record["id"]; ?> />
			<label 	for="studentnumber"> - Student #</label><br />
			<input 	type="text" 
					name="firstname" 
					id="firstname"
					value=<?php echo $record["firstname"]; ?> />
			<label for="firstname"> - Firstname</label><br />
			<input 	type="text" 
					name="lastname" 
					id="lastname"
					value=<?php echo $record["lastname"]; ?> />
			<label for="lastname"> - Lastname</label><br />
		</fieldset>

		<input type="submit" value="Submit" />
	</form>
	</fieldset>
	
</body>
</html>