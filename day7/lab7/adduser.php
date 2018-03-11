<?php
ob_start();
session_start();
require_once("dbinfo.php");
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if( mysqli_connect_errno() != 0  ){
	die("<p>Ack, sorry couldnt connect to DB</p>");	
}

if( isset($_POST['username']) && isset($_POST['password']) && isset($_POST['passwordRetyped'])){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    $passwordRetyped = trim($_POST['passwordRetyped']);

    if (empty($username)){
        $_SESSION['errormessage'] = "<p class='error'>Please fill in the registration form...</p>";
        header("location: register.php"); 
        die();
    }

    if (strlen($password)<8){
        $_SESSION['errormessage'] = "<p class='error'>Sorry, password must be 8 characters or more...</p>";
        header("location: register.php"); 
        die();
    }

    if ($password != $passwordRetyped){
        $_SESSION['errormessage'] = "<p class='error'>Sorry, passwords do not match...</p>";
        header("location: register.php"); 
        die();       
    }

    $query = "SELECT * FROM users WHERE username ='".$username."' ;";
    $result = $mysqli->query($query);
   if ($result->fetch_row() > 0){
            $_SESSION['errormessage'] = "<p>The username '".$username."' is already in use, please choose a different one...</p>";
            header("location: register.php"); 
            die(); 
   }



    $safe_password = password_hash($password,PASSWORD_BCRYPT);
    $query = "INSERT INTO users (username, password) VALUES ('".$username."','".$safe_password."');";
    $result = $mysqli->query($query);
    if ($result == true){
        $_SESSION['message'] = "<p >You have been registered as awesome with us. Feel free to login whenever you like.</p>";
    }
    header("location: index.php");
}
$mysqli->close();
?>