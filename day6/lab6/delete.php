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
	
}
$mysqli->close();
?>

<h1>Administering DB From a Form</h1>
<h2>Delete a student...</h2>	<fieldset>
	<legend>Delete a record - Are you sure?</legend>
	<form method="post" action="delete_query.php">
		
            <?php 
            echo "<p>".$record['id']." ".$record["firstname"]." ".$record["lastname"]."</p>";
            //can i have a better way to do this ?
            $_SESSION['id'] = $record['id'];
            $_SESSION['firstname'] = $record['firstname'];
            $_SESSION['lastname'] = $record['lastname'];

            // $record['id']+ " " +
            // $record["firstname"]+ " "+
            //  $record["lastname"];
            ?>
        
		<input 	type="radio" 
				name="confirm" 
				id="yes" 
				value="yes"
				checked="checked" />
		<label for="yes">Yes</label><br />
		<input 	type="radio" 
				name="confirm" 
				id="no" 
				value="no" />
		<label for="no">No</label><br />	
		<input type="submit" value="Submit" />
	</form>
	</fieldset>
	
</body>
</html