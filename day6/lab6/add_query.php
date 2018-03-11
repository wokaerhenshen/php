<?php
session_start();
require_once("dbinfo.php");
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if( mysqli_connect_errno() != 0  ){
	die("<p>Ack, sorry couldnt connect to DB</p>");	
}

if( isset($_POST['studentnumber']) && isset($_POST['firstname']) && isset($_POST['lastname'])){

    $newstudentnumber = trim($_POST['studentnumber']);
    $newfirstname = trim($_POST['firstname']);
    $newlastname = trim($_POST['lastname']);

    if (empty($newstudentnumber)  || empty($newfirstname) || empty($newlastname)){
        $_SESSION['message'] = "<p style='color:red;'>Record NOT Added: ".$newstudentnumber." ".$newfirstname." ".$newlastname."</p>";
        header("location: index.php"); 
        die();
    }
    if (preg_match("/^A0[0-9]{7}|a0[0-9]{7}$/",$newstudentnumber) == 0){
        $_SESSION['message'] ="<p>Record NOT Added (Student Number must match the pattern: a0xxxxxxx):".$newstudentnumber." ".$newfirstname." ".$newlastname."</p>" ;
        header("location: index.php"); 
        die();
    }

  

    $query = "INSERT INTO students (id, firstname, lastname) VALUES ('".$newstudentnumber."','".$newfirstname."','".$newlastname."');";
    $result = $mysqli->query($query);
    if ($result == true){
        $_SESSION['message'] = "<p style='color:green;'>Record Added: ".$newstudentnumber." ".$newfirstname." ".$newlastname."</p>";
    }
    else{
        $_SESSION['message'] = "<p style='color:red;'>Record NOT Added: ".$newstudentnumber." ".$newfirstname." ".$newlastname."</p>"; 
    }

    header("location: index.php");

}

?>