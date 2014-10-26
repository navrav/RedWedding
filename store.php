<!DOCTYPE html>

<html>
	<head>
		<title>AEB Space - Store</title>
		<link rel="icon" href="/icons/favicon.ico">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="css/jquery.mobile-1.4.2.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css" type="text/css">
		
		
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="js/jquery.mobile-1.4.2.js"></script>
        <script type="text/javascript">


    function redirect(){
    window.location = "http://deco3801-01.uqcloud.net/profile.php";
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
	if ($query2 != ""){
	}else{
		echo("<script>console.log('Data was not found');</script>");
	}
	
	$secretslist = mysqli_query($dbconn, "SELECT * FROM 'UserSecrets' WHERE 'u_ID'=$user");
	$BUXquery = mysqli_query($dbconn, "SELECT * FROM `Users` WHERE `u_ID` = $user");
	$BUXqueryarray = mysqli_fetch_array($BUXquery);
	$userBUX = $BUXqueryarray['AEBux'];
	/* Aim is to check the database table and find the list of secrets already bought
	   by a user, and store the s_ID values in a list that is iterated over by a jscript 
	   function in order to disable all the buttons for secrets already bought
	*/

	/*****************************************************************************/
	?>			
	</head>

	<body>

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
	   $BUXquery = mysqli_query($dbconn, "SELECT * FROM `Users` WHERE `u_ID` = $user");
	   $BUXqueryarray = mysqli_fetch_array($BUXquery);
	   $userBUX = $BUXqueryarray['AEBux'];
	   $newBUX = $userBUX - $cost;
	   mysqli_query($dbconn, "UPDATE `Users` SET `AEBux`=".$newBUX." WHERE `u_ID`=".$user."");
	   //echo '<script type="text/javascript"> redirect(); </script>';
	   header('Location: http://deco3801-01.uqcloud.net/profile.php');
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

	        
					<form id="buysecretForm" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return confirm('Are you sure you would like to buy this secret for <?php echo $row['cost'] ?> AEBux?')">
					    <input type="hidden" name="cost" value="<?php echo $row['cost'] ?>">
					    
		                <?php	
		                $secID = $row['s_ID'];		
		                $isOwned = mysqli_query($dbconn, "SELECT * FROM `UserSecrets` WHERE `u_ID`=$user AND `s_ID`=$secID");
		                $isOwnedarr = mysqli_fetch_array($isOwned);
		                echo("<script>console.log('UserSecrets".$isOwnedarr['s_ID']."');</script>");
		                echo("<script>console.log('".gettype($isOwnedarr['s_ID'])."');</script>");

                        if (!empty($isOwnedarr['s_ID'])){ ?>
                        <button type="submit" disabled name="buysecret" class="btn btn-default btn-sm" id="<?php echo $row['s_ID'] ?>" value="<?php echo $row['s_ID'] ?>" >
						 Purchased
						</button>
						<?php } else if ($row['cost'] > $userBUX){ ?>
						<button type="submit" disabled name="buysecret" class="btn btn-default btn-sm" id="<?php echo $row['s_ID'] ?>" value="<?php echo $row['s_ID'] ?>" >
						<span class="glyphicon glyphicon-gift"></span> Buy Secret
						</button>
						<?php }	else{ ?>
						<button type="submit" name="buysecret" class="btn btn-default btn-sm" id="<?php echo $row['s_ID'] ?>" value="<?php echo $row['s_ID'] ?>" >
						<span class="glyphicon glyphicon-gift"></span> Buy Secret
						</button>
						<?php } ?>
						</form> 
				</p>
				</li>

			<?php
	
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


?>
</html>