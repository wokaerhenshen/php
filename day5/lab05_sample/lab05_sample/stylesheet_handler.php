<?php
ob_start();
?>
<?php
/*
this script will assign a stylesheet.  
if there is a preference stored in the session,
then it will try to use that. otherwise it 
uses a default stylesheet defined in config.php
*/
require_once("./config.php");

if( isset($_SESSION['cssPreference'])){
	echo "<link href='".STYLESHEET_PATH.$_SESSION['cssPreference']."' type='text/css' rel='stylesheet' />";
}else{
	echo "<link href='".STYLESHEET_PATH.DEFAULT_CSS."' type='text/css' rel='stylesheet' />";
}

?>