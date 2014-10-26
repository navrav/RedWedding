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

  
?>

<html>

<head>
<title>AEB Space - Administrator</title>
<link rel="icon" href="/icons/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="css/jquery.mobile-1.4.2.css">
<link rel="stylesheet" href="css/jquery.mobile-core.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css" type="text/css">

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="js/jquery.mobile-1.4.2.js"></script>

<script>
function setOptions(cat){
		
			console.log(cat);

			if (cat == "1") {
				document.getElementById('tag1').style.display= 'block' ;
				document.getElementById('tag2').style.display= 'none' ;
				document.getElementById('tag3').style.display= 'none' ;
				document.getElementById('tag4').style.display= 'none' ;
				document.getElementById('tag5').style.display= 'none' ;
			}else if (cat == "2") {
				document.getElementById('tag1').style.display= 'none' ;
				document.getElementById('tag2').style.display= 'block' ;
				document.getElementById('tag3').style.display= 'none' ;
				document.getElementById('tag4').style.display= 'none' ;
				document.getElementById('tag5').style.display= 'none' ;
			}else if (cat == "3"){
			    document.getElementById('tag1').style.display= 'none' ;
				document.getElementById('tag2').style.display= 'none' ;
				document.getElementById('tag3').style.display= 'block' ;
				document.getElementById('tag4').style.display= 'none' ;
				document.getElementById('tag5').style.display= 'none' ;
			}else if (cat == "4"){
			    document.getElementById('tag1').style.display= 'none' ;
				document.getElementById('tag2').style.display= 'none' ;
				document.getElementById('tag3').style.display= 'none' ;
				document.getElementById('tag4').style.display= 'block' ;
				document.getElementById('tag5').style.display= 'none' ;
			}else if (cat == "5"){
			    document.getElementById('tag1').style.display= 'none' ;
				document.getElementById('tag2').style.display= 'none' ;
				document.getElementById('tag3').style.display= 'none' ;
				document.getElementById('tag4').style.display= 'none' ;
				document.getElementById('tag5').style.display= 'block' ;
			}
}

function setLevel(cat){
		
			console.log(cat);

			if (cat == "1") {
				document.getElementById('level1').style.display= 'block' ;
				document.getElementById('level2').style.display= 'none' ;
				document.getElementById('level3').style.display= 'none' ;
				document.getElementById('level4').style.display= 'none' ;
				document.getElementById('level5').style.display= 'none' ;
			}else if (cat == "2") {
				document.getElementById('level1').style.display= 'none' ;
				document.getElementById('level2').style.display= 'block' ;
				document.getElementById('level3').style.display= 'none' ;
				document.getElementById('level4').style.display= 'none' ;
				document.getElementById('level5').style.display= 'none' ;
			}else if (cat == "3"){
			    document.getElementById('level1').style.display= 'none' ;
				document.getElementById('level2').style.display= 'none' ;
				document.getElementById('level3').style.display= 'block' ;
				document.getElementById('level4').style.display= 'none' ;
				document.getElementById('level5').style.display= 'none' ;
			}else if (cat == "4"){
			    document.getElementById('level1').style.display= 'none' ;
				document.getElementById('level2').style.display= 'none' ;
				document.getElementById('level3').style.display= 'none' ;
				document.getElementById('level4').style.display= 'block' ;
				document.getElementById('level5').style.display= 'none' ;
			}else if (cat == "5"){
			    document.getElementById('level1').style.display= 'none' ;
				document.getElementById('level2').style.display= 'none' ;
				document.getElementById('level3').style.display= 'none' ;
				document.getElementById('level4').style.display= 'none' ;
				document.getElementById('level5').style.display= 'block' ;
			}
			}


$(function() {
    var $rows = $('#trendTab tr:not(":first")');
    $('#search-basic').keyup(function() {
    console.log('Made it here...');
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
    });
    });

$(function() {
    var $rows = $('#trendTab2 tr:not(":first")');
    $('#search-basic').keyup(function() {
    console.log('Made it here...');
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
    });
    });

