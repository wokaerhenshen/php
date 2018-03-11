<?php
/*
this script outputs an 
approriate navigation, based
on who the user is

uses values defined in config.php
*/
require_once("./config.php");
$superUser = false;
if(strtolower($_SESSION['studentNumber']) == SUPER_USER){
	$superUser = true;
}
?>
<ol>
	<li><a href="secure_content_01.php">Page 01</a></li>
	<li><a href="secure_content_02.php">Page 02</a></li>
	
<?php
if($superUser == true){
	echo "<li><a href='secure_content_03.php'>Super Secret Page 3</a></li>";
}
?>
</ol>