<!DOCTYPE html>
<?php
	session_start();
	
  	include_once("servercon.php");

  	if (!isset($_SESSION['username']))
  	{
    	  header("location:index.php");
  	}

  	$user = $_SESSION['username'];
  	//$user = '1';
  	$namesearchin = strip_tags($_POST['namesearch2']);
  	
   	$resultNew = mysqli_query($dbconn,"SELECT u_ID, f_name, l_name, pic, AEBux FROM Users WHERE f_name = '{$namesearchin}'");
    $currFriends = mysqli_query($dbconn, "SELECT `ID_2` FROM `Friends` WHERE `ID_1`=$user");
    $currFriendsA = mysqli_fetch_array($currFriends);
?>

<html>
	<head>
		<title>AEB Space - Friends</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="css/jquery.mobile-1.4.2.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css" type="text/css">
		
		
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="js/jquery.mobile-1.4.2.js"></script>
		
		<script type="text/javascript">
			var tempFriend = "";
		</script>
<script>
$(document).ready(function(){
$("#yes").click(function(){

$.get('friends_delete.php?t='+Math.random(),{u_id:"<?=$user?>",delete_id:tempFriend},function(delete_success){if(delete_success=="ok")//如果数据库删除成功 移除DOM
$("#"+tempFriend).parents('li').remove();
$("#layover").css({'display':'none'});//remove popup window
$("#confirmpop").css({'display':'none'});//remove the bg of popup
});



});
//click to cancel
$("#no").click(function(){
$("#layover").css({'display':'none'});
$("#confirmpop").css({'display':'none'});				

});
});

$("#addF").click(
    console.log('clicked');
    function(){
        var friend = $(this).attr('value');
        $.ajax({
            url: "friendins.php",
            type: "POST",
            data: {"friend": friend},
            success: function(data){
      }
  });
    });