$(function() {
    var $rows = $('#trendTab3 tr:not(":first")');
    $('#search-basic').keyup(function() {
    console.log('Made it here...');
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
    });
    });

$(function() {
    var $rows = $('#trendTab4 tr:not(":first")');
    $('#search-basic').keyup(function() {
    console.log('Made it here...');
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
    });
    });

$(function() {
    var $rows = $('#trendTab5 tr:not(":first")');
    $('#search-basic').keyup(function() {
    console.log('Made it here...');
    var val = $.trim($(this).val()).replace(/ +/g, ' ').toLowerCase();
    
    $rows.show().filter(function() {
        var text = $(this).text().replace(/\s+/g, ' ').toLowerCase();
        return !~text.indexOf(val);
    }).hide();
    });
    });

$(function() {
    $('tbody tr td:nth-child(3)').each(function(index) {
        var scale = [['vPoor', -1.0], ['poor', -0.2], ['below', -0.1], ['avg', 0], ['okay', 0.1], ['good', 0.2], ['vGood', 1.0]];
        var score = $(this).text();
        for (var i = 0; i < scale.length; i++) {
            if (score <= scale[i][1]) {
                $(this).addClass(scale[i][0]);
            }
        }
    });
});



</script>

<style>
.vGood {
    background-color: #0000FF;
}

.good {
    background-color: #0099FF;
}

.okay {
    background-color: #009999;
}

.avg {
    background-color: #00CC00;
}

.below {
    background-color: #FFFF00;
}

.poor {
    
    background-color: #FF3300;
}

.vPoor {
    background-color: #FF0000;
}

th:nth-child(even),
td:nth-child(even) {
    text-align: center;
    color: black;
}

th:nth-child(odd),
td:nth-child(odd) {
    text-align: center;
    color: black;
}

.cssAdminTab{
color:black;
}

.searchbar{
font-family: "HelveticaNeueUltraLight", "HelveticaNeue-Ultra-Light", "Helvetica Neue Ultra Light", "HelveticaNeue", "Helvetica Neue", 'TeXGyreHerosRegular', "Arial", sans-serif;				
display:inline;
width:60%;
}

.searchbutton{
display:inline;
width:30%;
}

p.admin{
font-size:120%;
color: black;
font-family: "HelveticaNeueUltraLight", "HelveticaNeue-Ultra-Light", "Helvetica Neue Ultra Light", "HelveticaNeue", "Helvetica Neue", 'TeXGyreHerosRegular', "Arial", sans-serif;
}

.searchtable{
			
}

</style>

