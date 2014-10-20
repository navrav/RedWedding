<?php

/***********************************************************
 *	REGISTER.PHP - Creates new user record in database
 *
 *		Takes user's details from register web page
 *			- fname, lname, password and email
 *		Uses an insert query to create a user record in db.
 */
session_start();
include_once("servercon.php");

unset($_SESSION['failed']);

$fname = mysqli_real_escape_string($dbconn, $_POST["fname"]);
$lname = mysqli_real_escape_string($dbconn, $_POST["lname"]);
$pass = mysqli_real_escape_string($dbconn, $_POST["pass"]);
$email = mysqli_real_escape_string($dbconn, $_POST["email"]);
$gender = $_POST["Gender"];

if ($gender == 'm') {
	$pic = 'm.png';
} else{
	$pic = 'f.png';
}

$count = 0;
$select = mysqli_query($dbconn,"SELECT email from Users where email = '$email'");
$count = mysqli_num_rows($select);

if($count == 1){
	$_SESSION['failed'] = "True";
	header('Location: /signup.php');
} else {
	$resultNew = mysqli_query($dbconn,"INSERT INTO Users (pass,f_name,l_name,email,gender,pic) VALUES ('$pass', '$fname','$lname','$email','$gender','$pic');");
	header('Location: /index.php');
}
mysqli_close($dbconn);		
?>