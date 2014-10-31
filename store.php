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

    // Checks to make sure a user is logged in to the system, otherwise redirects them
    // to the login page
	session_start();
	include_once("servercon.php");
	if (!isset($_SESSION['username']))
	{
		header("location:index.php");
	}
	
	// Taken from feed.php
    $user = $_SESSION["username"];
	echo("<script>console.log('uID_Store.php:".$user."');</script>");
    
    // Checks to make sure queries are legitamite and return results
    $query = mysqli_query($dbconn, "SELECT * FROM `Secrets` ORDER BY `cost`");
	if ($query != ""){
	}else{
		echo("<script>console.log('Data not found');</script>");
	}

    // Checks to make sure queries are legitamite and return results
    $query2 = mysqli_query($dbconn, "SELECT * FROM `Users` WHERE `u_ID`=$user");
	if ($query2 != ""){
	}else{
		echo("<script>console.log('Data was not found');</script>");
	}
	
	// Compilation of queries required to collect the data needed to be displayed and 
	// updated on the store page
	$secretslist = mysqli_query($dbconn, "SELECT * FROM 'UserSecrets' WHERE 'u_ID'=$user");
	$BUXquery = mysqli_query($dbconn, "SELECT * FROM `Users` WHERE `u_ID` = $user");
	$BUXqueryarray = mysqli_fetch_array($BUXquery);
	$userBUX = $BUXqueryarray['AEBux'];


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

// Function is called when the 'Purchase' button is clicked by a user, which triggers
// the form to be posted    				
if (isset($_POST['buysecret'])){
	   $sID = $_POST['buysecret'];
	   $cost = $_POST['cost'];
	   // Updates the UserSecrets table with the newly purchased secret and adjusts a 
	   // user's AEBux total
	   mysqli_query($dbconn, "INSERT INTO `UserSecrets`(`u_ID`, `s_ID`) VALUES (".$user.", ".$sID.")");
	   $BUXquery = mysqli_query($dbconn, "SELECT * FROM `Users` WHERE `u_ID` = $user");
	   $BUXqueryarray = mysqli_fetch_array($BUXquery);
	   $userBUX = $BUXqueryarray['AEBux'];
	   $newBUX = $userBUX - $cost;
	   mysqli_query($dbconn, "UPDATE `Users` SET `AEBux`=".$newBUX." WHERE `u_ID`=".$user."");
	   // Redirects users to their profile page where they are able to view the newly
	   // purchased secret
	   echo("<script type='text/javascript'>redirect()</script>");
	   //header('Location: http://deco3801-01.uqcloud.net/profile.php');
	   }

	


	// Iterates over an array of the list of possible secrets and inserts the information
	// about each secret into the correct format of the page
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
                        
                        // Checks to see whether a secret is already owned by a user and
                        // if they are able to afford it, and adjusts the attributes of 
                        // the button accordingly 
                        if (!empty($isOwnedarr['s_ID'])){ ?>
                        <button type="button" onclick="window.location.href='http://deco3801-01.uqcloud.net/profile.php'" name="buysecret" class="btn btn-default btn-sm" id="<?php echo $row['s_ID'] ?>" value="<?php echo $row['s_ID'] ?>" >
						 View
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
					
<!-- 	Confirmation pop-up designed for when a user selects to buy a secret - NOT USED	 -->
	<!-- 
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
 -->
  
  
</div> 

</body>
<?php


?>
</html>