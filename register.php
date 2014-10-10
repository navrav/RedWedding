<?php

/***********************************************************
 *	REGISTER.PHP - Creates new user record in database
 *
 *		Takes user's details from register web page
 *			- fname, lname, password and email
 *		Uses an insert query to create a user record in db.
 */

include_once("servercon.php");

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$pass = $_POST["pass"];
$email = $_POST["email"];
$gender = $_POST["Gender"];

if ($gender == 'm') {
	$pic = 'm.png';
} else{
	$pic = 'f.png';
}

      	$select = mysqli_query($dbconn)

		$resultNew = mysqli_query($dbconn,"INSERT INTO Users (pass,f_name,l_name,email,gender,pic) VALUES ('$pass', '$fname','$lname','$email','$gender','$pic');");
		mysqli_close($conNew);		
		
header('Location: /index.php');

?>