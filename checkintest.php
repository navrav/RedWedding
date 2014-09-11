<?php
		$user = 1;
		$room = $_POST['opttwo']; // was originally 'room'
		$tag = $_POST['tag'];
		
		$conNew=mysqli_connect("deco3801-01.zones.eait.uq.edu.au","root","Viking8Chief+latch","aeb");
      	// Check connection
      	if (mysqli_connect_errno()) {
        	echo "Failed to connect to MySQL: " . mysqli_connect_error();
      	}
      	
      	if ($room != null || $tag != null) {
      		$resultNew = mysqli_query($conNew,"INSERT INTO CheckIn (u_ID, room, tag) VALUES ('$user', '$room', '$tag');");
		}
		
		mysqli_close($conNew);		
	?>
	
	<br>
	<br>
	<br>
	<br>
	
	<?php
      $conNew=mysqli_connect("deco3801-01.zones.eait.uq.edu.au","root","Viking8Chief+latch","aeb");
      // Check connection
      if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $resultNew = mysqli_query($conNew,"SELECT room, tag from CheckIn ORDER BY room;");

      echo "<table border='1'>
      <tr>
      <th>Room</th>
      <th>Tag</th>
      </tr>";

      while($row = mysqli_fetch_array($resultNew)) {
        echo "<tr>";
        echo "<td>" . $row['room'] . "</td>";
        echo "<td>" . $row['tag'] . "</td>";
        echo "</tr>";
      }

      echo "</table>";

      mysqli_close($conNew);
    ?>