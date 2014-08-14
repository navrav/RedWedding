<!DOCTYPE html>
<html>

  <head>
    <title> PHP Scripts for Andre </title>
  </head>

  <body>

    <h1> Table of Users </h1>

    <?php
      $con=mysqli_connect("deco3801-01.zones.eait.uq.edu.au","root","","aeb");
      // Check connection
      if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

      // Query
      $result = mysqli_query($con,"SELECT f_name, l_name FROM Users");

      echo "<table border='1'>
      <tr>
      <th>Firstname</th>
      <th>Lastname</th>
      </tr>";

      while($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['f_name'] . "</td>";
        echo "<td>" . $row['l_name'] . "</td>";
        echo "</tr>";
      }

      echo "</table>";
      mysqli_close($con);

    ?>
    
    <h1> Get a user's list of friends </h1>
    
    <?php
      $conNew=mysqli_connect("deco3801-01.zones.eait.uq.edu.au","root","Hebrew*Read+dire","aeb");
      // Check connection
      if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $resultNew = mysqli_query($conNew,"SELECT f_name, l_name FROM Users WHERE u_ID IN (SELECT ID_2 FROM Friends WHERE ID_1 =1)");

      $conNew=mysqli_connect("deco3801-01.zones.eait.uq.edu.au","root","Hebrew*Read+dire","aeb");
      // Check connection
      if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      $resultNew = mysqli_query($conNew,"SELECT f_name, l_name FROM Users WHERE u_ID IN (SELECT ID_2 FROM Friends WHERE ID_1 =1)");

      while($rowNew = mysqli_fetch_array($resultNew)) {
        echo $rowNew['f_name'] . " " . $rowNew['l_name'];
        echo '</br>';
      }

      mysqli_close($conNew);
    ?>
    
<!-- 	QUERY FOR HEAT MAP 
		
		Room ID
		Count of responses
		Colour from type of response
		Type?

-->

<!-- 	Insert a check in  -->
	
	<br>
	<br>
	<br>
	<form name='checkin' action='checkintest.php' method='post'>
	
<!-- 		Room: <input type='text' name='room'></br> -->
		
		<?php
			$conNew=mysqli_connect("deco3801-01.zones.eait.uq.edu.au","root","Hebrew*Read+dire","aeb");
      		// Check connection
      		if (mysqli_connect_errno()) {
        		echo "Failed to connect to MySQL: " . mysqli_connect_error();
      		}
      		
      		$rooms = mysqli_query($conNew,"SELECT room from Rooms ORDER BY room;");
      		
      		echo "<select name='room'>";
      		while ($row = mysqli_fetch_array($rooms)) {
      			echo "<option value=";
      			echo '"' . $row['room'] . '"';
      			echo ">";
      			echo $row['room'];
      			echo "</option>";
      			
      		}
      		echo "</select>";
      		
      		mysqli_close($conNew);
			
		?>
		</br>
		
		<input type='radio' name='tag' value='hot'>Hot</br>
		<input type='radio' name='tag' value='cold'>Cold</br>
		<input type='radio' name='tag' value='warm'>Warm</br>
		<input type='submit' value='submit'>
	
	</form>
	
	<br>
	<br>
    
    <?php
    	$conNew=mysqli_connect("deco3801-01.zones.eait.uq.edu.au","root","Hebrew*Read+dire","aeb");
      	// Check connection
      	if (mysqli_connect_errno()) {
        	echo "Failed to connect to MySQL: " . mysqli_connect_error();
      	}

      	$count = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 302");
      	$warm = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 302 AND tag = 'warm'");
      	$hot = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 302 AND tag = 'hot'");
      	$cold = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 302 AND tag = 'cold'");
      	
      	echo 'number of results for 302: ';
      	while($count = mysqli_fetch_array($count)) {
        	echo $count['COUNT(*)'];
        	echo '</br>';
      	}
      	
      	echo 'number of warm responses: ';
      	while($warm = mysqli_fetch_array($warm)) {
        	echo $warm['COUNT(*)'];
        	echo '</br>';
      	}
      	
      	
      	echo 'number of hot responses: ';
      	while($hot = mysqli_fetch_array($hot)) {
        	echo $hot['COUNT(*)'];
        	echo '</br>';
      	}
      	
      	
      	echo 'number of cold responses: ';
      	while($cold = mysqli_fetch_array($cold)) {
        	echo $cold['COUNT(*)'];
        	echo '</br>';
      	}
      	
      	mysqli_close($conNew);
    	
    ?>
    
    <br>
	<br>
	<br>
	<br>
	
    
    <form method='GET' action='registertest.php'>
  	First Name:<input type='text' name='f_name'><br>
  	Last Name:<input type='text' name='l_name'><br>
  	Password:<input type='password' name='pass'><br>
  	Email:<input type='email' name='email'><br>
  	<input type='submit' value='submit'>
  	
  </form>

  </body>
  
  
  	

</html>
