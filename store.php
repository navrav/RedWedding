<!DOCTYPE html>

<html>
	<head>
		<title>AEB Space - Store</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="css/jquery.mobile-1.4.2.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css" type="text/css">
		
		
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="js/jquery.mobile-1.4.2.js"></script>
        <script type="text/javascript">

	function disableButton(buttonID){
    	document.getElementById(buttonID).disabled = true;
    }
    
    function ownedButton(buttonID){
        document.getElementById(buttonID).innerHTML = "Purchased";
    	document.getElementById(buttonID).disabled = true;
    }
    
    // function confirmPurchase(sID){
//         console.log('Launching pop-up window...');
//         document.getElementById('secretIDtemp').value=sID;
//         document.getElementById('layover').style.display= "block";
// 		document.getElementById('confirmpop').style.display= "block";
//     }
//     
//     function buySecret(){
//         x = document.getElementById("secretIDtemp").value;
//         document.getElementById('layover').style.display= "none";
// 		document.getElementById('confirmpop').style.display= "none";
//         console.log("buying secret with ID...");
//         console.log(x);
//         
//         
//     }
    function redirect(){
    window.location = "http://deco3801-01.uqcloud.net/store.php";
    }
    
    function checkSecrets(){
        console.log('Refreshed page...');
        
    }
    
    
    </script>

	<?php
    function reloadPage(){
    echo("<script>console.log('calling reload function');</script>");
    location.reload(true);
    }
	/***************************************************************************
	*	
	*	STORE.PHP - Updates the userSecret table and AEBux totals depending
	* 				on which secrets the user has purchased
	*
	*	Functionality:
	*		- Establishes connection to the database
	*		- Grabs data from UserSecrets to generate a list of puchased secrets
	*		- Updates the disabled property of each button depending on whether 
	*		  a user has purchased that secret
	*		- Updates the UserSecrets table and AEBux value when a user purchases
	*		  a new secret
	*/

	session_start();
	include_once("servercon.php");
	if (!isset($_SESSION['username']))
	{
		header("location:index.php");
	}
	
	// Taken from feed.php
    $user = $_SESSION["username"];
	echo("<script>console.log('uID_Store.php:".$user."');</script>"); // Nikita added print check here
    
    $query = mysqli_query($dbconn, "SELECT * FROM `Secrets` ORDER BY `cost`");
	if ($query != ""){
	}else{
		echo("<script>console.log('Data not found');</script>");
	}

    $query2 = mysqli_query($dbconn, "SELECT * FROM `Users` WHERE `u_ID`=$user");
	//echo("<script>console.log(".$query2.");</script>");
	if ($query2 != ""){
	}else{
		echo("<script>console.log('Data was not found');</script>");
	}
	
	$secretslist = mysqli_query($dbconn, "SELECT * FROM 'UserSecrets' WHERE 'u_ID'=$user");

	/* Aim is to check the database table and find the list of secrets already bought
	   by a user, and store the s_ID values in a list that is iterated over by a jscript 
	   function in order to disable all the buttons for secrets already bought
	*/

	/*****************************************************************************/
	?>			
	</head>

	<body onload="checkSecrets()">

		<!--top bar-->
		<div data-role="page" data-theme="b" style="background-color:white;">
		  <div data-role="header" id="header_pink">
		   	<?php require("topbanner.php"); ?>
		</div>
		<!--end top bar-->
  
  
		<!--nav bar-->

   	 	<?php require("menu.php"); ?>
	
		<!--end nav bar-->
	<div data-role="main" class="ui-content" id="store_list">
			
	<ul data-role="listview" data-inset="true">
	<li style="background-color:#ee4055; border:none; text-align:center;">STORE
	<input type="hidden" id="secretIDtemp" value="">			  
		 <?php
    				
