<?php
session_start();
require_once("dbinfo.php");
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if( mysqli_connect_errno() != 0  ){
	die("<p>Ack, sorry couldnt connect to DB</p>");	
}
if( isset($_POST['confirm']) ){
    $decision = $_POST['confirm'];

    if ($decision == "yes"){
        $query = "DELETE FROM students WHERE id='".$_SESSION['id']."';";
        $result = $mysqli->query($query);
        if ($result == true){
            $_SESSION['message'] = "<p style='color:green;'>Record Deleted: ".$_SESSION['id']." ".$_SESSION['firstname']." ".$_SESSION['lastname']."</p>";
        }
        else{
            $_SESSION['message'] = "<p >fail to delete this guy</p>";
        }
        
    }
    else {
        $_SESSION['message'] = "<p style='color:red;'>Delete record aborted</p>";
    }
    header("location: index.php");
}

?>