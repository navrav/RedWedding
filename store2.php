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
        	<button type="button" class="btn btn-default btn-sm">
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
        <h6>Did you know there are power points located in all the <br>
        benches along the mezzanine level</h6>
        	
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
  
</div> 

</body>
</html>
