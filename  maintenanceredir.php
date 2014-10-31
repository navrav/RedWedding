<?php
	session_start();
  	include_once("servercon.php");

  	if (!isset($_SESSION['username']))
  	{
    	  header("location:index.php");
  	}

  	$user = $_SESSION['username'];
  	
  	
  	$emailme = 'unchecked';
?>

<!DOCTYPE html>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="css/jquery.mobile-1.4.2.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css" type="text/css">
		
		
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="js/jquery.mobile-1.4.2.js"></script>
		<!-- 
<script>
			function Submit() {
				console.log('Called');
				$.get("maintenance2.php");
				console.log('After call');
				//setTimeout(function() {window.location.href = "feed.php"}, 3000);
				//document.getElementById('layover').style.display= "block";
				//document.getElementById('confirmpop').style.display= "block";
			}
 -->
		

		
		
		<style>
		
		#header_brown {
			background-color: #CD4F39;
		}
		
		#header_brown a {
			color: #CD4F39;
		}
		
		#header_brown a{
			background-color: #fff;
			margin-top:20px;
			border-radius: 50%;
			text-shadow:none;
			border:none;
			padding:0.8em 1em;
			margin-left: 10px;
		}
		
		#maint_text{
			margin-top:20px;
			padding: 15px;
			border-top-right-radius: 8px;
			border-top-left-radius: 8px;
			background-color:#252525;
			font-family: "HelveticaNeueUltraLight", "HelveticaNeue-Ultra-Light", "Helvetica Neue Ultra Light", "HelveticaNeue", "Helvetica Neue", 'TeXGyreHerosRegular', "Arial", sans-serif;
			font-weight: 100;
			color: #CD4F39;
		}
		
		
		#maint_text p{
			font-size: 14px;
			color:#fff;
		}
		
		#maint_text h4{
			font-size: 20px;
			color: #CD4F39;
		
		}
		#maint_text h5{
			font-size: 13px;
			color: #CD4F39;
		}
		
		
		</style>
	</head>
	<body>
		
		<!--top bar-->
		<div data-role="page" data-theme="b" style="background-color:white;">
		  <div data-role="header" id="header_brown">
		    <?php require("topbanner.php"); ?>
		</div>
		<!--end top bar-->
  
  
		<!--nav bar-->

   	 	<?php require("menu.php"); ?>
	
		<!--end nav bar-->
  
		   <section class="info">
		        <div class="info-body">
		            <div class="container">
		                <div class="row">
		                    <div class="col-md-8 col-md-offset-2">
		                        <div class="">
		                        	<div id="maint_text">
		                        	<h4>MAINTENANCE CONTACT PAGE</h4>
		                        	
		                        	<p>
		                        		Thank you for submitting a maintenance request! Return to <a href="feed.php"?>feed</a>, or <a href="maintenance.php">submit another</a> report.
		                        	</p>
		                        	<br><br>
		                        	<p>
		                        		<form id="maintform" method="POST" action="maintenancesend.php" name="email">
		                        		
		                        		
		                        		
		                        		
		                        			First name: <input type="text" name="FirstName" ><br>
											Last name: <input type="text" name="LastName" ><br>
		                        			<label for="email">Email (for reference): </label>
									<input type="email" class="form-control input-control" placeholder="Email" name="email" id="email">
		                        			
		                        			Issue: <textarea placeholder="Input a description of your issue here" name="issue" ></textarea>
		                        			
		                        			<br>
		                        			<label><Input type = 'checkbox' Name ='emailmeornot' value= 'emailmeval'><font size="2">Please email me a copy of this maintenance request.</font></label>
		                        			<input type="submit" value="Submit"> 
		                        			
		                        		</form>
		                        		
										<div id="layover" style="display:none; position:fixed; top:0%; left:0%; width:100%; height:100%; background-color:black; opacity: .50;" > </div>
			
			
										<div id="confirmpop" style="display:none; position:fixed; left:30%; right:30%; top:40%; "> 
											<div class="modal-content">
													
									
													
													<div  id="checkin_location">
														<p>Thank you for your feedback, an email has been sent to the appropriate person </p>
													</div>
													
												</div>
										</div> 
		                        	</p>
		                        	
		                        		
		                        	</div>
		                         </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </section>
  		</div> 
  		<!--
<?php

echo("<script>console.log('Sending email...');</script>");
sendmail($from, $to, $subject, $msg);
echo("<script>console.log('Email sent...');</script>");
?>-->
	</body>
</html>
