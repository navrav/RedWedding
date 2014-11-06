	<?php
		$fname = $_GET['f_name'];
		$lname = $_GET['l_name'];
		$pass = $_GET['pass'];
		$email = $_GET['email'];
		
		$conNew=mysqli_connect("deco3801-01.zones.eait.uq.edu.au","root","Viking8Chief+latch","aeb");
      	// Check connection
      	if (mysqli_connect_errno()) {
        	echo "Failed to connect to MySQL: " . mysqli_connect_error();
      	}
      	
      	$resultNew = mysqli_query($conNew,"INSERT INTO Users (f_name, l_name, pass, email) VALUES ('$fname', '$lname', '$pass', '$email');");
		mysqli_close($conNew);		
	?>
	
	<?php
      $conNew=mysqli_connect("deco3801-01.zones.eait.uq.edu.au","root","Viking8Chief+latch","aeb");
      // Check connection
      if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $resultNew = mysqli_query($conNew,"SELECT u_id, f_name, l_name, email from Users ORDER BY u_id;");

      echo "<table border='1'>
      <tr>
      <th>UID</th>
      <th>First name</th>
      <th>Last name</th>
      <th>Email</th>
      </tr>";

      while($row = mysqli_fetch_array($resultNew)) {
        echo "<tr>";
        echo "<td>" . $row['u_id'] . "</td>";
        echo "<td>" . $row['f_name'] . "</td>";
        echo "<td>" . $row['l_name'] . "</td>";
        echo "<td>" . $row['email'] . "</td>";
        echo "</tr>";
      }

      echo "</table>";

      mysqli_close($conNew);
    ?>