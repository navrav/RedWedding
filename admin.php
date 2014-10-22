<!DOCTYPE html>

<?php
  session_start();
  include_once("servercon.php");

  if (!isset($_SESSION['username']))
  {
      header("location:index.php");
  }

	$user = $_SESSION["username"];
	echo("<script>console.log('uID:".$user."');</script>"); // Nikita added print check here

  $resultNew = mysqli_query($dbconn, "SELECT `timestamp`, `room`, `tag1`, `tag2`, `tag3`, `tag4`, `withFriend`, `comment`, `f_name`, `l_name`, `pic`, `rank` FROM CheckIn, Users WHERE CheckIn.u_ID = Users.u_ID AND CheckIn.u_ID IN (SELECT ID_2 FROM Friends WHERE ID_1 ='{$user}' OR CheckIn.u_ID = {$user}) ORDER BY `CheckIn`.`timestamp` DESC");
?>

<html>

<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="css/jquery.mobile-1.4.2.css">
<link rel="stylesheet" href="css/jquery.mobile-core.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css" type="text/css">

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="js/jquery.mobile-1.4.2.js"></script>

<script>
function setOptions(feed) {
		
			console.log(feed);

			if (feed == "1") {
				document.getElementById('feed').style.display= 'block' ;
				document.getElementById('events').style.display= 'none' ;
			}
			
			if (feed == "2") {
				document.getElementById('feed').style.display= 'none' ;
				document.getElementById('events').style.display= 'block' ;
			}
}
</script>

</head>

