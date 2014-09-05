<html>
<body>
	<?php
		echo "<script type='text/javascript'>alert('Really annoying pop-up!');</script>";
		
		$tag = $_GET['tag'];
		$tag2 = $_GET['tag2'];
		$tag3 = $_GET['tag3'];
		$room = $_GET['opttwo'];
		$user = 1;
		
		$conNew=mysqli_connect("deco3801-01.zones.eait.uq.edu.au","root","Viking8Chief+latch","aeb");
		if($tag != "a"){
			$resultNew = mysqli_query($conNew,"INSERT INTO CheckIn (u_ID, room, tag) VALUES ('$user', '$room', '$tag');");
		}
		if($tag2 != "a"){
			$resultNew = mysqli_query($conNew,"INSERT INTO CheckIn (u_ID, room, tag) VALUES ('$user', '$room', '$tag2');");
		}
		if($tag3 != "a"){
			$resultNew = mysqli_query($conNew,"INSERT INTO CheckIn (u_ID, room, tag) VALUES ('$user', '$room', '$tag3');");
		}
		mysqli_close($conNew);
		header("location: feed.php");
	?>
</body>
</html> 