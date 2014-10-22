<!DOCTYPE html>
<?php
	session_start();
  	include_once("servercon.php");

  	if (!isset($_SESSION['username']))
  	{
    	  header("location:index.php");
  	}
?>
<html>
	<head>
		<title>AEB Space - Check In</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<link rel="stylesheet" href="css/jquery.mobile-1.4.2.css" />
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/main.css" type="text/css" />
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" />
		
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="js/jquery.mobile-1.4.2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
		<script>
			// room validation
			function check() {
				var selectedRoom = document.getElementById("room").value;
				var form = document.getElementById("checkInForm");
			
				if (selectedRoom == "") {
					$("#roomStatus").css("color", "red");
					document.getElementById("roomStatus").innerHTML = "Please select a room.";
					$("#formStatus").css("color", "red");
					document.getElementById("formStatus").innerHTML = "Please select a room.";
				} else {
					form.submit();
				}
			}
		</script>
		
		<!-- friends popover -->
		<script>
			var bootstrapButton = $.fn.button.noConflict()
			$.fn.bootstrapBtn = bootstrapButton
		
			$(function (){
			 
				$("#friends").popover({
					html : true,
					title: 'Friends',
					placement: 'top',
					content:  function() {
							return $('#popover_content_wrapper').html();
						}
					
					});
			});
		</script>
		
		<!-- friends popover style -->
		<style>
			@popoverArrowColor: #f938ab;
			
			.popover {
				background:black;
			}
			
			.popover-content {
				background: #1d1d1d;
				padding: 25px;
				padding-top:10px;
				padding-bottom:5px;
			}
			.popover-title{
				background: #1a1a1a;
				color: #ef4f23;
				padding-left: 25px;
				border-bottom: 1px solid black;
			}
			
			.popover .arrow, .popover .arrow:after{
				border-color: transparent;
				border-style: solid;
			}
			
			.popover.top>.arrow:after {
				border-top-color: black;
			}
		</style>
	</head>
	<body>
		<!-- top bar -->
		<div data-role="page" data-theme="b">
			<div data-role="header" id="header_orange">
		    	<?php require("topbanner.php"); ?>
			</div>
   
			<!-- nav bar -->
			<?php require("menu.php"); ?>
		
			<section class="checkin">
				<div class="checkin-body">
					<div class="container">
						<div class="row">
							<div class="col-md-8 col-md-offset-2">
								<div class="">
									<div class="col-md-4 col-md-offset-4">
									<img src="avatars/<?php echo ($avatar); ?>" width="100px" height="105px" class="img-circle"/>
									<h4> <?php echo $fname ." ". $lname;?> </h4>
									<h5> <?php echo $aebux; ?> AEBux | <a href="store.php">Buy Secrets</a> </h5>
									
									</div>
								 </div>
							</div>
						</div>
					</div>
				</div>
			</section>
		
			<div data-role="main" class="ui-content" id="checkin-form">
				<span id="check-in-title">
					<h2>CHECK IN</h2>
				</span>
		
				<form name="checkInForm" method="post" id="checkInForm" action="checkin_submit.php">
					<!-- room select -->
					<div id="checkin_location">
						<h2>Where are you?</h2>
						<span id="roomStatus"></span>
						
						<select size=1 name="levelSelect" id="levelSelect" onChange="ajaxRoomRetrieval(this.options[this.selectedIndex].value);">
							<option value="" selected>Level</option>
							<option value="1">Level 1</option>
							<option value="2">Level 2</option>
							<option value="3">Level 3</option>
							<option value="4">Level 4</option>
							<option value="5">Level 5</option>
							<option value="6">Level 6</option>
						</select>
						<select size=1 name="roomSelect" id="roomSelect" onChange="saveRoom();">
							<option value="" selected>Room</option>
						</select>
					</div>
					
					<!-- hash tags -->
					<div id="hash-tag">
						<h2>How are you feeling?</h2>
						<h2>Temperature</h2>
						<span id="hot" class="hashtag">#Hot</span>
						<span id="warm" class="hashtag">#Warm</span>
						<span id="cold" class="hashtag">#Cold</span>
						<h2>Brightness</h2>
						<span id="dark" class="hashtag">#Dark</span>
						<span id="comfy" class="hashtag">#Comfortable</span>
						<span id="bright" class="hashtag">#Bright</span>
						<h2>Crowd</h2>
						<span id="crowded" class="hashtag">#Crowded</span>
						<span id="peaceful" class="hashtag">#Peaceful</span>
					</div>
				
					<!-- comment and friends -->
					<div id="checkin_location" style="height:150px;"> 
					
						<!-- comment box -->
						<div style ="float:left; width: 50%; padding-right:10px">
							<h2>Additional comments (Optional)</h2>
							<textarea name="comment" id="comment" rows="1" style="height: 50px; max-height: 100px; resize: none;"></textarea>
						</div>
						
						<!-- friends -->
						<div style ="float:left;">
							<h2>Who are you with</h2>
							
							<a href="#" id ="friends"  data-toggle="popover" role="button">
								<img id="friend" src="images/AddFriends.png" alt="addFriends" height="30" style="margin-left:15px; margin-top: 3px;"></img>
							</a>
							
							<!-- can make this dynamic -->
							<div id="popover_content_wrapper" style="display: none">
								<div>
									<span id="friend1" class="hashtag">Zoe Stewart</span><br />
									<span id="friend2" class="hashtag">Adee</span><br />
									<span id="friend3" class="hashtag">Faisal</span><br />
								</div>
							</div>
						</div>
					</div>
					
					<div id="select2">
						<!-- temporary storage for room and tag choices -->
						<input type="hidden" name="room" id="room" value="" />
						<input type="hidden" name="tag1" id="tag1" value="" />
						<input type="hidden" name="tag2" id="tag2" value="" />
						<input type="hidden" name="tag3" id="tag3" value="" />
						<input type="hidden" name="tag4" id="tag4" value="" />
						
						<!-- submit button -->
						<span id="formStatus"></span>
						<button type="button" name="submitButton" id="submitButton" onClick="check();">Check in</button>
					</div>
				</form>
				
				<!-- ajax call to retrieve rooms for selected level -->
				<script>
					function ajaxRoomRetrieval(level) {
						$.ajax({
							url: 'roomlist.php?level=' + level,
							success: function(listCode) {
								$("#roomSelect").html(listCode);
							}
						});
					}
				</script>
				
				<!-- script to save room choice -->
				<script>
					var selectedRoom = document.getElementById("roomSelect");
					var room = document.getElementById("room");
					
					function saveRoom() {
						room.setAttribute("value", selectedRoom.value);
					}
				</script>
				
				<!-- stores tag choices
						and controls the tags lighting up with different colours when selected. -->
				<script>
					var hot = document.getElementById("hot");
					var warm = document.getElementById("warm");
					var cold = document.getElementById("cold");
					var dark = document.getElementById("dark");
					var bright = document.getElementById("bright");
					var comfy = document.getElementById("comfy");
					var crowded = document.getElementById("crowded");
					var peaceful = document.getElementById("peaceful");
					var tag1 = document.getElementById("tag1");
					var tag2 = document.getElementById("tag2");
					var tag3 = document.getElementById("tag3");
					var tag4 = document.getElementById("tag4");
					
					hot.style.cursor = 'pointer';
					hot.onclick = function(){
						if(document.getElementById("tag1").value == "warm" || document.getElementById("tag1").value == "cold"){						 
							warm.style.color= "white";
							cold.style.color= "white";
						}
						hot.style.color= "red";
						tag1.setAttribute("value","hot");
					};
					
					warm.style.cursor = 'pointer';
					warm.onclick = function(){
						if(document.getElementById("tag1").value == "hot" || document.getElementById("tag1").value == "cold"){						 
							hot.style.color= "white";
							cold.style.color= "white";
						}
						warm.style.color= "red";
						tag1.setAttribute("value","warm");					
					};
					
					cold.style.cursor = 'pointer';
					cold.onclick = function(){
						if(document.getElementById("tag1").value == "warm" || document.getElementById("tag1").value == "hot"){						 
							hot.style.color= "white";
							warm.style.color= "white";
						}
						cold.style.color= "red";
						tag1.setAttribute("value","cold");					
					};
					
					dark.style.cursor = 'pointer';
					dark.onclick = function(){
						if(document.getElementById("tag2").value == "bright" || document.getElementById("tag2").value == "comfy"){						 
							bright.style.color= "white";
							comfy.style.color= "white";
						}
						dark.style.color= "blue";
						tag2.setAttribute("value","dark");					
					};
					
					comfy.style.cursor = 'pointer';
					comfy.onclick = function(){
						if(document.getElementById("tag2").value == "bright" || document.getElementById("tag2").value == "dark"){						 
							bright.style.color= "white";
							dark.style.color= "white";
						}
						comfy.style.color= "blue";
						tag2.setAttribute("value","comfy");					
					};
					
					bright.style.cursor = 'pointer';
					bright.onclick = function(){
						if(document.getElementById("tag2").value == "comfy" || document.getElementById("tag2").value == "dark"){						 
							comfy.style.color= "white";
							dark.style.color= "white";
						}
						bright.style.color= "blue";
						tag2.setAttribute("value","bright");
					};
					
					crowded.style.cursor = 'pointer';
					crowded.onclick = function(){
						if(document.getElementById("tag3").value == "peaceful"){						 
							peaceful.style.color= "white";
						}
						crowded.style.color= "green";
						tag3.setAttribute("value","crowded");						
					};
					
					peaceful.style.cursor = 'pointer';
					peaceful.onclick = function(){
						if(document.getElementById("tag3").value == "crowded"){						 
							crowded.style.color= "white";
						}
						peaceful.style.color= "green";
						tag3.setAttribute("value","peaceful");						
					};

					friend1.style.cursor = 'pointer';
					friend1.onclick = function(){
						if(document.getElementById("tag4").value == "friend2" || document.getElementById("tag4").value == "friend3" ){						 
							friend2.style.color= "white";
						}
						friend1.style.color= "blue";
						tag4.setAttribute("value","friend1");
					};
					
					friend2.style.cursor = 'pointer';
					friend2.onclick = function(){
						if(document.getElementById("tag4").value == "friend1" || document.getElementById("tag4").value == "friend2" ){						 
							friend1.style.color= "white";
						}
						friend2.style.color= "blue";
						tag4.setAttribute("value","friend2");
					};
					
					friend3.style.cursor = 'pointer';
					friend3.onclick = function(){
						if(document.getElementById("tag4").value == "friend1" || document.getElementById("tag4").value == "friend2" ){						 
							friend1.style.color= "white";
						}
						friend3.style.color= "blue";
						tag4.setAttribute("value","friend3");
					};
				</script>
			</div>
		</div>
	</body>
</html>
