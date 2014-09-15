<?php

/************************************************************
 *	CHECK.PHP - Sets logged in user profile
 *
 *		Sets necessary database access variables
 *		Connects to database
 *		Checks if username and password entered exists in db
 *			If match found, set as active profile
 *			Else, print error message to index.
 */

session_start();

$host="deco3801-01.zones.eait.uq.edu.au";	// Host name
$username="root";							// Mysql username
$password="Viking8Chief+latch";				// Mysql password
$db_name="aeb";								// Database name
$tbl_name="Users";							// Table name
error_reporting(E_ALL);

// Connect to server and select database
$dbconn = new mysqli($host, $username, $password, $db_name);
if($dbconn->connect_errno > 0) {
	die("Unable to connect to database [".$db->connect_error."]");
}

	/************************************************
	 *	Use this for security -- not yet implemented
	 *	$hasher = new PasswordHash(8, FALSE);
	 *	$hash   = $hasher->HashPassword($password);
	 */

	 
// Username and password sent from form
$myusername=$dbconn->real_escape_string($_POST['user']);
$mypassword=$dbconn->real_escape_string($_POST['pass']);

// Check if the username/pw combination exists in db
$sql="SELECT * FROM $tbl_name WHERE email='$myusername' and pass='$mypassword'";
	// If does not exist, error message
	if(!$result = $dbconn->query($sql)) {
		die('There was an error running the query [' . $db->error . ']');
	}

// Mysql_num_row - count number of rows in check result
$count=$result->num_rows;
// If the previous check found a match, there should be exactly 1 row in the query result
if($count==1) {
//session_regenerate_id();
	// set current user
    $_SESSION['username'] = $myusername;
	// status = logged in
    $_SESSION['loggedIn'] = true;
    // close the session
 //   session_write_close();
    echo "true";
} else { // no match found in db
    echo "false";
}
?>