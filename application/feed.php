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

  $resultNew = mysqli_query($dbconn, "SELECT `timestamp`, `room`, `tag1`, `tag2`, `tag3`, `tag4`, `tag5`, `withFriend`, `comment`, `f_name`, `l_name`, `pic`, `rank` FROM CheckIn, Users WHERE CheckIn.u_ID = Users.u_ID AND CheckIn.u_ID IN (SELECT ID_2 FROM Friends WHERE ID_1 ='{$user}' OR CheckIn.u_ID = {$user}) ORDER BY `CheckIn`.`timestamp` DESC");
?>

<html>
/***************************************************************************
	*	
	*	FEED.PHP - Extracts data from the database and displays information
	*   about the user's and their friends check-ins. 
	*
	*	Functionality:
	*		- Establishes connection to the database
	*		- Grabs data from the database
	*		- Displays a list of recent check-ins from the user and people in their friend
	*         network
	*/
<head>
<title>AEB Space - Newsfeed</title>
<link rel="icon" href="/icons/favicon.ico">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="css/jquery.mobile-1.4.2.css">
<link rel="stylesheet" href="css/jquery.mobile-core.css">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
<link rel="stylesheet" href="css/main.css" type="text/css">

<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="js/jquery.mobile-1.4.2.js"></script>

<script>
/**
Function is responsible for selecting which information is to be displayed in the news feed.
The options are either recent check-ins (feed) or recent events (not currently available)

Parameters:
@ feed - string representing the type of information to be displayed in the news feed
**/
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
    
  
  <!-- the feed -->
   <section data-role="main" class="ui-content" style="padding-bottom:0px;">
		<select name="rno" onchange="setOptions(this.options[this.selectedIndex].value);">
			<option value="1">News Feed</option>
		</select>
		
    </section>
    <!-- feed end-->


        <div data-role="main" class="ui-content" id="feed" style="display:block; padding-top:0px;" >
        
          <ul data-role="listview" data-inset="true">
 
 
            <?php
            
            date_default_timezone_set('Australia/Brisbane');

           
            $setdate = null;
            
            ?>
            
             <?php
             // Creates an array of the information about recent check-ins from the user
             // and their friends. Array is iterated over to extract the relevant information
             // from each check-in, which is later inserted into HTML elements       
            while($checkList = mysqli_fetch_array($resultNew, MYSQLI_ASSOC)) {
            $userid = $checkList['withFriend'];
            // Selects information about friends who were tagged in the check-in
            $friendnameq = mysqli_query($dbconn, "SELECT `f_name`, `l_name` FROM Users WHERE `u_ID` = '{$userid}'");
             $friendnamea = mysqli_fetch_array($friendnameq, MYSQLI_ASSOC);
             // Creates a string of the timestamp that is associated with the check-in data
           $datetimenew = date_create($checkList['timestamp']);
           $newdate = date_format($datetimenew, 'l jS F Y');
           
           // Retrieves the list of tags that were included in the check-in and pushes them 
           // to an array that is later iterated over to insert into HTML elements
            $alltags = [$checkList['tag1'], $checkList['tag2'], $checkList['tag3'], $checkList['tag4']];
            $allrealtags = array();
            
            foreach($alltags as $tag){
            	if ($tag){
            		array_push($allrealtags, $tag);
            	}
            }
            
            $ntags = count($allrealtags);
            
            
            ?>

           <?php
           
           if ($setdate != $newdate){ ?>
           
            <li style="background-color:#e03838; border:none;"> <?php echo date_format($datetimenew, 'l jS F Y');?></li>
           
           <?php
           $setdate = $newdate;
           }
           else{
           
           }?>
           
           
           
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
              // Iterates over the array of tags associated with the check-in and prints
              // them to the page. A series of catches are used (based on the index of the tag 
              // in the array) in order to print the correct punctuation so that the tags can
              // be printed in a sentence structure (read coherently)
              foreach($allrealtags as $tag){
              	echo($tag);
            
                // Checks whether the current tag from the array is the last element of the array
              	if ($i == ($ntags-1)){
              		?> and <?php
              		}
              
                // Checks if the current tag is in the array and that it is not the last element
              	if (($i < $ntags) && ($i != ($ntags-1))){
              	?>, <?php
              	}
              	
              	$i = $i+1;
              }
              
              
              // Catch for if there are no tags associated with the checkin
              if ($ntags == 0){
              ?> was <?php
              }
              
              
              ?>
               at <?php echo($checkList['room']); // Prints the room number to the page
               // Checks to see if they tagged a friend or not. If they did the name of the
               // friend is printed to the page, otherwise this catch is ignored
              if ($checkList['withFriend']){ 
               ?> with <?php echo($friendnamea['f_name'] . " " . $friendnamea['l_name']);
              }
              ?> <br>
			  <?php // edit by Yong - print comment only if it exists.
			  if ($checkList['comment'] != "") {
				echo("\"");
				echo($checkList['comment']);
				echo("\"");
			  } ?></p>
              <p class="ui-li-aside"> </p>
              <span class="ui-li-count"><?php echo date_format($datetimenew, 'h:i a');?></span>

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