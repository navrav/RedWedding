<?php
/***********************************************************
 *	CHECK.PHP - Checks whether user's email and password 
 *	match the records in database.
 *
 *		Takes user's details from INDEX.PHP web page
 *			- email and password
 *		Uses a SELECT and fetch to check a user's record  
 * 		matches the one in database.
 */

session_start();
include_once("servercon.php");
//
include_once("PasswordHash.php");


// username and password sent from form
$myusername = mysqli_real_escape_string($dbconn, $_POST['user']);
$mypassword = mysqli_real_escape_string($dbconn, $_POST['pass']);


$query = "SELECT `u_ID`, `pass` FROM `Users` WHERE email= ?";

$stmt = mysqli_prepare($dbconn, $query);

mysqli_stmt_bind_param($stmt, 's', $myusername);

mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result($stmt, $uID, $pass);

if (mysqli_stmt_fetch($stmt)){
	if (validate_password($mypassword, $pass)){
		$_SESSION['username'] = $uID;
    	$_SESSION['loggedIn'] = true;
   		header('Location: /feed.php');
	} else {
		header('Location: /index.php?logfailed=1');
	}
} else {
	header('Location: /index.php?logfailed=1');
}	
?>