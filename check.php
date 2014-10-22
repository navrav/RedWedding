<?php
// Previously known as "ajax_check.php"

session_start();
include_once("servercon.php");


//Use this for security -- not yet implemented
//$hasher = new PasswordHash(8, FALSE);
//$hash   = $hasher->HashPassword($password);


// username and password sent from form
$myusername= mysqli_real_escape_string($dbconn, $_GET['user']);
$mypassword=mysqli_real_escape_string($dbconn, $_GET['pass']);


$resultNew=mysqli_query($dbconn, "SELECT `u_ID` FROM `Users` WHERE email='$myusername' and pass='$mypassword'");
//$sql=mysqli_query($dbconn, "SELECT `u_ID` FROM `Users` WHERE email='$myusername' and pass='$mypassword'";
//$resultNew = mysqli_query($dbconn, $sql);
/*
if(!$result = $dbconn->query($sql)){
die('There was an error running the query [' . $db->error . ']');
}*/
// Mysql_num_row is counting table row

$count = mysqli_num_rows($resultNew);
//$count=$resultNew->num_rows;

// Converts to array to easily extract uID from row
$userdata = mysqli_fetch_array($resultNew);
mysqli_close($dbconn);	

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{
	// Extracts uID from the row of data about the user
	$uID = $userdata['u_ID'];
    $_SESSION['username']  = $uID;
    //$_SESSION['username']  = $myusername; // UNCOMMENT TO UNBREAK HERE
    $_SESSION['loggedIn'] = true;
    // close the session
 //   session_write_close();
   echo "ok";
}
else
{
    echo "false";

}

?>