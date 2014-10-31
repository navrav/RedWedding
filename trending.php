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

/***************************************************************************
	*	
	*	TRENDING.PHP - Extracts data from the 'Views' created in the database based
	* 				on the user check-ins and surveys, that are combined to produce
	*               a trend-rating for each room in the AEB that can be searched by
	*               users
	* 				
	*	Functionality:
	*		- Establishes connection to the database
	*		- Grabs data from the database
	*		- Updates the information displayed on the page based on user input 
	*		  through means of search bars and select menus
	*		
	*/          

<head>
<title>AEB Space - Trending</title>
<link rel="icon" href="/icons/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="css/jquery.mobile-1.4.2.css">
<link rel="stylesheet" href="css/jquery.mobile-core.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css" type="text/css">
<link rel="stylesheet" href="css/trending.css" type="text/css">

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="js/jquery.mobile-1.4.2.js"></script>

<script>
/**
Function is responsible for filtering the results displayed in the trending table
based on the user inputted search term
**/
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

/**
Function is responsible for formatting the colour of the cells in the trending table
based on the value of the rating for each room.
Colours are assigned based on default categories and can be adjusted/added to in order
to provide more detailed information for users
**/
$(function() {
    $('tbody tr td:nth-child(3)').each(function(index) {
        var scale = [['vPoor', -4], ['poor', -2], ['below', -0.5], ['avg', 0], ['okay', 0.5], ['good', 2], ['vGood', 4]];
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

</style>

</head>

<body>
    <!--start top bar-->
	<div data-role="page" data-theme="b" style="background-color:white;">
		<div data-role="header" id="header_blue">
			<?php require("topbanner.php"); ?>
		</div>
		<!--end top bar-->
  
  
		<!--nav bar-->

   	 	<?php require("menu.php"); ?>
	
		<!--end nav bar-->
    
   <section data-role="main" class="ui-content" style="padding-bottom:0px;">
   <div class="ui-content" style="display:block; padding-top:0px;" >
     
         <input type="text" id="search-basic" placeholder="Filter rooms..."> 
        <br>
 
		<p class="trending"> Trending Rooms in the Last 2 Weeks </p>
		
    <table class="table" id="trendTab">
		<col id="roomNo" />
        <col id="checkins" />
        <col id="rating" />
        <thead>
        
            <th data-field="id" data-align="right" data-sortable="true">Room</th>
            <th data-field="name" data-align="center" data-sortable="true">#Checkins</th>
            <th data-field="rating" data-sortable="true">Rating</th>
        
    </thead>
    <tbody>
		<?php 
		// Query to select ten rooms with the highest trend rating
		$result = mysqli_query($dbconn, "SELECT * FROM `RoomTrends` WHERE `numberCheckins` > 0 ORDER BY `trendRating` DESC LIMIT 10");
		// Loop through an array of the query results and print them to a html table
		while ($row = mysqli_fetch_array($result)){
		$trendScore = $row['trendRating'];
		$negCheck = substr($trendscore,0,1);
		// Checks to see whether the trend rating is negative and if not, it adds
		// a '+' to the front of the value for clarity
		if ($negCheck == "-"){
		    $trend = $trendScore;
		    }else{
		    $trend = "+".$trendScore;
		    }
		?> 
		
        <tr>
        <td><?php echo $row['room'] ?> </td>
        <td><?php echo $row['numberCheckins'] ?> </td> 
        <td><?php echo $trend
        ?> </td>
        </tr>
        
        <?php } ?>
        </tbody>
</table>
    </div>
    
		</section>

    </div> 

</body>
</html>