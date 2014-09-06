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
		
		
		<!--Need to know:
			User ID
			Secret ID
			Secret Cost
		-->

	<?php
	session_start();

	$host="deco3801-01.zones.eait.uq.edu.au"; // Host name
	$username="root"; // Mysql username
	$password="Viking8Chief+latch"; // Mysql password
	$db_name="aeb"; // Database name
	$tbl_name="Users"; // Table name u_ID
	$tbl_name2="Secrets"; //Table name s_ID
	$tbl3_name="UserSecrets"; //Table name
	error_reporting(E_ALL);

	// Connect to server and select databse.
	$dbconn = new mysqli($host, $username, $password, $db_name);
	if($dbconn->connect_errno > 0){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
			die("Unable to connect to database [".$db->connect_error."]");
		}

	$sqlt = mysqli_query($dbconn, "INSERT INTO `UserSecrets`(`u_ID`, `s_ID`) VALUES (100,aebroom)");
	//$sqli = mysqli_query($dbconn, "INSERT INTO `UserSecrets`(`u_ID`, `s_ID`) VALUES (690,69)");
	echo("<script>console.log('Opening page...');</script>");
	
	$secretlist = mysqli_query($dbconn, "SELECT * FROM `UserSecrets` WHERE `u_ID`=100");
		if(!$secretlist){
			echo("<script>console.log('No data from table');</script>");
		} else{
			echo("<script>console.log('Data found');</script>");
		}
	while($row = mysqli_fetch_array($secretlist)) {
 	 //echo("<script>console.log('$row['s_ID']');</script>");
 	 //echo '<script type="text/javascript">', 'checkSecrets($row['s_ID']);', '</script>';
 
	}	
	//echo("<script>console.log("$secretlist");</script>");
	//echo("<script>console.log('PHP: ".$data."');</script>");



	?>	

		<!--		//$conNew=mysqli_connect("deco3801-01.zones.eait.uq.edu.au","root","Viking8Chief+latch","aeb");
      	// Check connection
      	//if (mysqli_connect_errno()) {
        //	echo "Failed to connect to MySQL: " . mysqli_connect_error();
      	//}-->
    <script>


	function checkSecrets(s_ID){
		document.getElementById(s_ID).disabled = true;
	}

	</script>

	<?php
	//Aim is to check the database table and find the list of secrets already bought
	// by a user, and store the s_ID values in a list that is iterated over by a jscript 
	// function in order to disable all the buttons for secrets already bought

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
		  
	  
      <li data-icon="false">  
        <h6>AEB Rooms Secret</h6>
        <p>15 AEBux</p>
        <p class="ui-li-aside">
        	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>" >
        	<button type="submit" name="buysecret" class="btn btn-default btn-sm" id="aebroom">
	        		<span class="glyphicon glyphicon-gift"></span> Buy Secret
	        </button>
	    	</form>
		</p>        
      </li>
      
      <?php

      if (isset($_POST['buysecret'])) {
      	$sqlt = mysqli_query($dbconn, "INSERT INTO `UserSecrets`(`u_ID`, `s_ID`) VALUES (222,120)");
		//$(this).find('button[type="submit"]').prop("disabled", true);
		echo("<script>console.log('Calling function...');</script>");
        //updateDisable();
		//echo '<script type="text/javascript">', 'updateDisable();', '</script>';

    	}

	?>






	  <li data-icon="false">
	  	<h6>AEB Hallway Secret</h6>
        <p>15 AEBux</p>
        <p class="ui-li-aside">
        	<button type="button" class="btn btn-default btn-sm">
	        		<span class="glyphicon glyphicon-gift"></span> Buy Secret
	        </button>
		</p>
     </li>   
      <li data-icon="false">
        <h6>AEB Benches Secret</h6>
        <p>30 AEBux</p>
        <p class="ui-li-aside">
        	<button type="button" class="btn btn-default btn-sm" onclick="buy();">
	        		<span class="glyphicon glyphicon-gift"></span> Buy Secret
	        </button>
		</p>                
      </li>	  
      <li data-icon="false">
        <h6>Building Architecture Secret</h6>
        <p>45 AEBux</p>  
        <p class="ui-li-aside">
        	<button type="button" class="btn btn-default btn-sm">
	        		<span class="glyphicon glyphicon-gift"></span> Buy Secret
	        </button>
		</p>      
      </li>
	  <li data-icon="false">
        <h6>Power Supply Secret</h6>
        <p>50 AEBux</p>     
        <p class="ui-li-aside">
        	<button type="button" class="btn btn-default btn-sm">
	        		<span class="glyphicon glyphicon-gift"></span> Buy Secret
	        </button>
		</p>           
      </li>
      <li data-icon="false">
        <h6>Power Supply Secret</h6>
        <p>50 AEBux</p>     
        <p class="ui-li-aside">
        	<button type="button" class="btn btn-default btn-sm">
	        		<span class="glyphicon glyphicon-gift"></span> Buy Secret
	        </button>
		</p>           
      </li>
      <li data-icon="false">
        <h6>Power Supply Secret</h6>
        <p>50 AEBux</p>     
        <p class="ui-li-aside">
        	<button type="button" class="btn btn-default btn-sm">
	        		<span class="glyphicon glyphicon-gift"></span> Buy Secret
	        </button>
		</p>           
      </li>
    </ul>
  </div>
  
  	<div id="layover" style="display:none; position:fixed; top:0%; left:0%; width:100%; height:100%; background-color:black; opacity: .50;" > </div>
					
					
	<div id="confirmpop" style="display:none; position:fixed; left:20%; top:40%;"> 
		<div class="modal-content" style=" background-color:#262626; width:250px">
				<div class="modal-body"  style="padding: 15px; padding-bottom: 5px;">
					<p> Are you sure you want to buy this secret for 30AEBuxs?</p>
				</div>
				
				<div class="modal-footer" style="padding-top: 10px; padding-bottom: 10px;">
					<button type="button" style="font-size: 13px; padding: 5px; width: 100px; float: right; margin-left: 5px;" id = "yes" onclick="window.location.href='/store2.php'">Yes</button>
					<button type="button" style="font-size: 13px; padding: 5px; width: 100px; float: right;" id="no" onclick="window.location.href='/store.php'">No</button>
				</div>
			</div>
	</div>
  
  
</div> 

</body>
</html>