<!DOCTYPE html>
<?php
	session_start();
  	include_once("servercon.php");

  	if (!isset($_SESSION['username']))
  	{
    	  header("location:index.php");
  	}

  	$user = $_SESSION['username'];

   	$resultNew = mysqli_query($dbconn,"SELECT u_ID, f_name, l_name, pic, rank FROM Users WHERE u_ID IN (SELECT ID_2 FROM Friends WHERE ID_1 ='{$user}')");

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
		
		<script>
			function Deletepop(){
				document.getElementById('layover').style.display= "block";
				document.getElementById('confirmpop').style.display= "block";

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
	  		<div style="text-align:center;">FRIENDS </div>
		  <div  style="position:absolute; right:15px; top:0px;"><button type="button" class="btn btn-default btn-sm" onClick="Add();">+</button></div>
	  </li> 
	  
	  	
	<?php
	  	while($friendList = mysqli_fetch_array($resultNew)) {
	  ?>
      <li data-icon="false"><a href="friend.php">
      	<h6><img src="Team/adee.jpg" width="50px" height="50px" class="img-circle" style/>
      		<?php 
      		echo $friendList['f_name'] . " " . $friendList['l_name']; 
      		?>
		</h6>
        <p><span class="glyphicon glyphicon-tower"></span>
         Rank: 
         <?php echo $friendList['rank'] ?> 
     	</p></a>
        <p style="position: absolute;top: 1em;padding-top:30px;right: 0.3em;margin: 0;text-align: right;">
        	<button type="button" class="btn btn-default btn-sm" style="float:right;" id="<?php echo $friendList['u_ID'] ?>" onClick="Deletepop();">
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
					<button type="button" style="font-size: 13px; padding: 5px; width: 100px; float: right; margin-left: 5px;" id = "yes" onClick="Delete();'">Yes</button>
					<button type="button" style="font-size: 13px; padding: 5px; width: 100px; float: right;" id="no" onClick="window.location.href='/friends.php'">No</button>
				</div>
			</div>
	</div>
				 
									
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
			
  
  
</div> 



</body>
</html>
