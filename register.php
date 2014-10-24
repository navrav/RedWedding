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
include_once("PasswordHash.php");


$fname = strip_tags($_POST["fname"]);
$lname = strip_tags($_POST["lname"]);
$pass = create_hash(mysqli_real_escape_string($dbconn, $_POST["pass"]));
$email = mysqli_real_escape_string($dbconn, $_POST["email"]);
$gender = $_POST["Gender"];

if ($gender == 'm') {
	$pic = 'm.png';
} else{
	$pic = 'f.png';
}

$query = "SELECT `u_ID` FROM `Users` WHERE email= ?";

$stmt = mysqli_prepare($dbconn, $query);

mysqli_stmt_bind_param($stmt, 's', $email);

mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result($stmt, $uID);

if (mysqli_stmt_fetch($stmt)){
	mysqli_stmt_close($stmt);
	header('Location: /signup.php?signfailed=1');
} else{
	mysqli_stmt_close($stmt);
	$insertquery = "INSERT INTO Users (pass,f_name,l_name,email,gender,pic) VALUES (?, ?, ?, ?, ?, ?);";
	$insertstmt = mysqli_prepare($dbconn, $insertquery);
	mysqli_stmt_bind_param($insertstmt, 'ssssss', $pass, $fname, $lname, $email, $gender, $pic);
	mysqli_stmt_execute($insertstmt);
	mysqli_stmt_close($insertstmt);
	header('Location: /index.php');
}





/*
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
*/	
?>