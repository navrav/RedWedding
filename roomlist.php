<?php

/******************************************
 *	ROOMLIST.PHP - Generate room list code
 *
 *		Retrieves rooms from database;
 *		Creates room list code.
 *
 *		Used in checkin.php and survey.php
 */

session_start();
include_once("servercon.php");

if (!isset($_SESSION['username']))
{
	  header("location:index.php");
}

$level = $_GET["level"];

// generate default option
echo '<option value="" selected>Test</option>';

// if a level is properly selected
if ($level != "") {

	// retrieve rooms from db
	$dbRooms = mysqli_query($dbconn, "SELECT * FROM `Rooms` WHERE `level` = ".$level);

	// generate room list code
	for ($i = 1, ($currRoom = mysqli_fetch_array($dbRooms)) !== false, $i++) {
		echo '<option value="', $i, '">', $currRoom['room'], '</option>';
	}
}

?>