<?php

/****************************************************************
 *	CHECKIN_SUBMIT.PHP - Sends checkIn form input to database
 *
 *		Takes checkIn form inputs
 *			- room, tags, comment, friends (not yet implemented)
 *		Uses an insert query to create checkIn record in db.
 */

session_start();
include_once("servercon.php");

if (!isset($_SESSION['username']))
{
	  header("location:index.php");
}

$user = $_SESSION['username'];
$room = $_POST["room"];
$tag1 = $_POST["tag1"];
$tag2 = $_POST["tag2"];
$tag3 = $_POST["tag3"];
$tag4 = $_POST["tag4"];
$comment = $_POST["comment"];

$resultNew = mysqli_query($dbconn,
	"INSERT INTO CheckIn (u_ID, room, tag1, tag2, tag3, tag4, comment) VALUES ('$user', '$room', '$tag1', '$tag2', '$tag3', '$tag4', '$comment');");
		
header('Location: /feed.php');

?>