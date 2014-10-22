<?php
// Previously known as "ajax_check.php"

session_start();
include_once("servercon.php");
include_once("PasswordHash.php");


//Use this for security -- not yet implemented
//$hasher = new PasswordHash(8, FALSE);
//$hash   = $hasher->HashPassword($password);


// username and password sent from form
$myusername= mysqli_real_escape_string($dbconn, $_GET['user']);
$mypassword=mysqli_real_escape_string($dbconn, $_GET['pass']);


$query = "SELECT `u_ID`, `pass` FROM `Users` WHERE email= ?";

$stmt = mysqli_prepare($dbconn, $query);

mysqli_stmt_bind_param($stmt, 's', $myusername);

mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result($stmt, $uID, $pass);

if (mysqli_stmt_fetch($stmt){
	if (validate_password($mypassword, $pass)){
		$_SESSION['username'] = $uID;
    	$_SESSION['loggedIn'] = true;
   		echo "ok";
	} else {
		echo "false";
	}
} else {
	echo "false";
}	
?>