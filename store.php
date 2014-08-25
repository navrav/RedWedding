<!DOCTYPE html>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="jquery.mobile-1.4.2.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css" type="text/css">
		
		
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="jquery.mobile-1.4.2.js"></script>
		<script src="store.js"></script>
		
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
			//die("Unable to connect to database [".$db->connect_error."]");
		}

	function update_usersecrets(){
		echo("<script>console.log('launching function...');</script>");
		$user='deco';
		$secretid='12';
		$userid = mysqli_query($dbconn, "SELECT 'u_ID' FROM 'Users' WHERE 'email'='deco'");
		if (mysql_errno()){
			echo("<script>console.log('Failed to connect');</script>");
		}
		echo("<script>console.log('Still running...');</script>");
		$userbux = mysqli_query($dbconn, "SELECT 'AEBux' FROM 'Users' WHERE 'u_ID'=$userid");
		$secretcost = mysqli_query($dbconn, "SELECT 'Cost' FROM 'Secrets' WHERE 's_ID'='1'");
		//$newbux = $userbux - $secretcost;
		$updatebux = mysqli_query($dbconn, "UPDATE 'Users' SET AEBux=AEBux-$secretcost WHERE u_ID='$userid'");
		$buysecret = mysqli_query($dbconn, "INSERT INTO 'UserSecrets'('u_ID', 's_ID') VALUES ('deco', '12')");
	}

	update_usersecrets();
	?>	

		<!--		//$conNew=mysqli_connect("deco3801-01.zones.eait.uq.edu.au","root","Viking8Chief+latch","aeb");
      	// Check connection
      	//if (mysqli_connect_errno()) {
        //	echo "Failed to connect to MySQL: " . mysqli_connect_error();
      	//}-->
		
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
		  
	  
      <li data-icon="false">  
        <h6>AEB Rooms Secret</h6>
        <p>15 AEBux</p>
        <p class="ui-li-aside">
        	<button type="button" id="aebroom" class="btn btn-default btn-sm" onclick="buy()">
	        		<span class="glyphicon glyphicon-gift"></span> Buy Secret
	        </button>
		</p>        
      </li>
      
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