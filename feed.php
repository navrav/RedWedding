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
			<option value="2">Events</option>
		</select>
    </section>
    <!-- feed end-->

      <div data-role="main" class="ui-content" id="feed" style="display:block; padding-top:0px;" >
      
    
    <!-- the feed, i dont know, working on it. adee -->
     <section data-role="main" class="ui-content" style="padding-bottom:0px;">
  		<select name="rno" onchange="setOptions(this.options[this.selectedIndex].value);">
  			<option value="1">News Feed</option>
  			<option value="2">Events</option>
  		</select>
      </section>
      <!-- feed end-->

        <div data-role="main" class="ui-content" id="feed" style="display:block; padding-top:0px;" >
        
          <ul data-role="listview" data-inset="true">

            <li style="background-color:#e03838; border:none;">Wednesday, January 2, 2014 <span class="ui-li-count">3</span></li> 
           
            <li class="feed-line" data-icon="false" style="border:none;">
            	<h2>
            	<span>
            	<img src="Team/zoe.jpg" width="40px" height="40px" class="img-circle"/>  
            	</span> 
              Zoe Stewart</h2>
              <p>Zoe felt very hot at 370 </p>
              <p class="ui-li-aside">10:38 pm</p>
            </li>

            <li class="feed-line" data-icon="false" style="border:none;">
            	
            	
              <h2>
              <span>
            	<img src="Team/will.jpg" width="40px" height="40px" class="img-circle" style="border: 2px solid #26b89a;"/>  
            	</span> 
            	William Forsyth</h2>
              <p>William: Perfect study area; nice and quiet! in 101 </p>
              <p class="ui-li-aside">11:22 am</p>
            </li>

        <li class="feed-line" data-icon="false" style="border:none;">
            <h2>
            <span>
          	<img src="Team/adee.jpg" width="40px" height="40px" class="img-circle"/>  
          	</span> 
          	Adeleen Joyce Pavia</h2>
            <p>Adeleen said, "Too loud" in 312</p>
            <p class="ui-li-aside">8:55 am</p>
          </li>


          <li style="background-color:#e03838; border:none;">Tuesday, January 1, 2014 <span class="ui-li-count">1</span></li>   
         
          <li class="feed-line" data-icon="false" style="border:none;"> 
            <h2>
            <span>
          	<img src="Team/andre.jpg" width="40px" height="40px" class="img-circle"/>  
          	</span> 
          	Andre Hermanto</h2>
            <p>Andre felt cold at 330</p>
            <p class="ui-li-aside">10.11 am</p>
          </li>

        <li style="background-color:#e03838; border:none;" data-role="list-divider">Tuesday, December 25, 2013 <span class="ui-li-count">2</span></li>   
        
          <li class="feed-line" data-icon="false" style="border:none;">
            <h2>
            <span>
          	<img src="Team/felix.jpg" width="40px" height="40px" class="img-circle" style="border: 2px solid #26b89a;"/>  
          	</span> 
          	Felix Lee</h2>
            <p >Felix felt awesome at 300</p>
            <p class="ui-li-aside">11.15 am</p>
          </li>
        
        <li class="feed-line" data-icon="false" style="border:none;">
            <h2>
            <span>
          	<img src="Team/faisal.jpg" width="40px" height="40px" class="img-circle"/>  
          	</span> 
          	Faisal Al-sd</h2>
            <p>Faisal felt burning at 280</p>
            <p class="ui-li-aside">9.31 am</p>
          </li>

        </ul>
        
      </div>
      
      <div data-role="main" class="ui-content" id = "events" style="display: none">
      	
      	<ul data-role="listview" data-inset="true">

        	<li style="background-color:#e03838; border:none;">Monday, June 1, 2014 <span class="ui-li-count">1</span></li> 
         
          		<li class="feed-line" data-icon="false" style="border:none;">
          			<h2>University Conference</h2>
            		<p class="ui-li-aside">2:30pm</p>
          		</li>

	
			<li style="background-color:#e03838; border:none;"> Thursday, June 19, 2014 <span class="ui-li-count">1</span></li>   
			 
				<li class="feed-line" data-icon="false" style="border:none;">
          			<h2>Borneo Student Association Meeting</h2>
            		<p class="ui-li-aside">5:30pm</p>
          		</li>
	
			<li style="background-color:#e03838; border:none;" data-role="list-divider">Wednesday, August 13, 2014 <span class="ui-li-count">1</span></li>   
			
				<li class="feed-line" data-icon="false" style="border:none;">
          			<h2>Interaction Design Training</h2>
            		<p class="ui-li-aside">12:30pm</p>
          		</li>
          		
          	<li style="background-color:#e03838; border:none;" data-role="list-divider">Wednesday, August 20, 2014 <span class="ui-li-count">1</span></li>   
			
				<li class="feed-line" data-icon="false" style="border:none;">
          			<h2>ITEE Orientation Lunch</h2>
            		<p class="ui-li-aside">2:30pm</p>
          		</li>
		   
			</ul>
      
      </div>
  
    </div> 

</body>
</html>