if (isset($_POST['buysecret'])){
	   $sID = $_POST['buysecret'];
	   $cost = $_POST['cost'];
	   
	   mysqli_query($dbconn, "INSERT INTO `UserSecrets`(`u_ID`, `s_ID`) VALUES (".$user.", ".$sID.")");
	   $BUXquery = mysqli_query($dbconn, "SELECT * FROM `Users` WHERE `u_ID` = 36");
	   $BUXqueryarray = mysqli_fetch_array($BUXquery);
	   $userBUX = $BUXqueryarray['AEBux'];
	   $newBUX = $userBUX - $cost;
	   mysqli_query($dbconn, "UPDATE `Users` SET `AEBux`=".$newBUX." WHERE `u_ID`=".$user."");
	   echo '<script type="text/javascript"> redirect(); </script>';
	   //header('Location: profile.php');
	   }
		        
	
	while($row = mysqli_fetch_array($query)){
		?>
			<li data-icon="false">
				<h6><?php
					echo $row['name'];
					?>
				</h6>
				<p><?php
					echo $row['cost'];
					echo " AEBux";
					?>
				</p>
				<p class="ui-li-aside">

<!--"<?php echo $_SERVER['PHP_SELF']; ?>"
onsubmit="return confirm('Are you sure you would like to buy this secret for <?php echo $row['cost'] ?> AEBux?')" -->
		        
					<form id="buysecretForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return confirm('Are you sure you would like to buy this secret for <?php echo $row['cost'] ?> AEBux?')">
					    <input type="hidden" name="cost" value="<?php echo $row['cost'] ?>">
						<button type="submit" name="buysecret" class="btn btn-default btn-sm" id="<?php echo $row['s_ID'] ?>" value="<?php echo $row['s_ID'] ?>" >
						<span class="glyphicon glyphicon-gift"></span> Buy Secret
						</button>
						</form> 
				</p>
				</li>

			<?php
	// 
	}
	?>
	</ul>
  </div>
  
  	<div id="layover" style="display:none; position:fixed; top:0%; left:0%; width:100%; height:100%; background-color:black; opacity: .50;" > </div>
					
					
	<div id="confirmpop" style="display:none; position:fixed; left:20%; top:40%;"> 
		<div class="modal-content" style=" background-color:#262626; width:250px">
				<div class="modal-body"  style="padding: 15px; padding-bottom: 5px;">
					<p> Are you sure you want to buy this secret for 30AEBuxs?</p>
				</div>
				
				<div class="modal-footer" style="padding-top: 10px; padding-bottom: 10px;">
					<button type="button" style="font-size: 13px; padding: 5px; width: 100px; float: right; margin-left: 5px;" id = "yes" onclick="buySecret()">Yes</button>
					<button type="button" style="font-size: 13px; padding: 5px; width: 100px; float: right;" id="no" onclick="window.location.href='/Kevin/store.php'">No</button> 
				</div>
			</div>
	</div>
  
  
</div> 

</body>
<?php

// Code responsible for disabling the buttons for secrets that have already been purchased
// by the user, and secrets for which a user does not have enough AEBux to purchase it
// Should put this script into a document.ready function or body.onload()
$result = mysqli_query($dbconn, "SELECT * FROM `UserSecrets` WHERE `u_ID`=$user");
	if(!$result){
			echo("<script>console.log('');</script>");
			echo("<script>console.log('No data from table');</script>");
		} else{
			echo("<script>console.log('Data found');</script>");
		}
	echo("<script>console.log('continuing function');</script>");
	while($row = mysqli_fetch_array($result)) {
   		echo '<script type="text/javascript"> ownedButton('.$row['s_ID'].'); </script>';
}

$result2 = mysqli_query($dbconn, "SELECT * FROM `Secrets`");
while ($row2 = mysqli_fetch_array($result2)){
if($row2['cost'] > 30){
    echo '<script type="text/javascript"> disableButton('.$row2['s_ID'].'); </script>';
}
}

?>
</html>