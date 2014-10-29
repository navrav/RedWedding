<?php

/****************************************************************
 *	SURVEY_SUBMIT.PHP - Sends survey form input to database
 *
 *		Takes survey form inputs (4 tags)
 *		Uses an insert query to create survey record in db.
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
$tag2 = $_POST["tag2"]; // humidity
$tag3 = $_POST["tag3"]; // noise
$tag4 = $_POST["tag4"]; // lighting
$tag5 = $_POST["tag5"]; // crowd
$comment = strip_tags($_POST["comment"]);
$AEBuxQuery = mysqli_query($dbconn, "SELECT * FROM `Users` WHERE `u_ID` = $user;");
$AEBuxQueryResult = mysqli_fetch_array($AEBuxQuery);
$userAEBux = $AEBuxQueryResult['AEBux'];

// update AEBux
$updatedAEBux = $userAEBux + 10;

// update database
$query = "INSERT INTO `Survey` (u_ID, room, temp, humid, noise, light, crowd, comment) VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

$stmt = mysqli_prepare($dbconn, $query);
mysqli_stmt_bind_param($stmt, 'isiiiiis', $user, $room, $tag1, $tag2, $tag3, $tag4, $tag5, $comment);
mysqli_stmt_execute($stmt);
mysqli_stmt_close($stmt);

mysqli_query($dbconn, "UPDATE `Users` SET `AEBux` = ".$updatedAEBux." WHERE `u_ID` = ".$user.";");

header('Location: /feed.php');



/*** UNUSED ***
// CONVERTING NUMBERS INTO TAGS - COMMENTED OUT IN FAVOUR OF NUMERIC FEEDBACK (1-10)
// tag1 - temperature
if ($tag1 == 0) {
	$tag1 = "cold";
} else if ($tag1 == 1) {
	$tag1 = "cool";
} else if ($tag1 == 2) {
	$tag1 = "mild";
} else if ($tag1 == 3) {
	$tag1 = "warm";
} else if ($tag1 == 4) {
	$tag1 = "hot";
}

// tag2 - humidity
if ($tag2 == 0) {
	$tag2 = "dry";
} else if ($tag2 == 1) {
	$tag2 = "normal";
} else if ($tag2 == 2) {
	$tag2 = "humid";
}

// tag3 - noise
if ($tag3 == 0) {
	$tag3 = "quiet";
} else if ($tag3 == 1) {
	$tag3 = "fine";
} else if ($tag3 == 2) {
	$tag3 = "noisy";
}

// tag4 - light
if ($tag4 == 0) {
	$tag4 = "dark";
} else if ($tag4 == 1) {
	$tag4 = "comfy";
} else if ($tag4 == 2) {
	$tag4 = "bright";
}

// tag5 - crowd
if ($tag5 == 0) {
	$tag5 = "peaceful";
} else if ($tag5 == 1) {
	$tag5 = "crowded";
}
//////////////////////////////*/

?>