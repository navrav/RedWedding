<?php
/***************************************************
 *	SERVERCON.PHP - Establishes database connection
 *
 *		Runs every time a page is opened.
 */

	// variables for accessing the database
	
	// Host for the database
	$dbhost = "deco3801-01.zones.eait.uq.edu.au"; // Will need to be changed

	// Username & password for accessing the database
	$dbuser = "root";
	$dbpass = "Viking8Chief+latch"; // Will need to be changed
	
	// Database to be accessed
	$dbname = "aeb";
	
	// Connect to the MySQL server - if an error occurs, the "die" message will be output to the log
	$dbconn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
	if(!$dbconn){
		die("Unable to connect to database [".mysqli_connect_error()."]");
	}
?>