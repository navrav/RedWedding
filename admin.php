<!DOCTYPE html>

<?php

  session_start();
  include_once("servercon.php");

  if (!isset($_SESSION['username']))
  {
      header("location:index.php");
  }

	$user = $_SESSION["username"]; 
	// Resets session variables on each reload
	$_SESSION["room"] = "";
	$_SESSION["temp"]= "";
	$_SESSION["brightness"]= "";
	$_SESSION["use"]= "";
	$_SESSION["noise"]= "";
	$_SESSION["humid"]= "";

?>

<html>

/***************************************************************************
	*	
	*	ADMIN.PHP - Extracts data from the 'Views' created in the database based
	* 				on the user check-ins and surveys, that are combined to produce
	*               a trend-rating for each information category
	*
	*	Functionality:
	*		- Establishes connection to the database
	*		- Grabs data from the database
	*		- Updates the information displayed on the page based on administrator input 
	*		  through means of search bars and select menus
	*		- Retrieves the list of check-ins by users relevant to the room being analysed
	*		  by the administrator. All information is altered so that the data remains
	*         anonymous
	*/          

<head>
<title>AEB Space - Administrator</title>
<link rel="icon" href="/icons/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="css/jquery.mobile-1.4.2.css">
<link rel="stylesheet" href="css/jquery.mobile-core.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css" type="text/css">
<link rel="stylesheet" href="css/admin.css" type="text/css">

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="js/jquery.mobile-1.4.2.js"></script>

<script>
/**
Function is responsible for displaying the right 'select' menu to allow the 
administrator to select which tag they would like to view information for

Parameters:
@ cat - string representing the tag (information), selected by the administrator
**/
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


/**
Function is responsible for displaying the right 'select' menu to allow the 
administrator to select which room they would like to view checkins for

Parameters:
@ cat - string representing the building level, selected by the user
**/
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

