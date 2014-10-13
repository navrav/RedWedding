<!DOCTYPE html>
<?php
  session_start();
 
  include_once("servercon.php");
  
    if (!isset($_SESSION['username']))
    {
          header("location:index.php");
    }

  $user = $_SESSION["username"];

  $resultNew = mysqli_query($dbconn,"SELECT f_name, l_name, pic, rank FROM Users WHERE u_ID = {$user}");
  $currentUser = mysqli_fetch_array($resultNew, MYSQLI_ASSOC);
?>
<html>
	<head>
        <title><?=$user?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="css/jquery.mobile-1.4.2.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css" type="text/css">
		
		
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="js/jquery.mobile-1.4.2.js"></script>
	<script>$(document).ready(function(){$("#change_img").click(function(){$("#select_img").show();$("#layover").show();});
	
	
	$("#male_img").find('img').bind("click",function(){ 
	
	
	$.get('change_pic.php?t='+Math.random(),{user:"<?=$user?>",pic:$(this).attr('data_src')},function(change_result){
	
	
	if(change_result!=''){//change the avatar once the database changes successfully
	
	$("#show_img").attr({'src':'avatars/'+change_result});
	  
	  $("#select_img").hide();$("#layover").hide();
	
	}
	
	});  
	
	
	  
	   });
	
	
	
	});
	</script>
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
                        	<img id="show_img" src="avatars/<?=!empty($currentUser['pic']) ? $currentUser['pic'] : "m.png"?>" width="100px" height="105px" class="img-circle"/>
							<!-- The below two lines are coming from top banner. -->
                        	<button id="change_img"> <?php //echo $fname ." ". $lname;
							echo "Change Avatar";
							?></button> 
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

<div id="layover" style="display:none; position:fixed; top:0%; left:0%; width:100%; height:100%; background-color:black; opacity: .50;" > </div>
					
					
	<div id="select_img" style="display:none; position:fixed; left:50%; top:50%;margin-left:-125px;margin-top:-74.5px; "> 
		<div class="modal-content" style="background-color:#262626; width:250px">
				<div class="modal-body"  style="padding: 15px; padding-bottom: 5px;">
					<p>Change your hat?</p>
				</div>
			
				<div class="modal-footer" style="padding-top: 10px; padding-bottom: 10px;">
					
					<div id="male_img">
			
				<img style="max-height:40px;float:left;cursor:pointer;" src="avatars/hat1.png" data_src="m1.png">
				<img style="max-height:40px;float:left;cursor:pointer;" src="avatars/hat2.png" data_src="m2.png">
				<img style="max-height:40px;float:left;cursor:pointer;" src="avatars/hat3.png" data_src="m3.png">
				<img style="max-height:40px;float:left;cursor:pointer;" src="avatars/hat4.png" data_src="m4.png">
				<img style="max-height:40px;float:left;cursor:pointer;" src="avatars/hat5.png" data_src="m5.png">
				<img style="max-height:40px;float:left;cursor:pointer;" src="avatars/hat6.png" data_src="m6.png">
				<img style="max-height:40px;float:left;cursor:pointer;" src="avatars/hat7.png" data_src="m7.png">
				<img style="max-height:40px;float:left;cursor:pointer;" src="avatars/hat8.png" data_src="m8.png">
				<img style="max-height:40px;float:left;cursor:pointer;" src="avatars/hat9.png" data_src="m9.png">
				<img style="max-height:40px;float:left;cursor:pointer;" src="avatars/hat10.png" data_src="m10.png"></div>
					<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
					
					
				</div>
			</div>
	</div>
</body>
</html>
