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
$friend = $_POST["friend"];
$comment = $_POST["comment"];
$AEBuxQuery = mysqli_query($dbconn, "SELECT * FROM `Users` WHERE `u_ID` = $user;");
$AEBuxQueryResult = mysqli_fetch_array($AEBuxQuery);
$userAEBux = $AEBuxQueryResult['AEBux'];

// update AEBux
$updatedAEBux = $userAEBux + 5;

// update database
mysqli_query($dbconn,
	"INSERT INTO CheckIn (u_ID, room, tag1, tag2, tag3, withFriend, comment) VALUES ('$user', '$room', '$tag1', '$tag2', '$tag3', '$friend', '$comment');");
mysqli_query($dbconn, "UPDATE `Users` SET `AEBux` = ".$updatedAEBux." WHERE `u_ID` = ".$user.";");
		
header('Location: /feed.php');

?>