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

   	$resultNew = mysqli_query($dbconn,"SELECT u_ID, f_name, l_name, pic, AEBux FROM Users WHERE u_ID IN (SELECT ID_2 FROM Friends WHERE ID_1 ='".$user."')");//

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

$.get('friends_delete.php?t='+Math.random(),{u_id:"<?=$user?>",delete_id:tempFriend},function(delete_success){if(delete_success=="ok")//If the database si deleted successfully, remove DOM
$("#"+tempFriend).parents('li').remove();
$("#layover").css({'display':'none'});//remove the popup window
$("#confirmpop").css({'display':'none'});//remove the popup background
});



});
//click to cancel and remove both the popup window and background
$("#no").click(function(){
$("#layover").css({'display':'none'});
$("#confirmpop").css({'display':'none'});				

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
			//<?php $_SESSION['friendsname'] = $_POST["namesearch"];?>
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
	  		<div style="text-align:center;">FRIENDS</div>
		  <div  style="position:absolute; right:15px; top:0px;"><button type="button" class="btn btn-default btn-sm" onClick="Add();">+</button></div>
	  </li> 
	  
	  	
	<?php
	  	while($friendList = mysqli_fetch_array($resultNew, MYSQLI_ASSOC)) {
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
        	<button type="button" class="btn btn-default btn-sm" style="float:right;" id="<?php echo $friendList['u_ID'] ?>" onClick="Deletepop(this.id);">
	        		<span class="glyphicon glyphicon-trash"></span> Delete
	        </button>
		</p>
      </li>

      <?php
      	}
      ?>

    </ul>
  </div>

	<div id="layover" style="display:none; position:fixed; top:0%; left:0%; width:100%; height:100%; background-color:black; opacity: .50;" > </div>
					
					
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
				 
	<?php if (isset($_POST['namesearch'])){
		$firstname = $_POST['namesearch'];
		echo("<script>console.log('name testing: $firstname');</script>");
		}
		?>
	
									
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
	
	
						
	<div id="addsearch" style="display:none; position:fixed; left:20%; top:40%; background-color:#262626;"> 
		<div class="modal-content" style="background-color:#262626; width:250px">
		<?php 
		//$fname = 'namesearch';
		$fname = $_POST["namesearch2"];
		//$first = echo("<script type='javascript'>document.getElementById('namesearch');</script>");
		
		
	
		
		$namesearchq = mysqli_query($dbconn,"SELECT u_ID, f_name, l_name, pic, rank FROM Users WHERE f_name='{$fname}'");?>
		
				<div class="modal-header">
					<p> Is this who you where looking for?</p>
					Words here

					<?php echo($fname); echo($_SESSION['friendsname']);?>
					<?php $namesearch = mysqli_fetch_array($namesearchq, MYSQLI_ASSOC);
					echo $namesearch['f_name'] . " " . $namesearch['l_name']; ?>		</div>
				
				<?php
				while ($namesearch = mysqli_fetch_array($namesearchq, MYSQLI_ASSOC)){ ?>
				
				<div class="modal-body" style="padding: 15px; padding-bottom: 0px;background-color:#262626;">
						<section class="checkin" style=" background-color:#262626; initial; padding: 0px; ">
								<div class="container">
									<!--<img src="Team/faisal.jpg" width="35%" height="35%" class="img-circle" style="float: left;"/>-->
									<h4> <?php 
      		echo $namesearch['f_name'] . " " . $namesearch['l_name']; 
      		?> </h4>				
								</div>							
						</section>
    
				</div>
				
				<div class="modal-footer" style="padding-top: 10px; padding-bottom: 10px;background-color:#262626;">
					<button type="button" style="font-size: 13px; padding: 5px; width: 100px; float: right; margin-left: 5px;" id = "yes" onClick="window.location.href='/friends2.php'">Yes</button>
					<button type="button" style="font-size: 13px; padding: 5px; width: 100px; float: right;" id="no" onClick="Add();">No</button>
				</div>
				<?php }
				?>
							</div>
	</div>
			
  
  
</div> 



</body>
</html>