<body>
    <!--start top bar-->
	<div data-role="page" data-theme="b" style="background-color:white;">
		<div data-role="header" id="header_red">
			<?php require("topbanner.php"); ?>
		</div>
		<!--end top bar-->
  
  
		<!--nav bar-->

   	 	<?php require("menu.php"); ?>
	
		<!--end nav bar-->
    
  
  <!-- the feed, i dont know, working on it. adee -->
   <section data-role="main" class="ui-content" style="padding-bottom:0px;">
		<font color="black">Select a category to view trouble rooms:</font>
		<select name="cat" onchange="setOptions(this.options[this.selectedIndex].value);">
			<option value="1">Temperature</option>
			<option value="2">Usage Level</option>
			<option value="3">Lighting</option>
			<option value="4">Noise</option>
			
		</select>
		
		<div id="tempRooms">
		<table style="width:90%" align="center">
        <tr>
        <td>Room</td>
        <td>Recent #Bad Feedback</td> 
        <td>Rating</td>
        </tr>
        <tr>
        <td>315</td>
        <td>2</td> 
        <td>-4.1</td>
        </tr>
        <tr>
        <td>420</td>
        <td>1</td> 
        <td>-2.2</td>
        </tr>
        </table>
        </div>
        
        <div id="usageRooms" style="display: none;">
		<table style="width:90%" align="center">
        <tr>
        <td>Room</td>
        <td>Recent #Bad Feedback</td> 
        <td>Rating</td>
        </tr>
        <tr>
        <td>315</td>
        <td>2</td> 
        <td>-4.1</td>
        </tr>
        <tr>
        <td>420</td>
        <td>1</td> 
        <td>-2.2</td>
        </tr>
        </table>
        </div>
        
        <div id="ligtingRooms" style="display: none;">
		<table style="width:90%" align="center">
        <tr>
        <td>Room</td>
        <td>Recent #Bad Feedback</td> 
        <td>Rating</td>
        </tr>
        <tr>
        <td>315</td>
        <td>2</td> 
        <td>-4.1</td>
        </tr>
        <tr>
        <td>420</td>
        <td>1</td> 
        <td>-2.2</td>
        </tr>
        </table>
        </div>
        
        <div id="noiseRooms" style="display: none;">
		<table style="width:90%" align="center">
        <tr>
        <td>Room</td>
        <td>Recent #Bad Feedback</td> 
        <td>Rating</td>
        </tr>
        <tr>
        <td>315</td>
        <td>2</td> 
        <td>-4.1</td>
        </tr>
        <tr>
        <td>420</td>
        <td>1</td> 
        <td>-2.2</td>
        </tr>
        </table>
        </div>
		
		</section>
		
		<section data-role="main" class="ui-content" style="padding-bottom:0px;">
		<font color="black">Filter recent check-ins:</font>
		<select name="lev" onchange="setOptions(this.options[this.selectedIndex].value);">
			<option value="1">Level 1</option>
			<option value="2">Level 2</option>
			<option value="3">Level 3</option>
			<option value="4">Level 4</option>
			<option value="5">Level 5</option>
			<!--<option value="2">Events</option>-->
		</select>
		
		<select name="room" onchange="setOptions(this.options[this.selectedIndex].value);">
			<option value="101">101</option>
			<option value="102">102</option>
			<option value="103">103</option>
			<option value="104">104</option>
			<option value="105">105</option>
			<!--<option value="2">Events</option>-->
		</select>
		</section>
    
    <!-- feed end-->


        <div data-role="main" class="ui-content" id="feed" style="display:block; padding-top:0px;" >
        
          <ul data-role="listview" data-inset="true">

            <?php

            
                    
            while($checkList = mysqli_fetch_array($resultNew, MYSQLI_ASSOC)) {
            //$datetimenew = date_create('2001-01-01');
           $datetimenew = date_create($checkList['timestamp']);
           
           //$datetimecomp = date_format($datetimenew, 'm.d.y');
            //$date = date_format($date,"Y/m/d");
            //$datetimeall = getdate($checkList['timestamp']);
            $alltags = [$checkList['tag1'], $checkList['tag2'], $checkList['tag3'], $checkList['tag4']];
            $allrealtags = array();
            
            foreach($alltags as $tag){
            	if ($tag){
            		array_push($allrealtags, $tag);
            	}
            }
            
            $ntags = count($allrealtags);
            
            
            ?>

            <!-- <li style="background-color:#e03838; border:none;">Wednesday, January 2, 2014 <span class="ui-li-count">3</span></li> -->
           <!--<li style="background-color:#e03838; border:none;"> <?php echo($datetimeall['weekday']);?>, <?php echo($datetimeall['month']);?> <?php echo($datetimeall['mday']);?>, <?php echo($datetimeall['year']); ?> <span class="ui-li-count">3</span></li> -->
           <li style="background-color:#e03838; border:none;"> <?php echo date_format($datetimenew, 'l jS F Y');?> <span class="ui-li-count"><?php echo date_format($datetimenew, 'h:i a');?></span></li>
           
            <li class="feed-line" data-icon="false" style="border:none;">
            	<h2>
            	<span>
            	<img src="avatars/<?php echo($checkList['pic']);?>" width="40px" height="40px" class="img-circle"/>  
            	</span> 
              <?php echo $checkList['f_name'] . " " . $checkList['l_name']; ?></h2>
              <p><?php echo($checkList['f_name']);
              if ($ntags > 0){
              ?> felt <?php 
              }
              
              
              $i = 1;
              
              foreach($allrealtags as $tag){
              	echo($tag);
            
              
              	if ($i == ($ntags-1)){
              		?> and <?php
              		}
              
              	if (($i < $ntags) && ($i != ($ntags-1))){
              	?>, <?php
              	}
              	
              	$i = $i+1;
              }
              
              
              
              
              
              
              ?>
               at <?php echo($checkList['room']);
              if ($checkList['withFriend']){ 
               ?> with <?php echo($checkList['withFriend']);
              }
              ?> <br>
			  <?php // edit by Yong - print comment only if it exists.
			  if ($checkList['comment'] != "") {
				echo("\"");
				echo($checkList['comment']);
				echo("\"");
			  } ?></p>
              <p class="ui-li-aside"> 
            <!-- <?php echo date_format($datetimenew, 'h:i a');?></p>-->
              <!--<?php echo($datetimeall['hours']);?>:<?php echo($datetimeall['minutes']);?>  <?php echo($checkList['timestamp']);?></p>-->
            </li>

            <li class="feed-line" data-icon="false" style="border:none;">
            <?php
            }
            ?>
		   
			</ul>
      
      </div>
  
    </div> 

</body>
</html>