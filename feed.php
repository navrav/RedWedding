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
		<select name="rno" onchange="setOptions(this.options[this.selectedIndex].value);">
			<option value="1">News Feed</option>
			<!--<option value="2">Events</option>-->
		</select>
    </section>
    <!-- feed end-->


        <div data-role="main" class="ui-content" id="feed" style="display:block; padding-top:0px;" >
        
          <ul data-role="listview" data-inset="true">

            <?php
            
        
        
            while($checkList = mysqli_fetch_array($resultNew, MYSQLI_ASSOC)) {
            $datetimeall = getdate($checkList['timestamp']);
            
            ?>

            <!-- <li style="background-color:#e03838; border:none;">Wednesday, January 2, 2014 <span class="ui-li-count">3</span></li> -->
           <li style="background-color:#e03838; border:none;"> <?php echo($datetimeall['weekday']);?>, <?php echo($datetimeall['month']);?> <?php echo($datetimeall['mday']);?>, <?php echo($datetimeall['year']); ?> <span class="ui-li-count">3</span></li> 
           
            <li class="feed-line" data-icon="false" style="border:none;">
            	<h2>
            	<span>
            	<img src="avatars/<?php echo($checkList['pic']);?>" width="40px" height="40px" class="img-circle"/>  
            	</span> 
              <?php echo $checkList['f_name'] . " " . $checkList['l_name']; ?></h2>
              <p><?php echo($checkList['f_name']); ?> felt <?php echo($checkList['tag1']);
              if ($checkList['tag2'] && $checkList['tag3'] && $checkList['tag4']){
              ?>, <?php echo($checkList['tag2']); ?>, <?php echo($checkList['tag3']); ?>, and <?php echo($checkList['tag4']);
              }
              if ($checkList['tag2'] && !$checkList['tag3'] && !$checkList['tag4']){
              ?> and <?php echo($checkList['tag2']); 
              }
              
              if ($checkList['tag2'] && $checkList['tag3'] && !$checkList['tag4']){
              ?>, <?php echo($checkList['tag2']); ?>, and <?php echo($checkList['tag3']);
              }
              ?>
               at <?php echo($checkList['room']);
              if ($checkList['withFriend']){ 
               ?> with <?php echo($checkList['withFriend']);
              }
              ?> <br> <?php echo($checkList['comment']); ?></p>
              <p class="ui-li-aside"> 
              <?php echo($datetimeall['hours']);?>:<?php echo($datetimeall['minutes']);?>  <?php echo($checkList['timestamp']);?></p>
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