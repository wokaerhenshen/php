<?php
ob_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP LAB 6</title>
		<link rel="stylesheet" type="text/css" href="style.css" />
		<style>
		tr:nth-child(odd)		{ background-color:#eee; }
		tr:nth-child(even)		{ background-color:#fff; }
		</style>
</head>
<body>


<?php
session_start();
require_once("dbinfo.php");
//capture data from the query string, if it exists
$sortOrder = "lastname"; //a default setting
// if( isset($_GET['choice'] ) ){
// 	echo "<p>A sort choice was made </p>";	
// 	$sortOrder = $_GET['choice'];
// }else{
// 	echo "<p>A sort choice was NOT made. We'll use the default sort order by: '".$sortOrder."'</p>";	
// }
//connect to DB
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
//if  mysqli_connect_errno() is zero no errors occured
//any non zero means a problem
if( mysqli_connect_errno() != 0  ){
	die("<p>Ack, sorry couldnt connect to DB</p>");	
}

/*
challenge 3.1
if an id was sent in the GET query string,
use the id value to retrieve a record from the 
database
*/
if( isset($_GET['id']) ){
	$id = $mysqli->real_escape_string($_GET['id']);
	$query = "SELECT id, firstname, lastname FROM students WHERE id='".$id."';";
	$result = $mysqli->query($query);
	while(   $record = $result->fetch_assoc() ){
		echo "<fieldset>";
		echo "<legend>Student number " . $record["id"] . " was selected</legend>" ;
		echo "<p>Hello, " . $record["firstname"] . " " . $record["lastname"] . "!</p>" ;
		echo "</fieldset>";
	}	
}

//protect against SQL injection
$sortOrder = $mysqli->real_escape_string($sortOrder);
//"SELECT * FROM users ORDER BY s;"
$query = "SELECT id, firstname, lastname FROM students ORDER BY ".$sortOrder.";";
$result = $mysqli->query($query);
?>
<h1>PHP LAB 6</h1>
<?php
   
    if(isset($_SESSION['message'])){
        //...dipslay the message
        echo $_SESSION['message'];
        //now that it's been displayed, clear the error message
        unset($_SESSION['message']);
    }
?>

<h2>Students:</h2>
<p><a href='add.php'>Add a Student</a></p>
<div id="dbtable">
    <?php
echo "<table  border='1'>";
/*
challege 2.0
output some hyperlinked table headings before
displaying the table data.
add a query string to the hrefs,
to send data from one request to another
*/
echo "<tr><th><a href='".$_SERVER["PHP_SELF"]."?choice=id'>Id</a></th>";
echo "<th><a href='".$_SERVER["PHP_SELF"]."?choice=firstname'>Firstname</a></th>";
echo "<th><a href='".$_SERVER["PHP_SELF"]."?choice=lastname'>Lastname</a></th>";
echo "<th></th>";
echo "<th></th></tr>";
while(   $record = $result->fetch_assoc() ){
	echo "<tr>";
	/*
	challenge 3.0 
	output a clickable link for the studnet number
	the link will request this page when clicked,
	and will include a query string to identify which id was clicked
	*/
	echo "<td><a href='".$_SERVER["PHP_SELF"]."?id=".$record["id"]."'>" . $record["id"] . "</a></td>" ;
	echo "<td>" . $record["firstname"] . "</td>" ;
    echo "<td>" . $record["lastname"] . "</td>" ;
    echo "<td><a href='delete.php?id=".$record["id"]."'>delete</a></td>";
    echo "<td><a href='update.php?id=".$record["id"]."'>update</a></td>";
	echo "</tr>";		
}
echo "</table>";


$mysqli->close();
?>
</div>