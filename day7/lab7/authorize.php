<?php
session_start();
require_once("dbinfo.php");
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if( mysqli_connect_errno() != 0  ){
	die("<p>Ack, sorry couldnt connect to DB</p>");	
}

if (isset($_POST['rememberme'])){
    $usernameCookie = $_POST['username'];
    $rememberCookie = "checked='checked'";
    setcookie("username", $usernameCookie , time()+60*60*24*7);
    setcookie("remembercookie", $rememberCookie , time()+60*60*24*7);
}else {
    setcookie("username", "" , time()-1);
    setcookie("remembercookie", $rememberCookie , time()-1);
}

if( isset($_POST['username']) && isset($_POST['password']) ){
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);
    if (empty($username)  || empty($password)){
        $_SESSION['message'] = "<p>Please fill in the form...</p>";
        header("location: index.php"); 
        die();
    }

    $username = $mysqli->real_escape_string($username);
    $password = $mysqli->real_escape_string($password);

   // $password = password_hash($password,PASSWORD_BCRYPT);

    $query = "SELECT username , password FROM users WHERE username = '".$username."' ";
    $result = $mysqli->query($query);
    if(   $record = $result->fetch_assoc() ){

        if (password_verify( $password, $record["password"])){
            $_SESSION['username'] = $username;
            //create a hard to guess user specific identifier to use for authentication
            //determine the user agent 
            $browserDetails = $_SERVER["HTTP_USER_AGENT"];
            //build a salted, user specific strong id
            $strong_id = md5("Xas576-R^a" . session_id() . $browserDetails); 
            //save this user info in a session
            $_SESSION['authentication'] = $strong_id;
            header("location: content.php");
            die();
        }
        else{
            $_SESSION['message'] = "<p>Invalid password. Try again...</p>";
            header("location: index.php"); 
            die();
        }
    }
        else {
            $_SESSION['message'] = "<p>Invalid username. Try again...</p>";
            header("location: index.php"); 
            die();
        }
    
}
$mysqli->close();
?>