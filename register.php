<?php

/***************************************************************************
 *	REGISTER.PHP - Create new user record in database
 *
 *		Takes user's fname, lname, password and email from register web page
 *		Uses an insert query to create a record in the user table of db
 */

$fname = $_POST["fname"];
$lname = $_POST["lname"];
$pass = $_POST["pass"];
$email = $_POST["email"];

		$conNew=mysqli_connect("deco3801-01.zones.eait.uq.edu.au","root","Viking8Chief+latch","aeb");
      	// Check connection
      	if (mysqli_connect_errno()) {
        	echo "Failed to connect to MySQL: " . mysqli_connect_error();
      	}
		$resultNew = mysqli_query($conNew,"INSERT INTO Users (pass,f_name,l_name,email) VALUES ('$pass', '$fname','$lname','$email');");
		mysqli_close($conNew);		
		
header('Location: /index.php');

?>