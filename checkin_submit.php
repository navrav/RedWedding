<!DOCTYPE html>

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

$user = 1;

/*
$room = $_POST["room"];
$tag1 = $_POST["tag1"];
$tag2 = $_POST["tag2"];
$tag3 = $_POST["tag3"];
$tag4 = $_POST["tag4"];
$comment = $_POST["comment"];
*/

$room = 316;
$tag1 = "hot";
$tag2 = "comfy";
$tag3 = "peaceful";

//$resultNew = mysqli_query($dbconn, "INSERT INTO `CheckIn` (`u_ID`, `room`, `tag1`, `tag2`, `tag3`) VALUES (`$user`, `$room`, `$tag1`, `$tag2`, `$tag3`);");
		
//header('Location: /feed.php');
*/
?>

<html>


<body>

<h1>My First Web Page</h1>
<?php
echo $user;
echo $room;
echo $tag1;
echo $tag2;
echo $tag3;
echo $tag4;
echo $comment;
?>
<p>
Activate debugging in your browser (Chrome, IE, Firefox) with F12, and select "Console" in the debugger menu.
</p>

<script>
a = 5;
b = 6;
c = a + b;
console.log(c);
</script>

</body>
</html> 
