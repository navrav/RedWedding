<?php

/******************************************
 *	FRIENDLIST.PHP - Generate friend list code
 *
 *		Retrieves friends from database;
 *		Creates friend list code.
 *
 *		Used in checkin.php
 */

session_start();
include_once("servercon.php");

if (!isset($_SESSION['username']))
{
	  header("location:index.php");
}

$user = $_SESSION['username'];

// using $user as u_ID,
// retrieve friends from db
$dbFriends = mysqli_query($dbconn, "SELECT u_ID, f_name, l_name FROM Users WHERE u_ID IN (SELECT ID_2 FROM Friends WHERE ID_1 = $user);");

// generate default option
echo '<span id="friend00" class="hashtag" onclick="saveFriend(this.id);" style="cursor: pointer">Alone</span><br />';

// generate friend list code
while (($nextFriend = mysqli_fetch_array($dbFriends)) != false) {
	echo '<span id="friend', $nextFriend['u_ID'], '" class="hashtag" onclick="saveFriend(this.id);" style="cursor: pointer">', $nextFriend['f_name'], ' ', $nextFriend['l_name'], '</span><br />';
}

?>