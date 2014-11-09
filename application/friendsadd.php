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
/***************************************************************************
	*	
	*	FRIENDSADD.PHP - Responsible for searching the database for matches to 
	*   user searches and allows users to add these as friends
	*
	*	Functionality:
	*		- Establishes connection to the database
	*		- Grabs data from the database
	*		- Displays a list of people that return a match to the user's search term
	*		
	*/
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
// If the user selects 'Yes' then a function is called to remove the friend from the 
// users network
$(document).ready(function(){
$("#yes").click(function(){

$.get('friends_delete.php?t='+Math.random(),{u_id:"<?=$user?>",delete_id:tempFriend},function(delete_success){if(delete_success=="ok")//如果数据库删除成功 移除DOM
$("#"+tempFriend).parents('li').remove();
$("#layover").css({'display':'none'});//remove popup window
$("#confirmpop").css({'display':'none'});//remove the bg of popup
});



});
// If the user selects 'Cancel' the popup dialog box is removed from the screen
$("#no").click(function(){
$("#layover").css({'display':'none'});
$("#confirmpop").css({'display':'none'});				

});
});
// If users wish to add a friend the form is posted to friendins.php which inserts the new
// friendship into a users friends network
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
		/**
        Function is responsible for displaying a dialog box that allows a user to confirm
        whether they still wish to delete the friend from their network

        Parameters:
        @ clickedID - string representing the ID of the button that was clicked, which 
        is equal to the userID of the friend
        **/
			function Deletepop(clickedID){
				document.getElementById('layover').style.display= "block";
				document.getElementById('confirmpop').style.display= "block";
				console.log("CLICKED ID" + clickedID);
				tempFriend = clickedID;
			}
		</script>

		<script>
		/**
            Function is responsible for displaying a dialog box that allows a user to search
            for a user they wish to add to their friend network
            **/
			function Add(){
				document.getElementById('layover').style.display= "block";
				document.getElementById('addpop').style.display= "block";
				document.getElementById('addsearch').style.display= "none";
			}
		</script>

		
		<script>
		/**
            Function is responsible for hiding the dialog box that allows a user to search
            for a user they wish to add to their friend network. Function is called when 
            a user clicks on the 'X' button
            **/
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
	// Searches the database and returns an array of users the user is currently friends with
	while($cf = mysqli_fetch_array($currFriends, MYSQLI_ASSOC)){
	    echo("<script>console.log('Friend ID: ".$cf['ID_2']."');</script>");
	    echo("<script>console.log('Friend ID: ".gettype($cf['ID_2'])."');</script>");
	    $cfa[] = $cf['ID_2'];
	    }
	
	
        // Creates and array of elements returned from the query and iterates over these 
        // elements to populate a list of matches
	  while($friendList = mysqli_fetch_array($resultNew, MYSQLI_ASSOC)) {
	  if (empty($friendList)){?>
	  <center> No results found :( </center>
	  <?php }
	  // Checks to see if they are already friends and if so, ignores this user
	  if ($user==$friendList['u_ID']){
	
	  } 
	  else{
	  
	  ?>
      <li data-icon="false"><a href="friend.php">
      	<h6><img src="avatars/<?php echo($friendList["pic"]);?>" width="50px" height="50px" class="img-circle" style/>
      		<?php 
      		echo $friendList['f_name'] . " " . $friendList['l_name']; 
      		?>
		</h6>
        <p><span class="glyphicon glyphicon-tower"></span>
         AEBux: 
         <?php echo $friendList['AEBux'] ?> 
     	</p></a>
        <p style="position: absolute;top: 1em;padding-top:30px;right: 0.3em;margin: 0;text-align: right;">
        	<?php 
        	// Populates list of matches with the information extracted from the database
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
    /**
    Function is responsible for establishing the query for entering the new network into
    the database

    Parameters:
    @ friend - string representing the userID of the person the user wishes to add
    **/
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
  // Redirects user to the friends page to view their new friends list
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
  
  
</div> 



</body>
</html>