/**
Function is responsible for filtering the results displayed in the results table
for a particular feedback area, based on the search term input by the administrator
**/
$(function() {
    // Ignores the first row which contains the headers as these are to be displayed
    // at all times
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

/**
Function is responsible for filtering the results displayed in the results table
for Lighting, based on the user inputted search term
**/
$(function() {
    // Ignores the first row which contains the headers as these are to be displayed
    // at all times
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

/**
Function is responsible for filtering the results displayed in the results table
for Usage Level, based on the user inputted search term
**/
$(function() {
    // Ignores the first row which contains the headers as these are to be displayed
    // at all times
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

/**
Function is responsible for filtering the results displayed in the results table
for Noise, based on the user inputted search term
**/
$(function() {
    // Ignores the first row which contains the headers as these are to be displayed
    // at all times
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

/**
Function is responsible for filtering the results displayed in the results table
for Humidity, based on the user inputted search term
**/
$(function() {
    // Ignores the first row which contains the headers as these are to be displayed
    // at all times
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

/**
Function is responsible for formatting the colour of the cells in the trending table
based on the value of the rating for each room.
Colours are assigned based on default categories and can be adjusted/added to in order
to provide more detailed information for users
**/
$(function() {
    // Ignores the first two columns and only colours the third column that contains the 
    // ratings for each category
    $('tbody tr td:nth-child(3)').each(function(index) {
        // Applies a class to each cell according to the value contained in the cell
        var scale = [['vPoor', -1.0], ['poor', -0.2], ['below', -0.1], ['avg', 0], ['okay', 0.1], ['good', 0.2], ['vGood', 1.0]];
        var score = $(this).text();
        for (var i = 0; i < scale.length; i++) {
            if (score <= scale[i][1]) {
                $(this).addClass(scale[i][0]);
            }
        }
    });
});

/**
Function is responsible for formatting the colour of the cells in the trending table
based on the value of the rating for each room.
Colours are assigned based on default categories and can be adjusted/added to in order
to provide more detailed information for users
**/
$(function() {
    $('#tableSearch tr td:nth-child(3)').each(function(index) {
        // Applies a class to each cell according to the value contained in the cell
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
/**
 Function is called when an administrator clicks the search button to search
 for information about a room. The function is only called if the form
 is posted
**/
 if (isset($_POST['search'])){
        // Assigns default values in case a rating is not found for the variable - this 
        // will be displayed in the visualisation table
	   $room = $_POST['search'];
	   $temperature='-';
	   $brightness='-';
	   $usagetag='-';
	   $noisetag='-';
	   $humid='-';
	   echo("<script>console.log('Search for room...".$room."');</script>");
	   //$checkins = mysqli_query($dbconn, "SELECT `room`, COUNT(*) FROM `CheckIn` WHERE `room`=$room AND `timestamp` < NOW() - INTERVAL 2 WEEK GROUP BY `room`");
       $temp = mysqli_query($dbconn, "SELECT * FROM `Tag1Rating` WHERE `room`=$room");
       // Loop to select the temperature rating for the searched room from all of the data
       // for that room
       while ($rowroom = mysqli_fetch_array($temp)){
 		    $temperature = $rowroom['TagScore'];
         }
       
       $bright = mysqli_query($dbconn, "SELECT * FROM `Tag2Rating` WHERE `room`=$room");
       // Loop to select the brightness rating for the searched room from all of the data
       // for that room
       while ($rowroom = mysqli_fetch_array($bright)){
 		    $brightness = $rowroom['TagScore'];
         }
       
       $usage = mysqli_query($dbconn, "SELECT * FROM `Tag3Rating` WHERE `room`=$room");
       // Loop to select the usage rating for the searched room from all of the data
       // for that room
       while ($rowroom = mysqli_fetch_array($usage)){
 		    $usagetag = $rowroom['TagScore'];
         }
       
       $noise = mysqli_query($dbconn, "SELECT * FROM `Tag4Rating` WHERE `room`=$room");
       // Loop to select the noise rating for the searched room from all of the data
       // for that room
       while ($rowroom = mysqli_fetch_array($noise)){
 		    $noisetag = $rowroom['TagScore'];
         }
         
       $humidity = mysqli_query($dbconn, "SELECT * FROM `Tag5Rating` WHERE `room`=$room");
       // Loop to select the humidity rating for the searched room from all of the data
       // for that room
       while ($rowroom = mysqli_fetch_array($humidity)){
 		    $humid = $rowroom['TagScore'];
         }
    
    // Assigns the data extracted from the database to session values to be displayed in
    // a table
    $_SESSION["room"] = $room;
	$_SESSION["temp"]= $temperature;
	$_SESSION["brightness"]= $brightness;
	$_SESSION["use"]= $usagetag;
	$_SESSION["noise"]= $noisetag;
	$_SESSION["humid"]= $humid;
	
    echo("<script type='text/javascript'>window.location.reload()</script>");  
         }
                ?>
  	
  <section data-role="main" class="ui-content" style="padding-bottom:0px;">
		<p class="admin"> Search for a Room </p>
		<form id="searchRoom" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		 <input type="text" class="roomsearchbar" name='search' placeholder="Search Rooms..." data-theme="white" id="roomsearchbar"></input>
		 <button type="submit" class="searchbutton" style="background-color:grey" style="display:inline">Search</button>
        </form>
<div id="searchResults">
<div id="searchedRoom" style="color:black">Room No: <?php echo $_SESSION['room'] ?></div>
<div class="table-responsive">
  <table class="table" id="tableSearch">
    <thead>
<!--         <th>#Checkins</th> -->
        <th>Temp.</th>
        <th>Light</th>
        <th>Usage</th>
        <th>Noise</th>
        <th>Humidity</th>
    </thead>
    <tbody>
        <tr>
<!--             <td id="c1"> - </td> -->
<!-- Echo the data extracted from the database to the table to display the information, 
trimming the length of the value to a maximum of 5 characters -->
            <td id="c2"> <?php echo substr($_SESSION['temp'],0,5) ?></td>
            <td id="c3"> <?php echo substr($_SESSION['brightness'],0,5); ?> </td>
            <td id="c4"> <?php echo substr($_SESSION['use'],0,5) ?> </td>
            <td id="c5"> <?php echo substr($_SESSION['noise'],0,5) ?> </td>
            <td id="c6"> <?php echo substr($_SESSION['humid'],0,5) ?> </td>
        </tr>
    </tbody>
  </table>
</div>
</div>

</section>

   <section data-role="main" class="ui-content" style="padding-bottom:0px;">
		 
		<p class="admin">Select a category to view trouble rooms:</p>
		
		<select name="feed" onchange="setOptions(this.options[this.selectedIndex].value);">
			<option value="1">Temperature</option>
			<option value="2">Brightness</option>
			<option value="3">Usage Level</option>
			<option value="4">Noise</option>
			<option value="5">Humidity</option>

			
		</select>
		<!-- This section should be upgraded to create the individual tables dynamically
        based on the selection made in the select menu above   -->
		<br>
		<input type="text" name="search" id="search-basic" class="searchbar" value="" placeholder="Filter Rooms..." data-theme="white"/>
		<br>
		<div id="tag1">
		
		<table class="table" id="trendTab">
    <thead>
        <tr>
            <th data-field="id" data-align="right" data-sortable="true">Room</th>
            <th data-field="name" data-align="center" data-sortable="true">Recent Bad Score</th>
            <th data-field="rating" data-sortable="true">Rating</th>
        </tr>
    </thead>
    <tbody>
        
		<?php 
		$result = mysqli_query($dbconn, "SELECT * FROM `Tag1Rating` ORDER BY `TagScore` ASC");
		// Loop to select the tag rating for the searched room from all of the data
        // for that room
		while ($row = mysqli_fetch_array($result)){
		$tagScore = $row['TagScore'];
		$neg = substr($tagScore,0,1);
		// Checks to see if the rating is negative and adjusts the length of the string
		// for clarity
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
		// Loop to select the tag rating for the searched room from all of the data
        // for that room
		while ($row = mysqli_fetch_array($result)){
		$tagScore = $row['TagScore'];
		$neg = substr($tagScore,0,1);
		// Checks to see if the rating is negative and adjusts the length of the string
		// for clarity
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
		// Loop to select the tag rating for the searched room from all of the data
        // for that room
		while ($row = mysqli_fetch_array($result)){
		$tagScore = $row['TagScore'];
		$neg = substr($tagScore,0,1);
		// Checks to see if the rating is negative and adjusts the length of the string
		// for clarity
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
		// Loop to select the tag rating for the searched room from all of the data
        // for that room
		while ($row = mysqli_fetch_array($result)){
		$tagScore = $row['TagScore'];
		$neg = substr($tagScore,0,1);
		// Checks to see if the rating is negative and adjusts the length of the string
		// for clarity
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
		// Loop to select the tag rating for the searched room from all of the data
        // for that room
		while ($row = mysqli_fetch_array($result)){
		$tagScore = $row['TagScore'];
		$neg = substr($tagScore,0,1);
		// Checks to see if the rating is negative and adjusts the length of the string
		// for clarity
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
		
		<?php
		$roomsa = [];
		// Checks to see if the 'select' box has been posted and retrieves the value
		// if it has and assigns it to a session variable for use later
        if (isset($_POST['level1sel'])){
	        $room = $_POST['level1sel'];
	        $_SESSION["roomcheckin"]=$room;
	        // Finds all check-in records for a particular room from the last 2 weeks
	        $checks = mysqli_query($dbconn, "SELECT * FROM `CheckIn` WHERE `chk_ID`=$room AND datetime < NOW() - INTERVAL 2 WEEK");
	    }
	   ?>

		
		<section data-role="main" class="ui-content" style="padding-bottom:0px;">
		<br>
		<p class="admin"> Recent Checkins </p>
		<br>
    <!-- Creates a select menu for the administrator to pick which level they want to 
            view information about		 -->
		<font color="black">Filter recent check-ins:</font>
		<select name="lev" onchange="setLevel(this.options[this.selectedIndex].value);">
			<option value="1" id="1" name="1">Level 1</option>
			<option value="2" id="2" name="2">Level 2</option>
			<option value="3" id="3" name="3">Level 3</option>
			<option value="4" id="4" name="4">Level 4</option>
			<option value="5" id="5" name="5">Level 5</option>
		</select>
		
<!-- This		 -->
		<div id="level1">
		<form id="selectRoom" name="selectRoom" method="POST"  action="">
		<select name="level1sel" id="level1sel" onchange="this.form.submit()">
		<option value="default" >Select a room...</option>
		<?php 
		// Extracts the list of rooms for the selected level and creates a select box with
		// each room as an option
		$rooms = mysqli_query($dbconn, "SELECT * FROM `Rooms` WHERE `level`=1");
				while ($roomRows = mysqli_fetch_array($rooms)){
			?>
			<option id="<?php echo $roomRows['room'] ?>" name="roomNo" value="<?php echo $roomRows['room'] ?>"> <?php echo $roomRows['room'] ?></option>
			<?php } ?>
		</select>
		</form>
		</div>
		
		
		
		<div id="level2" style="display:none">
		<form id="selectRoom2" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<select name="lev2room" onchange="this.form.submit()">
		<option value="default" >Select a room...</option>
		<?php 
		// Extracts the list of rooms for the selected level and creates a select box with
		// each room as an option
		$rooms = mysqli_query($dbconn, "SELECT * FROM `Rooms` WHERE `level`=2");
				while ($roomRows = mysqli_fetch_array($rooms)){
			?>
			<option id="<?php echo $roomRows['room'] ?>" name="roomNo" value="<?php echo $roomRows['room'] ?>"><?php echo $roomRows['room'] ?> </option>
			<?php } ?>
		</select>
		</form>
		</div>
		
		<div id="level3" style="display:none">
		<form id="selectRoom3" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<select name="lev3room" onchange="this.form.submit()">
		<option value="default" >Select a room...</option>
		<?php 
		// Extracts the list of rooms for the selected level and creates a select box with
		// each room as an option
		$rooms = mysqli_query($dbconn, "SELECT * FROM `Rooms` WHERE `level`=3");
				while ($roomRows = mysqli_fetch_array($rooms)){
			?>
			<option id="<?php echo $roomRows['room'] ?>" name="roomNo" value="<?php echo $roomRows['room'] ?>"><?php echo $roomRows['room'] ?> </option>
			<?php } ?>
		</select>
		</form>
		</div>
		
		<div id="level4" style="display:none">
		<form id="selectRoom4" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<select name="lev4room" onchange="this.form.submit()">
		<option value="default" >Select a room...</option>
		<?php 
		// Extracts the list of rooms for the selected level and creates a select box with
		// each room as an option
		$rooms = mysqli_query($dbconn, "SELECT * FROM `Rooms` WHERE `level`=4");
				while ($roomRows = mysqli_fetch_array($rooms)){
			?>
			<option id="<?php echo $roomRows['room'] ?>" name="roomNo" value="<?php echo $roomRows['room'] ?>"><?php echo $roomRows['room'] ?> </option>
			<?php } ?>
		</select>
		</form>
		</div>
		
		
		<div id="level5" style="display:none">
		<form id="selectRoom5" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>"> -->
		<select name="lev5room" onchange="this.form.submit()">
		<option value="default" >Select a room...</option>
		<?php 
		// Extracts the list of rooms for the selected level and creates a select box with
		// each room as an option
		$rooms = mysqli_query($dbconn, "SELECT * FROM `Rooms` WHERE `level`=5");
				while ($roomRows = mysqli_fetch_array($rooms)){
			?>
			<option id="<?php echo $roomRows['room'] ?>" name="roomNo" value="<?php echo $roomRows['room'] ?>"><?php echo $roomRows['room'] ?> </option>
			<?php } ?>
		</select>
		</form>
		</div>
		
		</section>
    
    <!-- feed end-->


        <div data-role="main" class="ui-content" id="feed" style="display:block; padding-top:0px;" >
        
          <ul data-role="listview" data-inset="true">

            <?php
            // Selects all of the data from the database that is required for the news feed
            // Users names are changed to 'Anonymous User' in order to protect their 
            // identity
            $resultNew = mysqli_query($dbconn, "SELECT `timestamp`, `room`, `tag1`, `tag2`, `tag3`, `tag4`, `withFriend`, `comment`, `f_name`, `l_name`, `pic`, `rank` FROM CheckIn, Users WHERE CheckIn.chk_ID = $room  ORDER BY `CheckIn`.`timestamp` DESC");
               
            while($checkList = mysqli_fetch_array($resultNew, MYSQLI_ASSOC)) {
            $datetimenew = date_create($checkList['timestamp']);
            $alltags = [$checkList['tag1'], $checkList['tag2'], $checkList['tag3'], $checkList['tag4']];
            $allrealtags = array();
            
            foreach($alltags as $tag){
            	if ($tag){
            		array_push($allrealtags, $tag);
            	}
            }
            
            $ntags = count($allrealtags);
            
            
            ?>

           <li style="background-color:#e03838; border:none;"> <?php echo date_format($datetimenew, 'l jS F Y');?> <span class="ui-li-count"><?php echo date_format($datetimenew, 'h:i a');?></span></li>
        <!-- Code is responsible for creating a list element for each check-in recorded
        for a room by a user. Data is extracted from the query and then displayed on 
        the page              -->
            <li class="feed-line" data-icon="false" style="border:none;">
            	<h2>
            	<span>
            	<img src="avatars/<?php echo($checkList['pic']);?>" width="40px" height="40px" class="img-circle"/>  
            	</span>
            	<?php $anon = "Anonymous User"; ?> 
              <?php echo $anon; ?></h2>
              <p><?php echo($anon);
              if ($ntags > 0){
              ?> felt <?php 
              }
              
              
              $i = 1;
              
              // Prints out each of the tags submitted by a user in each check-in
              // with a series of catches designed to join the tags in a sentence
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
              
              ?> <br>
			  <?php // edit by Yong - print comment only if it exists.
			  if ($checkList['comment'] != "") {
				echo("\"");
				echo($checkList['comment']);
				echo("\"");
			  } ?></p>
              <p class="ui-li-aside"><?php echo($checkList['timestamp']);?></p>-->
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