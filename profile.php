<!DOCTYPE html>
<?php
    /****************************************************************
	*	PROFILE.PHP - This page is the which user change their hats 
	*   for avatars and buy secrets. 
	*	This page allows users to see the hats and the secrets they own 
	*
	*
	*/
  session_start();
 
  include_once("servercon.php");
  
    if (!isset($_SESSION['username']))
    {
          header("location:index.php");
    }

  $user = $_SESSION["username"];

  $resultNew = mysqli_query($dbconn,"SELECT f_name, l_name, pic, rank FROM Users WHERE u_ID = {$user}");
  $currentUser = mysqli_fetch_array($resultNew, MYSQLI_ASSOC);
  $hatquery = mysqli_query($dbconn, "SELECT h_ID FROM `Hat`, `UserSecrets` WHERE `Hat`.`s_ID` = `UserSecrets`.`s_ID` AND `UserSecrets`.`u_ID` = {$user}");
  $allhats = mysqli_query($dbconn, "SELECT h_ID FROM `Hat`");
  $des = mysqli_query($dbconn, "SELECT Description, name FROM `Secrets`, `UserSecrets` WHERE `Secrets`.`s_ID` = `UserSecrets`.`s_ID` AND `UserSecrets`.`u_ID` = {$user} AND `Secrets`.`s_ID` NOT IN (SELECT `Hat`.`s_ID` FROM Hat)");
?>
<html>
	<head>
        <title>AEBSpace - My Profile</title>
        <link rel="icon" href="/icons/favicon.ico">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="css/jquery.mobile-1.4.2.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css" type="text/css">
		
		
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="js/jquery.mobile-1.4.2.js"></script>
	<script>$(document).ready(function(){$("#change_img").click(function(){$("#select_img").show();$("#layover").show();});
	
	//click the button then open the popup
	$("#male_img").find('img').bind("click",function(){ 
	
	if($(this).attr('data_src')!='m.png'){
	$.get('change_pic.php?t='+Math.random(),{user:"<?=$user?>",pic:$(this).attr('data_src')},function(change_result){
	//if the avatar data source does not include m.png, then the function of changing hat can be executed
	
	if(change_result!=''){//change the database then change the avatar
	
	$("#show_img").attr({'src':'avatars/'+change_result}); //display the image
	  
	  $("#select_img").hide();$("#layover").hide();//remove the popup
	
	}
	
	});  
	
	}
	  
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
                        	<img id="show_img" src="avatars/<?=!empty($currentUser['pic']) ? $currentUser['pic'] : "qm.png"?>" width="100px" height="105px" class="img-circle"/>
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
					<h3>Your Secrets</h3>
					
                       
					    
                        	<?php 
					   while($desList = mysqli_fetch_array($des, MYSQLI_ASSOC)){
					   echo '<h4>'.$desList['name'].'</h4>';
					   echo '<h5>'.$desList['Description'].'</h5>';
					   echo '<br />';
					   
					   
					   }//display the name and description of the serects which the user owns
					   
					   ?>
							
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
					<p>change your hat?</p>
				</div>
			
				<div class="modal-footer" style="padding-top: 10px; padding-bottom: 10px;">
					
					<div id="male_img">
			
				<img style="max-height:40px;float:left;cursor:pointer;" src="avatars/hat1.png" data_src="m1.png">
				<img style="max-height:40px;float:left;cursor:pointer;" src="avatars/hat2.png" data_src="m2.png">
				
				
				
				<?php
				echo("<script>console.log('All hats... ');</script>");
				$allmyhats = array();
				while($hatList = mysqli_fetch_array($hatquery, MYSQLI_ASSOC)){
					array_push($allmyhats, $hatList['h_ID']);
				}
				
				
				
				$allhatsarray = array();
				while($allhatsq = mysqli_fetch_array($allhats, MYSQLI_ASSOC)){
					array_push($allhatsarray, $allhatsq['h_ID']);
				}
				
				echo("<script>console.log('Gets here');</script>");
				
				foreach ($allhatsarray as $currenthat){
				if (in_array($currenthat, $allmyhats)){
				?> 
				<img style="max-height:40px;float:left;cursor:pointer;" src="avatars/<?php echo($currenthat); ?>" data_src="<?php echo 'm'.$currenthat[3].'.png'; ?>">
				<?php
				}
				

				
				else{ ?>
				<img style="max-height:40px;float:left;cursor:pointer;" src="avatars/qm.png" data_src="m.png"> <?php
				}
				}?>
				
				<!--display the hats which the user owns in the popup window-->
				
				
				
			
				<!--
				<img style="max-height:40px;float:left;cursor:pointer;" src="avatars/qm.png" data_src="m.png">
				<img style="max-height:40px;float:left;cursor:pointer;" src="avatars/qm.png" data_src="m.png">
				<img style="max-height:40px;float:left;cursor:pointer;" src="avatars/qm.png" data_src="m.png">
				<img style="max-height:40px;float:left;cursor:pointer;" src="avatars/qm.png" data_src="m.png">
				<img style="max-height:40px;float:left;cursor:pointer;" src="avatars/qm.png" data_src="m.png">
				<img style="max-height:40px;float:left;cursor:pointer;" src="avatars/qm.png" data_src="m.png">
				<img style="max-height:40px;float:left;cursor:pointer;" src="avatars/qm.png" data_src="m.png">
				<img style="max-height:40px;float:left;cursor:pointer;" src="avatars/qm.png" data_src="m.png">--></div>
					<p>&nbsp;</p><p>&nbsp;</p><p>&nbsp;</p>
					
					
				</div>
			</div>
	</div>
</body>
</html>
