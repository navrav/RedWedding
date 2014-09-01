<!DOCTYPE html>
<?php
  session_start();
  include("servercon.php");
?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="jquery.mobile-1.4.2.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css" type="text/css">
		
		
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="jquery.mobile-1.4.2.js"></script>
	</head>
	<body>
		<!--top bar-->
		<div data-role="page" data-theme="b">
		  <div data-role="header" id="header_pink">
		    <?php require("topbanner.php"); ?>
		</div>
		<!--end top bar-->
  
  
		<!--nav bar-->

   	 	<?php require("menu.php"); ?>
	
		<!--end nav bar-->
    
  <!--div data-role="main" class="ui-content" -->

   <section class="profile">
        <div class="profile-body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="">
                        	<div class="col-md-4 col-md-offset-4">
                        	<img src="Team/will.jpg" width="100px" height="105px" class="img-circle"/>
                        	<h4> <?php echo $fname ." ". $lname;?> </h4>
                        	<h5> <?php echo $aebux; ?> AEBux | <a href="store.php">Buy Secrets</a> </h5>
                        	</div>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="profile_content">
        <div class="profile_content_body">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-md-offset-5">
                        <div class="">
                        	<br>
                        	<h6>
                        		<span class="glyphicon glyphicon-stats"></span>
                        		Achievement Received: Adventurer
                        	</h6>
                        	<p>6 hours ago</p>
                        	
                        	<h6>
                        		<span class="glyphicon glyphicon-stats"></span>
                        		Achievement Received: Amateur</h6>
                        	<p>12 hours ago</p>
                        	
                        	<h6>
                        		<span class="glyphicon glyphicon-lock"></span>
                        		Unlocked AEB Secret</h6>
                        	<p>12 hours ago</p>
                        	
                        	<h6> 
                        		<span class="glyphicon glyphicon-map-marker"></span>
                        		Check-in Room 316A (Contact)</h6>
                        	<p>3 days ago</p>
                        	
                        	<h6>
                        		<span class="glyphicon glyphicon-log-out"></span> Left AEB</h6>
                        		<p>4 days ago</p>
                        		
                        	<h6> 
                        		<span class="glyphicon glyphicon-map-marker"></span>
                        		Check-in Room 412 (Lecture) </h6>
                        	<p>4 days ago</p>
                        	
                        	<h6> 
                        		<span class="glyphicon glyphicon-map-marker"></span>
                        		Check-in Room 316A (Study)</h6>
                        	<p>3 days ago</p>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
  <!--/div-->
  
</div> 

</body>
</html>
