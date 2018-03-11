<?php
session_start();
require_once("dbinfo.php");
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if( mysqli_connect_errno() != 0  ){
	die("<p>Ack, sorry couldnt connect to DB</p>");	
}

if( isset($_POST['studentnumber']) && isset($_POST['firstname']) && isset($_POST['lastname'])){

    $newstudentnumber = $_POST['studentnumber'];
    $newfirstname = $_POST['firstname'];
    $newlastname = $_POST['lastname'];

    $query = "UPDATE students SET firstname='".$newfirstname."', lastname='".$newlastname."', id='".$newstudentnumber."' WHERE id='".$newstudentnumber."';";
    $result = $mysqli->query($query);

    if ( $_SESSION['id'] == $newstudentnumber && $_SESSION['firstname'] == $newfirstname && $_SESSION['lastname'] == $newlastname){
        $_SESSION['message'] = "<p style='color:red;'>Record NOT Updated: ".$_SESSION['id']." ".$_SESSION['firstname']." ".$_SESSION['lastname']."</p>"; 
    }
    else{
        $_SESSION['message'] = "<p style='color:green;'>Record Updated: ".$newstudentnumber." ".$newfirstname." ".$newlastname."</p>";
    }
    header("location: index.php");
    die();
}

?>