<?php
// Previously known as "ajax_check.php"

session_start();
include("servercon.php");
$tbl_name="Users"; // Table name


//Use this for security -- not yet implemented
//$hasher = new PasswordHash(8, FALSE);
//$hash   = $hasher->HashPassword($password);


// username and password sent from form
$myusername=$dbconn->real_escape_string($_GET['user']);
$mypassword=$dbconn->real_escape_string($_GET['pass']);


$sql="SELECT * FROM $tbl_name WHERE email='$myusername' and pass='$mypassword'";
if(!$result = $dbconn->query($sql)){
die('There was an error running the query [' . $db->error . ']');
}
// Mysql_num_row is counting table row
$count=$result->num_rows;

// Converts to array to easily extract uID from row
$userdata = mysqli_fetch_array($sql);
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{
//    session_regenerate_id();
	// Extracts uID from the row of data about the user
	$uID = $userdata['u_ID'];
    $_SESSION['username']  = $uID;
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