<script>
    function priceSorter(a, b) {
        a = +a.substring(1); // remove $
        b = +b.substring(1);
        if (a > b) return 1;
        if (a < b) return -1;
        return 0;
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

  	<?php
        if (isset($_POST['search'])){
	   $room = $_POST['search'];
	   echo("<script>console.log('Search for room...".$room."');</script>");
	   $rooms = mysqli_query($dbconn, "SELECT * FROM `Tag1Rating` WHERE `room`=$room");
	   }
	   ?>
	   
  <section data-role="main" class="ui-content" style="padding-bottom:0px;">
		<p class="admin"> Search for a Room </p>
		 <input type="text" placeholder="Search Rooms..." data-theme="white" id="roomsearchbar"></input>
		 <button type="submit" class="searchbutton" style="background-color:grey" style="display:inline" onclick="searchRoom()">Search</button>
<div id="searchResults">
<div id="searchedRoom" style="color:black">Test Room</div>
<div class="table-responsive">
  <table class="table">
    <thead>
        <th>#Checkins</th>
        <th>Temp.</th>
        <th>Light</th>
        <th>Usage</th>
        <th>Noise</th>
        <th>Humidity</th>
    </thead>
    <tbody>
        <tr>
            <td> 1 </td>
            <td> 1 </td>
            <td> 1 </td>
            <td> 1 </td>
            <td> 1 </td>
            <td> 1 </td>
        </tr>
    </tbody>
  </table>
</div>
</div>
</section>

<script>
    function searchRoom(){
    console.log('clicked');
        var room = document.getElementById('roomsearchbar').value;
        console.log(room);
        $.ajax({
            url: "roomsearch.php",
            type: "POST",
            data: {"room": room},
            success: function(data){
            console.log('clicked');
      }
  });
//   window.location="http://deco3801-01.uqcloud.net/friends100.php";
  }
    </script>
    
  <br>
  
  <!-- the feed, i dont know, working on it. adee -->
   <section data-role="main" class="ui-content" style="padding-bottom:0px;">
		 
		<p class="admin">Select a category to view trouble rooms:</p>
		
		<select name="feed" onchange="setOptions(this.options[this.selectedIndex].value);">
			<option value="1">Temperature</option>
			<option value="2">Brightness</option>
			<option value="3">Usage Level</option>
			<option value="4">Noise</option>
			<option value="5">Humidity</option>

			
		</select>
		
		<br>
		<input type="text" name="search" id="search-basic" class="searchbar" value="" placeholder="Filter Rooms..." data-theme="white"/>
		<br>
		<div id="tag1">
		
		<table class="table" id="trendTab">
    <thead>
        <tr>
            <th data-field="id" data-align="right" data-sortable="true">Room</th>
            <th data-field="name" data-align="center" data-sortable="true">Recent Bad Score</th>
            <th data-field="price" data-sortable="true">Rating</th>
        </tr>
    </thead>
    <tbody>
        
		<?php 
		$result = mysqli_query($dbconn, "SELECT * FROM `Tag1Rating` ORDER BY `TagScore` ASC");
		while ($row = mysqli_fetch_array($result)){
		$tagScore = $row['TagScore'];
		$neg = substr($tagScore,0,1);
		if ($neg == "-"){
		    $subScore = substr($tagScore,0,5);
		    }else{
		    $subScore = substr($tagScore,0,4);
		    }
		?> 
		
        <tr>
        <td><?php echo $row['room'] ?> </td>
        <td><?php echo $row['RecentBadCount'] ?> </td>
        <td><?php echo $subScore ?> </td> 
        </tr>
        <?php } ?>
        </tbody>
</table>

        </div>
        
        <div id="tag2" style="display:none">
		
		<table class="table" id="trendTab2">
    <thead>
        <tr>
            <th data-field="id" data-align="right" data-sortable="true">Room</th>
            <th data-field="name" data-align="center" data-sortable="true">Recent Bad Score</th>
            <th data-field="price" data-sortable="true">Rating</th>
        </tr>
    </thead>
    <tbody>
        
		<?php 
		$result = mysqli_query($dbconn, "SELECT * FROM `Tag2Rating` ORDER BY `TagScore` ASC");
		while ($row = mysqli_fetch_array($result)){
		$tagScore = $row['TagScore'];
		$neg = substr($tagScore,0,1);
		if ($neg == "-"){
		    $subScore = substr($tagScore,0,5);
		    }else{
		    $subScore = substr($tagScore,0,4);
		    }
		?> 
		
        <tr>
        <td><?php echo $row['room'] ?> </td>
        <td><?php echo $row['RecentBadCount'] ?> </td>
        <td><?php echo $subScore ?> </td> 
        </tr>
        <?php } ?>
        </tbody>
</table>

        </div>
        
        <div id="tag3" style="display:none">
		
		<table class="table" id="trendTab3">
    <thead>
        <tr>
            <th data-field="id" data-align="right" data-sortable="true">Room</th>
            <th data-field="name" data-align="center" data-sortable="true">Recent Bad Score</th>
            <th data-field="price" data-sortable="true">Rating</th>
        </tr>
    </thead>
    <tbody>
        
		<?php 
		$result = mysqli_query($dbconn, "SELECT * FROM `Tag3Rating` ORDER BY `TagScore` ASC");
		while ($row = mysqli_fetch_array($result)){
		$tagScore = $row['TagScore'];
		$neg = substr($tagScore,0,1);
		if ($neg == "-"){
		    $subScore = substr($tagScore,0,5);
		    }else{
		    $subScore = substr($tagScore,0,4);
		    }
		?> 
		
        <tr>
        <td><?php echo $row['room'] ?> </td>
        <td><?php echo $row['RecentBadCount'] ?> </td>
        <td><?php echo $subScore ?> </td> 
        </tr>
        <?php } ?>
        </tbody>
</table>

        </div>
        
        <div id="tag4" style="display:none">
		
		<table class="table" id="trendTab4">
    <thead>
        <tr>
            <th data-field="id" data-align="right" data-sortable="true">Room</th>
            <th data-field="name" data-align="center" data-sortable="true">Recent Bad Score</th>
            <th data-field="price" data-sortable="true">Rating</th>
        </tr>
    </thead>
    <tbody>
        
		<?php 
		$result = mysqli_query($dbconn, "SELECT * FROM `Tag4Rating` ORDER BY `TagScore` ASC");
		while ($row = mysqli_fetch_array($result)){
		$tagScore = $row['TagScore'];
		$neg = substr($tagScore,0,1);
		if ($neg == "-"){
		    $subScore = substr($tagScore,0,5);
		    }else{
		    $subScore = substr($tagScore,0,4);
		    }
		?> 
		
        <tr>
        <td><?php echo $row['room'] ?> </td>
        <td><?php echo $row['RecentBadCount'] ?> </td>
        <td><?php echo $subScore ?> </td> 
        </tr>
        <?php } ?>
        </tbody>
</table>

        </div>
        
        <div id="tag5" style="display:none">
		
		<table class="table" id="trendTab5">
    <thead>
        <tr>
            <th data-field="id" data-align="right" data-sortable="true">Room</th>
            <th data-field="name" data-align="center" data-sortable="true">Recent Bad Score</th>
            <th data-field="price" data-sortable="true">Rating</th>
        </tr>
    </thead>
    <tbody>
        
		<?php 
		$result = mysqli_query($dbconn, "SELECT * FROM `Tag5Rating` ORDER BY `TagScore` ASC");
		while ($row = mysqli_fetch_array($result)){
		$tagScore = $row['TagScore'];
		$neg = substr($tagScore,0,1);
		if ($neg == "-"){
		    $subScore = substr($tagScore,0,5);
		    }else{
		    $subScore = substr($tagScore,0,4);
		    }
		
		?> 
		
        <tr>
        <td><?php echo $row['room'] ?> </td>
        <td><?php echo $row['RecentBadCount'] ?> </td>
        <td><?php echo $subScore ?> </td> 
        </tr>
        <?php } ?>
        </tbody>
</table>

        </div>

		</section>
		
		
		
		
		
	<!-- 
	<?php
        if (isset($_POST['roomNo'])){
	   $level = $_POST['roomNo'];
	   echo("<script>console.log('".$level."');</script>");
	   $rooms = mysqli_query($dbconn, "SELECT * FROM `Rooms` WHERE `level`=$level");
	   }
	   ?>
 -->
		
		<section data-role="main" class="ui-content" style="padding-bottom:0px;">
		<br>
		<p class="admin"> Recent Checkins </p>
		<br>
		<font color="black">Filter recent check-ins:</font>
<!-- 		<form id="selectLevel" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> -->
		<select name="lev" onchange="setLevel(this.options[this.selectedIndex].value);">
			<option value="1" id="1" name="1">Level 1</option>
			<option value="2" id="2" name="2">Level 2</option>
			<option value="3" id="3" name="3">Level 3</option>
			<option value="4" id="4" name="4">Level 4</option>
			<option value="5" id="5" name="5">Level 5</option>
			<!--<option value="2">Events</option>-->
		</select>
		</form>
		
		
		
		
	<!-- 
	<?php
		if(isset($_POST['level1sel']))
{
    $room = $_POST['level1sel'];
    echo("<script>console.log('Room: ".$room."');</script>");
}
		?>
 -->
		
		<div id="level1">
		<form id="selectRoom" method="POST" onchange="this.form.submit()"<!-- action="<?php echo $_SERVER['PHP_SELF']; ?> -->">
		<select name="level1sel" id="level1sel">
		<option value="default" >Select a room...</option>
		<?php 
		$rooms = mysqli_query($dbconn, "SELECT * FROM `Rooms` WHERE `level`=1");
				while ($roomRows = mysqli_fetch_array($rooms)){
				
			?>
			<option id="<?php echo $roomRows['room'] ?>" name="roomNo" value="<?php echo $roomRows['room'] ?>"> <?php echo $roomRows['room'] ?></option>
			<?php } ?>
			<!--<option value="2">Events</option>-->
		</select>
		</form>
		</div>
		
		<div id="level2" style="display:none">
<!-- 		<form id="selectRoom" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> -->
		<select name="lev2room">
		<option value="default" >Select a room...</option>
		<?php 
		$rooms = mysqli_query($dbconn, "SELECT * FROM `Rooms` WHERE `level`=2");
				while ($roomRows = mysqli_fetch_array($rooms)){
			?>
			<option id="<?php echo $roomRows['room'] ?>" name="roomNo" value="<?php echo $roomRows['room'] ?>"><?php echo $roomRows['room'] ?> </option>
			<?php } ?>
			<!--<option value="2">Events</option>-->
		</select>
<!-- 		</form> -->
		</div>
		
		<div id="level3" style="display:none">
<!-- 		<form id="selectRoom" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> -->
		<select name="lev3room">
		<option value="default" >Select a room...</option>
		<?php 
		$rooms = mysqli_query($dbconn, "SELECT * FROM `Rooms` WHERE `level`=3");
				while ($roomRows = mysqli_fetch_array($rooms)){
			?>
			<option id="<?php echo $roomRows['room'] ?>" name="roomNo" value="<?php echo $roomRows['room'] ?>"><?php echo $roomRows['room'] ?> </option>
			<?php } ?>
			<!--<option value="2">Events</option>-->
		</select>
<!-- 		</form> -->
		</div>
		
		<div id="level4" style="display:none">
<!-- 		<form id="selectRoom" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> -->
		<select name="lev4room">
		<option value="default" >Select a room...</option>
		<?php 
		$rooms = mysqli_query($dbconn, "SELECT * FROM `Rooms` WHERE `level`=4");
				while ($roomRows = mysqli_fetch_array($rooms)){
			?>
			<option id="<?php echo $roomRows['room'] ?>" name="roomNo" value="<?php echo $roomRows['room'] ?>"><?php echo $roomRows['room'] ?> </option>
			<?php } ?>
			<!--<option value="2">Events</option>-->
		</select>
<!-- 		</form> -->
		</div>
		
		<div id="level5" style="display:none">
<!-- 		<form id="selectRoom" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> -->
		<select name="lev5room">
		<option value="default" >Select a room...</option>
		<?php 
		$rooms = mysqli_query($dbconn, "SELECT * FROM `Rooms` WHERE `level`=5");
				while ($roomRows = mysqli_fetch_array($rooms)){
			?>
			<option id="<?php echo $roomRows['room'] ?>" name="roomNo" value="<?php echo $roomRows['room'] ?>"><?php echo $roomRows['room'] ?> </option>
			<?php } ?>
			<!--<option value="2">Events</option>-->
		</select>
<!-- 		</form> -->
		</div>
		
		</section>
    
    <!-- feed end-->


        <div data-role="main" class="ui-content" id="feed" style="display:block; padding-top:0px;" >
        
          <ul data-role="listview" data-inset="true">

            <?php
            $resultNew = mysqli_query($dbconn, "SELECT `timestamp`, `room`, `tag1`, `tag2`, `tag3`, `tag4`, `withFriend`, `comment`, `f_name`, `l_name`, `pic`, `rank` FROM CheckIn, Users WHERE CheckIn.chk_ID = $room  ORDER BY `CheckIn`.`timestamp` DESC");
            
                    
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