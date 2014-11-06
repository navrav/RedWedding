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
//Uses the PasswordHash.php (2013, Taylor Hornby)
include_once("PasswordHash.php");


//username and password sent from the form on index.php.
//Strips the html tags from inputted Post to prevent XSS
$myusername = mysqli_real_escape_string($dbconn, $_POST['user']);
$mypassword = mysqli_real_escape_string($dbconn, $_POST['pass']);

//The use of prepared statements to prevent SQL Injection.
//This query is Selecting all users with the same email value as to the user submitted value
$query = "SELECT `u_ID`, `pass`, `isAdmin` FROM `Users` WHERE email= ?";

$stmt = mysqli_prepare($dbconn, $query);

mysqli_stmt_bind_param($stmt, 's', $myusername);

mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result($stmt, $uID, $pass, $admin);

//Checks whether query can be fetched. If so then a user exists, otherwise the user is sent back to index.php
if (mysqli_stmt_fetch($stmt)){

    //Uses the function validate_password within PasswordHash.php to check whether the user submitted password matches the database password.
    //If the password matches the users ID (uID) will be stored into the session.
	if (validate_password($mypassword, $pass)){
		$_SESSION['username'] = $uID;
    	$_SESSION['loggedIn'] = true;
        //Checks whether the user has the admin attribute true.
    	if ($admin){
    	    $_SESSION['admin'] = true;
    	}else{
    	    $_SESSION['admin'] = false;
    	}
        mysqli_stmt_close($stmt);
   		header('Location: /feed.php');
	} else {
        mysqli_stmt_close($stmt);
		header('Location: /index.php?logfailed=1');
	}
} else {
    mysqli_stmt_close($stmt);
	header('Location: /index.php?logfailed=1');
}	
?>