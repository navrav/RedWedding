<?php
  session_start();
  include_once("servercon.php");

  if (!isset($_SESSION['username']))
  {
      header("location:index.php");
  }

  $user = $_SESSION["username"];

  $result = mysqli_query($dbconn, "SELECT `f_name`,`l_name`,`pic` FROM `Users` WHERE `u_ID` = {$user}");
    /*
		if($stat != ""){
			if(!$result = $dbconn->query($stat)){
					die("There was an error running the stat query [".$db->error."]");
				}
		
	*/
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $fname = $row["f_name"];
    $lname = $row["l_name"];
    $avatar = $row["pic"];
    //printf("%s (%s)\n", $row["f_name"], $row["l_name"]);
    //echo("<script>console.log('first name:".$fname."');</script>"); 
    //echo("<script>console.log('row:".$row['l_name']."');</script>"); 
    //echo("<script>console.log('query:".$result."');</script>"); 
?>

<section data-role="panel" id="nav" data-display="overlay"> 
   	 		
    <ul data-role="listview">
	    <li>
			    	<!--insert username here -->
		  	<a href="profile.php" style="background-color:#ee4055;">
		  		<h4>
		  		<img src="avatar/<?php echo($avatar);?>.png" width="50px" height="50px" class="img-circle" hspace="10" />
		  		<?php echo ($fname ." ". $lname); ?>
		  		<br>
		  		<h4 style ="size: 10px">
		  		
		  		</h4>
		  		</h4>
		    </a>
	    </li>
		<li>
			<a href="feed.php"  data-ajax="false" style="background-color:#e03838;">
			<span class="glyphicon glyphicon-home"></span>
			  Feed
			</a>
		</li>
		<li>
			<a href="checkin.php" data-ajax="false" style="background-color:#ef4f23;">
			<span class="glyphicon glyphicon-map-marker"></span>
			  Check In
			  </a>
		</li>
		<li>
			<a href="friends.php" data-ajax="false"  style="background-color:#883c96;">
			<span><img src="icons/friends1.png" height="15px" width="15px"/></span>
			Friends
			</a>
		</li>
		<li>
			<a href="result.php" data-ajax="false" style="background-color:#3d8cea;">
			<span><img src="icons/map1.png" height="20px" width="20px"/></span>
			Map
			</a>
		</li>
		<li>
			<a href="survey.php" data-ajax="false" style="background-color:#fdd017;">
			<span class="glyphicon glyphicon-list-alt"></span>
			Survey
			</a>
		
		</li>
		
		<li>
			<a href="building.php" style="background-color:#26b89a;">
			<span><img src="icons/building-info1.png" height="15px" width="15px"/></span>
			Building Information
			</a>
		</li>
		<li>
			<a href="maintenance.php" data-ajax="false" style="background-color:#CD4F39;">
			<span class="glyphicon glyphicon-warning-sign"></span>
			Maintenance/Contact
			</a>
		</li>
		
		<li>
			<a href="javascript:void(0)" Onclick="logout()";  data-ajax="false"  style="background-color:#CE6786;">
			<span><img src="icons/logout.png" height="15px" width="15px"/></span>
			Log Out
			</a>
		</li>
		
    </ul> 
</section>
<script>
function logout(){
location.href="/logout.php";

}

</script>
