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

  $resultNew = mysqli_query($dbconn, "SELECT `pic`, `f_name`, `l_name`, `pic`, `rank` FROM CheckIn, Users WHERE CheckIn.u_ID = Users.u_ID AND CheckIn.u_ID IN (SELECT ID_2 FROM Friends WHERE ID_1 ='{$user}' OR CheckIn.u_ID = {$user}) ORDER BY `CheckIn`.`timestamp` DESC");
	
	$alluserss = mysqli_query($dbconn, "SELECT `u_ID`, `f_name`, `l_name`, `pic` FROM Users");
	$myfriendss = mysqli_query($dbconn, "SELECT ID_2 FROM Friends WHERE ID_1='{$user}'");
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
<script src="js/list.js"></script>

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

    
var options = {
  valueNames: [ 'name']
};

var userList = new List('users', options);    

</script>

<style>
input {
  border:solid 1px #ccc;
  border-radius: 5px;
  padding:7px 14px;
  margin-bottom:10px
}
input:focus {
  outline:none;
  border-color:#aaa;
}

h3.name {
  font-size: 16px;
  margin:0 0 0.3rem;
  font-weight: normal;
  font-weight:bold;
}

.searchbutton{
width:90%;
}

/* 
.searchbar{
width:90%;
color:black;
}
 */

p.addFriend{
font-size:120%;
color: black;
font-family: "HelveticaNeueUltraLight", "HelveticaNeue-Ultra-Light", "Helvetica Neue Ultra Light", "HelveticaNeue", "Helvetica Neue", 'TeXGyreHerosRegular', "Arial", sans-serif;
				
}

</style>

</head>

<body>
    <!--start top bar-->
	<div data-role="page" data-theme="b" style="background-color:white;">
		<div data-role="header" id="header_purple">
			<?php require("topbanner.php"); ?>
		</div>
		<!--end top bar-->
  
  
		<!--nav bar-->

   	 	<?php require("menu.php"); ?>
	
		<!--end nav bar-->
    
  
  <!-- the feed, i dont know, working on it. adee -->
<!-- 
   <section data-role="main" class="ui-content" style="padding-bottom:0px;">
		<select name="rno" onchange="setOptions(this.options[this.selectedIndex].value);">
			<option value="1">News Feed</option>
			<!~~<option value="2">Events</option>~~>
		</select>
    </section>
 -->
    <!-- feed end-->
     <!-- 
 <section>
		<form id="addFriendForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		 <input type="text" name="search" class="searchbar" value="" placeholder="Search for friend..." data-theme="dark"></input>
		 <button type="submit" value="Search" class="searchbutton">Search</button>
		</form>
    </section>
 -->
    <input class="search" placeholder="Search" />

        <div data-role="main" class="ui-content" id="users" style="display:block; padding-top:0px;" >
        
          <ul data-role="listview" data-inset="true">
          
			<?php
			
			$myfriends = array();
			
			while($myfriendsa = mysqli_fetch_array($myfriendss, MYSQLI_ASSOC)){
				array_push($myfriends, $myfriendsa[`ID_2`]);?>
				<li class="feed-line" data-icon="false" style="border:none;">
				<h2 class="name">
				<?php
				echo("<script>console.log('Friend Name: '".$myfriendsa[`ID_2`]."');</script>");
				echo($myfriendsa[`ID_2`]); ?>
				</h3>
				<?php
			}
			
			?>
			
			</li>
			
			
			<?php

			while($allusers = mysqli_fetch_array($alluserss, MYSQLI_ASSOC)){?>
			<li class="feed-line" data-icon="false" style="border:none;">
			<?php echo($allusers['f_name']); ?> <?php echo($allusers['l_name']);?>
			<p class="ui-li-aside"> <?php
			
			if(!in_array($allusers['u_ID'], $myfriends)){ ?>
				Add friend! 
				<?php }
				else{ ?>
			Already a friend.<?php				
				} ?>
				</p></li>
				<?php
			
			}
			
				
				?>
		
				
			
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          
          

            <!-- 
<?php
            
        
        
            while($checkList = mysqli_fetch_array($resultNew, MYSQLI_ASSOC)) {
            $datetimeall = getdate($checkList['timestamp']);
            
            ?>

            <!~~ <li style="background-color:#e03838; border:none;">Wednesday, January 2, 2014 <span class="ui-li-count">3</span></li> ~~>
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
              ?> <br>
			  <?php // edit by Yong - print comment only if it exists.
			  if ($checkList['comment'] != "") {
				echo("\"");
				echo($checkList['comment']);
				echo("\"");
			  } ?></p>
              <p class="ui-li-aside"> 
              <?php echo($datetimeall['hours']);?>:<?php echo($datetimeall['minutes']);?>  <?php echo($checkList['timestamp']);?></p>
            </li>

            <li class="feed-line" data-icon="false" style="border:none;">
            <?php
            }
            ?>
 -->
            	
              
</body>
</html>