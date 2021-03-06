<?php

/*****************************************************************
 *	CHECKIN_SUBMIT.PHP - Sends checkIn form input to database
 *
 *		Takes checkIn form inputs (room, 5 tags, comment, friend)
 *		Uses an insert query to create checkIn record in db
 *		Updates user's AEBux total
 */

session_start();
include_once("servercon.php");

if (!isset($_SESSION['username']))
{
	  header("location:index.php");
}

$user = $_SESSION['username'];
$room = $_POST["room"];
$tag1 = $_POST["tag1"]; // temperature
$tag2 = $_POST["tag2"]; // lighting
$tag3 = $_POST["tag3"]; // crowd
$tag4 = $_POST["tag4"]; // noise
$tag5 = $_POST["tag5"]; // humidity
$comment = strip_tags($_POST["comment"]);
$friend = substr($_POST["friend"], 6); // so as to remove "friend" from "friend##"
$AEBuxQuery = mysqli_query($dbconn, "SELECT * FROM `Users` WHERE `u_ID` = $user;");
$AEBuxQueryResult = mysqli_fetch_array($AEBuxQuery);
$userAEBux = $AEBuxQueryResult['AEBux'];

// recalculate AEBux
$updatedAEBux = $userAEBux + 5;

// update database
$query = "INSERT INTO CheckIn (u_ID, room, tag1, tag2, tag3, tag4, tag5, withFriend, comment) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);";

$stmt = mysqli_prepare($dbconn, $query);
mysqli_stmt_bind_param($stmt, 'issssssis', $user, $room, $tag1, $tag2, $tag3, $tag4, $tag5, $friend, $comment);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

mysqli_query($dbconn, "UPDATE `Users` SET `AEBux` = ".$updatedAEBux." WHERE `u_ID` = ".$user.";");

// redirect page
header('Location: /feed.php');

?>