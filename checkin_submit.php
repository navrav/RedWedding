<?php

/****************************************************************
 *	CHECKIN_SUBMIT.PHP - Sends checkIn form input to database
 *
 *		Takes checkIn form inputs
 *			- room, tags, comment, friends (not yet implemented)
 *		Uses an insert query to create checkIn record in db.
 */

$user = 1;
$room = $_POST["room"];
$tag1 = $_POST["tag1"];
$tag2 = $_POST["tag2"];
$tag3 = $_POST["tag3"];
$tag4 = $_POST["tag4"];
$comment = $_POST["comment"];

		$conNew = mysqli_connect("deco3801-01.zones.eait.uq.edu.au", "root", "Viking8Chief+latch", "aeb");
      	// Check connection
      	if (mysqli_connect_errno()) {
        	echo "Failed to connect to MySQL: " . mysqli_connect_error();
      	}
		$resultNew = mysqli_query($conNew,
			"INSERT INTO CheckIn (u_ID, room, tag1, tag2, tag3, tag4, comment) VALUES ('$user', '$room', '$tag1', '$tag2', '$tag3', '$tag4', '$comment');");
		mysqli_close($conNew);
		
header('Location: /feed.php');

?>