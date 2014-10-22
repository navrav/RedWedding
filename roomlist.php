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
echo '<option value="" selected>Room</option>';

// if a level is properly selected
if ($level != "") {

	// retrieve rooms from db
	$dbRooms = mysqli_query($dbconn, "SELECT * FROM `Rooms` WHERE `level` = $level;");

	// generate room list code
	while (($nextRoom = mysqli_fetch_array($dbRooms)) != false) {
		echo '<option value="', $nextRoom['room'], '">', $nextRoom['room'], '</option>';
	}
}

?>