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
/***************************************************************************
	*	
	*	FRIENDS.PHP - Extracts data from the database and displays information
	*   about the user's friends list. Provides all functionality required for 
	*   the user to manage their friends list.
	*
	*	Functionality:
	*		- Establishes connection to the database
	*		- Grabs data from the database
	*		- Displays a list of people that are a part of the user's friends 
	*         network
	*		- Adds to or deletes friends from the user's network based on the
	*         actions of the user
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
// Removes the friend relationship from the database - database interaction is handled in a 
// separate file 'friends_delete.php'
$.get('friends_delete.php?t='+Math.random(),{u_id:"<?=$user?>",delete_id:tempFriend},function(delete_success){if(delete_success=="ok")//如果数据库删除成功 移除DOM
$("#"+tempFriend).parents('li').remove();
// Hides the dialog box from view after the friend has been successfully deleted
$("#layover").css({'display':'none'});//移除弹窗
$("#confirmpop").css({'display':'none'});//移除弹窗背景	
});



});
//点击取消 移除弹窗和弹窗背景
// If the user selects 'Cancel' the popup dialog box is removed from the screen
$("#no").click(function(){
$("#layover").css({'display':'none'});
$("#confirmpop").css({'display':'none'});				

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
	    // Creates an array out of the data selected from the database an iterates over it
	    // extracting relevant data and populating HTML fields - this populates the list
	    // of friends that a user has, displaying some useful information about them as well
	  	while($friendList = mysqli_fetch_array($resultNew, MYSQLI_ASSOC)) {
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
					
    <!-- Dialog box that is displayed and asks for confirmation when a user wishes to delete a friend -->
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
				 
	<?php 
	// Assigns data posted from a form on the page to a variable
	if (isset($_POST['namesearch'])){
		$firstname = $_POST['namesearch'];
		}
		?>
	
	<!-- Dialog box that is displayed when a user wishes to add a friend to their network. 
	A user is required to enter a name to search for. -->								
	<div id="addpop" style="display:none; position:fixed; left:20%; top:40%; "> 
		<div class="modal-content" style="background-color:#262626; width:250px">
		
				<div class="modal-body" style="padding: 15px; padding-bottom: 5px;">
				<form id="searchname" method="POST" action="friendsadd.php">
									<p> Enter Friends Name to Add:</p>
					<button type="button" style="position: absolute; top:0px; right: 7px; width: 20px; background-color: transparent; border: none; box-shadow: none; text-align: center; padding: 5px;" onClick="Close();">&times;</button>
					<p> Name: <input type="text" id="namesearch" name="namesearch2"></p>
					
					<input type="submit" value="Search">
					
				</form>	
				</div>
			
			</div>
	</div>
  
  
</div> 



</body>
</html>
