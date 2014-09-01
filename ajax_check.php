<?php

session_start();

$host="deco3801-01.zones.eait.uq.edu.au"; // Host name
$username="root"; // Mysql username
$password="Viking8Chief+latch"; // Mysql password
$db_name="aeb"; // Database name
$tbl_name="Users"; // Table name
error_reporting(E_ALL);

// Connect to server and select databse.
$dbconn = new mysqli($host, $username, $password, $db_name);
if($dbconn->connect_errno > 0){
		die("Unable to connect to database [".$db->connect_error."]");
	}





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
// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1)
{
//    session_regenerate_id();
    $_SESSION['username']  = $myusername;
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