</script>
		<script>
			function Deletepop(clickedID){
				document.getElementById('layover').style.display= "block";
				document.getElementById('confirmpop').style.display= "block";
				console.log("CLICKED ID" + clickedID);
				tempFriend = clickedID;
			}
		</script>
		
		<script>
			function Delete(){
				document.getElementById('layover').style.display= "block";
				document.getElementById('confirmpop').style.display= "block";

			}
		</script>

		<script>
			function Add(){
				document.getElementById('layover').style.display= "block";
				document.getElementById('addpop').style.display= "block";
				document.getElementById('addsearch').style.display= "none";
			}
		</script>
		
		<script>
			function AddSearch(){
				document.getElementById('layover').style.display= "block";
				document.getElementById('addpop').style.display= "none";
				document.getElementById('addsearch').style.display= "block";
			}
		</script>
		
		<script>
			function Close(){
				document.getElementById('layover').style.display= "none";
				document.getElementById('addpop').style.display= "none";
				document.getElementById('addsearch').style.display= "none";
			}
		</script>
		
	</head>
	
	<body>

		<!--top bar-->
		<div data-role="page" data-theme="b" style="background-color:white;">
			<div data-role="header" id="header_purple">
			<?php require("topbanner.php"); ?>
		</div>
		<!--end top bar-->
  
  
		<!--nav bar-->

   	 	<?php require("menu.php"); ?>
	
		<!--end nav bar-->
    
  <div data-role="main" class="ui-content" id="friends_list">
	
    <ul data-role="listview" data-inset="true">
	  <li style="background-color:#883c96; border:none;">
	  		<div style="text-align:center;">Search Results:</div>
		  <div  style="position:absolute; right:15px; top:0px;"><button type="button" class="btn btn-default btn-sm"><a href="friends.php">Return to Friends</a></button></div>
	  </li> 
	  
	  	
	<?php
	
	while($cf = mysqli_fetch_array($currFriends, MYSQLI_ASSOC)){
	    echo("<script>console.log('Friend ID: ".$cf['ID_2']."');</script>");
	    echo("<script>console.log('Friend ID: ".gettype($cf['ID_2'])."');</script>");
	    $cfa[] = $cf['ID_2'];
	    }
	
	
	
	  while($friendList = mysqli_fetch_array($resultNew, MYSQLI_ASSOC)) {
	  if (empty($friendList)){?>
	  <center> No results found :( </center>
	  <?php }
	  echo("<script>console.log('Friend ID: ".$friendList['u_ID']."');</script>");
	  echo("<script>console.log('User ID: ".$user."');</script>");
	  if ($user==$friendList['u_ID']){
	  // Debugging
	  echo("<script>console.log('Match');</script>");
	  } 
	  else{
	  
	  ?>
      <li data-icon="false">
      	<h6><img src="avatars/<?php echo($friendList["pic"]);?>" width="50px" height="50px" class="img-circle" style/>
      		<?php 
      		echo $friendList['f_name'] . " " . $friendList['l_name']; 
      		?>
		</h6>
        <p><span class="glyphicon glyphicon-tower"></span>
         AEBux: 
         <?php echo $friendList['AEBux'] ?> 
     	</p>
        <p style="position: absolute;top: 1em;padding-top:30px;right: 0.3em;margin: 0;text-align: right;">
        <!--
        	<form id="addfriend" method="POST" action="friendsadd.php">
        	<input type="submit" value="Add">
        	</form>-->
        	<?php 
        	if(in_array($friendList['u_ID'], $cfa) && $cf['ID_2']!=$user){ ?>
        	<button type="button" class="btn btn-default btn-sm" style="float:right;" id="<?php echo $friendList['u_ID'] ?>">
	        		 Friends
	        
	        </button>
	        <?php 
	                	}else{ if($namesearchin != "" && $cf['ID_2']!=$user){?>
        	<button type="button" class="btn btn-default btn-sm" style="float:right;" id = "addF" name="<?php echo $friendList['u_ID'] ?>" onClick="addFriend(<?php echo $friendList['u_ID'] ?>)">
	        		 
	        		 Add
	        </button>
	        <?php }} ?>
		</p>
      </li>

      <?php
      	}}
      ?>

    </ul>
    <script>
    function addFriend(friend){
    console.log('clicked');
        
        console.log(friend);
        $.ajax({
            url: "friendins.php",
            type: "POST",
            data: {"friend": friend},
            success: function(data){
            console.log('clicked');
      }
  });
  window.location="http://deco3801-01.uqcloud.net/friends.php";
  }

    
    </script>
  </div>

	<div id="layover" style="display:none; position:fixed; top:0%; left:0%; width:100%; height:100%; background-color:black; opacity: .50;" > </div>
		
	<div id="addpop" style="display:none; position:fixed; left:20%; top:40%; "> 
		<div class="modal-content" style="background-color:#262626; width:250px">
		
				<div class="modal-body" style="padding: 15px; padding-bottom: 5px;">
			<!--	<form id="searchname" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">-->
			<form id="searchname" method="POST" action="friendsadd.php">
									<p> Enter Friends Name to Add:</p>
					<button type="button" style="position: absolute; top:0px; right: 7px; width: 20px; background-color: transparent; border: none; box-shadow: none; text-align: center; padding: 5px;" onClick="Close();">&times;</button>
					<p> Name: <input type="text" id="namesearch" name="namesearch2"></p>
					
					<input type="submit" value="Search">
					<!--<button type="button" style="font-size: 13px; padding: 5px; width:100px ; margin-left: 105px;" id = "search">Search</button>-->
				</form>	
				</div>
			
			</div>
	</div>			
	<!-- 
				
	<div id="confirmpop" style="display:none; position:fixed; left:50%; top:50%;margin-left:-125px;margin-top:-74.5px; "> 
		<div class="modal-content" style="background-color:#262626; width:250px">
				<div class="modal-body"  style="padding: 15px; padding-bottom: 5px;">
					<p> Are you sure you want to delete this friend?</p>
				</div>
				
				<div class="modal-footer" style="padding-top: 10px; padding-bottom: 10px;">
					<button type="button" style="font-size: 13px; padding: 5px; width: 100px; float: right; margin-left: 5px;" id = "yes">Yes</button>
					<button type="button" style="font-size: 13px; padding: 5px; width: 100px; float: right;" id="no" >No</button>
				</div>
			</div>
	</div>
 -->
				 
									
	<!-- 
<div id="addpop" style="display:none; position:fixed; left:20%; top:40%; "> 
		<div class="modal-content" style="background-color:#262626; width:250px">
		
				<div class="modal-body" style="padding: 15px; padding-bottom: 5px;">
					<p> Enter Friends Email to Add:</p>
					<button type="button" style="position: absolute; top:0px; right: 7px; width: 20px; background-color: transparent; border: none; box-shadow: none; text-align: center; padding: 5px;" onClick="Close();">&times;</button>
					<p> Email: <input type="text" name="email"></p>
					
					<button type="button" style="font-size: 13px; padding: 5px; width:100px ; margin-left: 105px;" id = "search" onClick="AddSearch();">Search</button>
					
				</div>
			
			</div>
	</div>
 -->
						
	<!-- 
<div id="addsearch" style="display:none; position:fixed; left:20%; top:40%; background-color:#262626;"> 
		<div class="modal-content" style="background-color:#262626; width:250px">
				<div class="modal-header">
					<p> Is this who you where looking for?</p>
				</div>
				
				<div class="modal-body" style="padding: 15px; padding-bottom: 0px;background-color:#262626;">
						<section class="checkin" style=" background-color:#262626; initial; padding: 0px; ">
								<div class="container">
									<img src="Team/faisal.jpg" width="35%" height="35%" class="img-circle" style="float: left;"/>
									<h4> Faisal Alsidiqqi </h4>				
								</div>							
						</section>
    
				</div>
				
				<div class="modal-footer" style="padding-top: 10px; padding-bottom: 10px;background-color:#262626;">
					<button type="button" style="font-size: 13px; padding: 5px; width: 100px; float: right; margin-left: 5px;" id = "yes" onClick="window.location.href='/friends2.php'">Yes</button>
					<button type="button" style="font-size: 13px; padding: 5px; width: 100px; float: right;" id="no" onClick="Add();">No</button>
				</div>
			</div>
	</div>
 -->
			
  
  
</div> 



</body>
</html>
