<?php
/***********************************************************
 *	REGISTER.PHP - Creates new user record in database
 *
 *		Takes user's details from SIGNUP.PHP web page
 *			- fname, lname, password, email and gender
 *		Uses a prepare statement to
 *		insert query to create a user record in db.
 */
include_once("servercon.php");
//
include_once("PasswordHash.php");

//Strips the html tags from inputed Posts
$fname = strip_tags($_POST["fname"]);
$lname = strip_tags($_POST["lname"]);
//
$pass = create_hash(mysqli_real_escape_string($dbconn, $_POST["pass"]));
$email = mysqli_real_escape_string($dbconn, $_POST["email"]);
$gender = $_POST["Gender"];

//Checks whether the user is male. If so then the default picture variable is set to m.png,
//otherwise pic is set to f.png
if ($gender == 'm') {
	$pic = 'm.png';
} else{
	$pic = 'f.png';
}

//Checks whether a user has been set up with given email.
//If so then signup will fail and the user will be sent back to the sign up page.
//Else the user's data will be inputted into the Users table.

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
	header('Location: /index.php?signsuccess=1');
}
?>