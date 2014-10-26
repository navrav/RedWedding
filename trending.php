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
<title>AEB Space - Trending</title>
<link rel="icon" href="/icons/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="css/jquery.mobile-1.4.2.css">
<link rel="stylesheet" href="css/jquery.mobile-core.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css" type="text/css">

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="js/jquery.mobile-1.4.2.js"></script>

<script>

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
    $('tbody tr td:nth-child(3)').each(function(index) {
        var scale = [['vPoor', -4], ['poor', -1], ['below', -0.5], ['avg', 0], ['okay', 0.5], ['good', 1], ['vGood', 4]];
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
    background-color: #FF3300;
}

.poor {
    background-color: #FFFF00;
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
padding: 0 0 0 0;
border-spacing: 0;
font-family: "HelveticaNeueUltraLight", "HelveticaNeue-Ultra-Light", "Helvetica Neue Ultra Light", "HelveticaNeue", "Helvetica Neue", 'TeXGyreHerosRegular', "Arial", sans-serif;
				
}

.searchbar{
font-family: "HelveticaNeueUltraLight", "HelveticaNeue-Ultra-Light", "Helvetica Neue Ultra Light", "HelveticaNeue", "Helvetica Neue", 'TeXGyreHerosRegular', "Arial", sans-serif;
				
}

p.trending{
font-size:120%;
color: black;
font-family: "HelveticaNeueUltraLight", "HelveticaNeue-Ultra-Light", "Helvetica Neue Ultra Light", "HelveticaNeue", "Helvetica Neue", 'TeXGyreHerosRegular', "Arial", sans-serif;
				
}

#roomNo, #checkins, #rating{

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
		<div data-role="header" id="header_blue">
			<?php require("topbanner.php"); ?>
		</div>
		<!--end top bar-->
  
  
		<!--nav bar-->

   	 	<?php require("menu.php"); ?>
	
		<!--end nav bar-->
    
  
  <!-- the feed, i dont know, working on it. adee -->
   <section data-role="main" class="ui-content" style="padding-bottom:0px;">
   <div class="ui-content" style="display:block; padding-top:0px;" >
     
<!--          <input type="search" name="search" id="search-basic" class="searchbar" value="" placeholder="Filter Rooms..." data-theme="white"/> -->
         <input type="text" id="search-basic" placeholder="Filter rooms..."> 
        <br>
 
		<p class="trending"> Trending Rooms in the Last 2 Weeks </p>
		
<!-- 		<div id="tempRooms" class="cssAdminTab"> -->
		<!-- <input type="text" id="search" placeholder="Type to search"> -->

    
    <table class="table" id="trendTab">
		<col id="roomNo" />
        <col id="checkins" />
        <col id="rating" />
        <thead>
        
            <th data-field="id" data-align="right" data-sortable="true">Room</th>
            <th data-field="name" data-align="center" data-sortable="true">#Checkins</th>
            <th data-field="price" data-sortable="true">Rating</th>
        
    </thead>
    <tbody>
		<?php 
		$result = mysqli_query($dbconn, "SELECT * FROM `RoomTrends` WHERE `numberCheckins` > 0 ORDER BY `trendRating` DESC LIMIT 10");
		while ($row = mysqli_fetch_array($result)){
		$trendScore = $row['trendRating'];
		$negCheck = substr($trendscore,0,1);
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
        //echo("<script>console.log('Type ".gettype($row['trendRating']."');</script>");
        ?> </td>
        
        </tr>
        <?php } ?>
        </tbody>
</table>


<!--         </div> -->

 
    </div>
		</section>
		
		
    
  
  
    </div> 

</body>
</html>