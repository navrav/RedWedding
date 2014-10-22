<!DOCTYPE html>
<html>

  <head>
    <title> PHP Script for Hashing Password </title>
  </head>

  <body>

    <h1> Password Hashing </h1>
	<?php

	include_once("PasswordHash.php");
	include_once("servercon.php");
	$pass = "3801";

	$pass2 = "3801";

	$hashedpass = create_hash($pass);

	//mysqli_query($dbconn,"INSERT INTO Temp (Hashed) VALUES ('$hashedpass');");

	echo($hashedpass);

	$query = mysqli_query($dbconn, "SELECT Hashed FROM Temp");
	$result = mysqli_fetch_array($query, MYSQLI_ASSOC);

	?>
	<br>
	<?php
	if(validate_password($pass2, $result['Hashed'])){
		echo "It worked :)";
	} else {
		echo "failed :(";
	}

	?>
	</body>
</html>
