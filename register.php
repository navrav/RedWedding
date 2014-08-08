<?php
$fname = $_POST["fname"];
$lname = $_POST["lname"];
$pass = $_POST["pass"];
$email = $_POST["email"];

		$conNew=mysqli_connect("deco3800-12.zones.eait.uq.edu.au","root","Hebrew*Read+dire","aeb");
      	// Check connection
      	if (mysqli_connect_errno()) {
        	echo "Failed to connect to MySQL: " . mysqli_connect_error();
      	}
		$resultNew = mysqli_query($conNew,"INSERT INTO Users (pass,f_name,l_name,email) VALUES ('$pass', '$fname','$lname','$email');");
		mysqli_close($conNew);		
		
header('Location: /index.php');

?>