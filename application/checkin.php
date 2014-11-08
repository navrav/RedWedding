<!DOCTYPE html>
<?php

/*****************************************
 *	CHECKIN.PHP - Form page for check-ins
 *
 *		Visual elements
 *			- Room selection
 *			- Hashtags
 *			- Comment box
 *			- Friends list
 *			- Submit button
 *		
 *		Functional elements
 *			- Room validation
 *			- Friends popover
 *			- Friends list generator
 *			- Room list retrieval
 *			- Save room choice
 *			- Save friend choice
 *			- Hashtag control
 */

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
		<link rel="icon" href="/icons/favicon.ico">
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		
		<link rel="stylesheet" href="css/jquery.mobile-1.4.2.css" />
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/main.css" type="text/css" />
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" />
		
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="js/jquery.mobile-1.4.2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		
		<!-- room validation -->
		<script>
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
		
			$(function() {
				$("#friendButton").popover({
					html : true,
					title: 'Friends',
					placement: 'top',
					content: function() {
						return $('#popover_content_wrapper').html();
					}
				});
			});
			
			// populate friend list; runs on page load (refer to <body> tag)
			function ajaxFriendRetrieval() {
				$.ajax({
					url: 'friendlist.php',
					success: function(listCode) {
						$("#popover_content_wrapper").html(listCode);
					}
				});
			}
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
	<body onload="ajaxFriendRetrieval();">
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
		
			<div data-role="main" class="ui-content" id="checkin-form-section">
				<span id="check-in-title">
					<h2>CHECK IN</h2>
				</span>
		
				<form name="checkInForm" method="post" id="checkInForm" action="checkin_submit.php">
					<!-- room select -->
					<div id="checkin_location">
						<h2>Where are you?</h2>
						<span id="roomStatus"></span>
						
						<select size=1 name="levelSelect" id="levelSelect" onchange="ajaxRoomRetrieval(this.options[this.selectedIndex].value);">
							<option value="" selected>Level</option>
							<option value="1">Level 1</option>
							<option value="2">Level 2</option>
							<option value="3">Level 3</option>
							<option value="4">Level 4</option>
							<option value="5">Level 5</option>
							<option value="6">Level 6</option>
						</select>
						<select size=1 name="roomSelect" id="roomSelect" onchange="saveRoom();">
							<option value="" selected>Room</option>
						</select>
					</div>
					
					<!-- hash tags -->
					<div id="hash-tag">
						<h2>How are you feeling? (Click tags to select/deselect.)</h2>
						<h2>Temperature</h2>
						<span id="hot" class="hashtag">#hot</span>
						<span id="warm" class="hashtag">#warm</span>
						<span id="cold" class="hashtag">#cold</span>
						<h2>Brightness</h2>
						<span id="dark" class="hashtag">#dark</span>
						<span id="comfy" class="hashtag">#comfortable</span>
						<span id="bright" class="hashtag">#bright</span>
						<h2>Crowd</h2>
						<span id="crowded" class="hashtag">#crowded</span>
						<span id="peaceful" class="hashtag">#peaceful</span>
						<h2>Noise</h2>
						<span id="noisy" class="hashtag">#noisy</span>
						<span id="fine" class="hashtag">#fine</span>
						<span id="quiet" class="hashtag">#quiet</span>
						<h2>Humidity</h2>
						<span id="humid" class="hashtag">#humid</span>
						<span id="normal" class="hashtag">#normal</span>
						<span id="dry" class="hashtag">#dry</span>
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
							<h2>Are you with a friend? (Optional)</h2>
							
							<!-- button -->
							<a href="#" id ="friendButton" data-toggle="popover" data-trigger="focus" role="button" tabindex="0">
								<img id="friendButtonImage" src="images/AddFriends.png" alt="addFriends" height="30"></img>
							</a><br>
							<!-- status message -->
							<span id="friendStatus">I am with: no one</span>
							
							<div id="popover_content_wrapper" style="display: none">
								<!-- Friends will be generated here. -->
								<!-- example: <span id="friend1" class="hashtag" onclick="saveFriend(this.id);" style="cursor: pointer">John Doe</span><br /> -->
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
						<input type="hidden" name="tag5" id="tag5" value="" />
						<input type="hidden" name="friend" id="friend" value="" />
						
						<!-- submit button -->
						<span id="formStatus"></span>
						<button type="button" name="submitButton" id="submitButton" onclick="check();">Check in</button>
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
				
				<!-- save room choice -->
				<script>
					var selectedRoom = document.getElementById("roomSelect");
					var room = document.getElementById("room");
					
					function saveRoom() {
						room.setAttribute("value", selectedRoom.value);
					}
				</script>
				
				<!-- save friend choice and update friendStatus -->
				<script>
					var friend = document.getElementById("friend");
					var friendStatus = document.getElementById("friendStatus");
					
					function saveFriend(friendSpanID) {
						var selectedFriend = document.getElementById(friendSpanID);
					
						friend.setAttribute("value", friendSpanID);
						if (friendSpanID == "friend00") {
							$("#friendStatus").text("I am with: no one");
						} else {
							$("#friendStatus").text("I am with: " + selectedFriend.innerHTML);
						}
					}
				</script>
				
				<!-- save tag choices; tag light-up control; tag colour -->
				<script>
					var hot = document.getElementById("hot");
					var warm = document.getElementById("warm");
					var cold = document.getElementById("cold");
					var dark = document.getElementById("dark");
					var bright = document.getElementById("bright");
					var comfy = document.getElementById("comfy");
					var crowded = document.getElementById("crowded");
					var peaceful = document.getElementById("peaceful");
					var noisy = document.getElementById("noisy");
					var fine = document.getElementById("fine");
					var quiet = document.getElementById("quiet");
					var humid = document.getElementById("humid");
					var normal = document.getElementById("normal");
					var dry = document.getElementById("dry");
					var tag1 = document.getElementById("tag1");
					var tag2 = document.getElementById("tag2");
					var tag3 = document.getElementById("tag3");
					var tag4 = document.getElementById("tag4");
					var tag5 = document.getElementById("tag5");
					
					// set/unset tag1
					hot.style.cursor = 'pointer'; // set cursor shape (to indicate clickable object)
					hot.onclick = function() {    // when clicked,
					
						// unset all buttons
						hot.style.color = "white";
						warm.style.color = "white";
						cold.style.color = "white";
						
						if (document.getElementById("tag1").value == "hot") {	// if tag1 is already "hot"
							tag1.setAttribute("value", "");							// clear tag1 value
						} else {												// otherwise
							hot.style.color = "orange";								// set hot button
							tag1.setAttribute("value", "hot");						// set tag1 to "hot"
						}
					};
					
					warm.style.cursor = 'pointer';
					warm.onclick = function() {
						hot.style.color = "white";
						warm.style.color = "white";
						cold.style.color = "white";
						
						if (document.getElementById("tag1").value == "warm") {
							tag1.setAttribute("value", "");
						} else {
							warm.style.color = "orange";
							tag1.setAttribute("value", "warm");
						}
					};
					
					cold.style.cursor = 'pointer';
					cold.onclick = function() {
						hot.style.color = "white";
						warm.style.color = "white";
						cold.style.color = "white";
						
						if (document.getElementById("tag1").value == "cold") {
							tag1.setAttribute("value", "");
						} else {
							cold.style.color = "orange";
							tag1.setAttribute("value", "cold");
						}
					};
					
					// set/unset tag2
					dark.style.cursor = 'pointer';
					dark.onclick = function() {
						bright.style.color = "white";
						comfy.style.color = "white";
						dark.style.color = "white";
						
						if (document.getElementById("tag2").value == "dark") {
							tag2.setAttribute("value", "");
						} else {
							dark.style.color = "yellow";
							tag2.setAttribute("value", "dark");
						}
					};
					
					comfy.style.cursor = 'pointer';
					comfy.onclick = function() {
						bright.style.color = "white";
						comfy.style.color = "white";
						dark.style.color = "white";
						
						if (document.getElementById("tag2").value == "comfy") {
							tag2.setAttribute("value", "");
						} else {
							comfy.style.color = "yellow";
							tag2.setAttribute("value", "comfy");
						}
					};
					
					bright.style.cursor = 'pointer';
					bright.onclick = function() {
						bright.style.color = "white";
						comfy.style.color = "white";
						dark.style.color = "white";
						
						if (document.getElementById("tag2").value == "bright") {
							tag2.setAttribute("value", "");
						} else {
							bright.style.color = "yellow";
							tag2.setAttribute("value", "bright");
						}
					};
					
					// set/unset tag3
					crowded.style.cursor = 'pointer';
					crowded.onclick = function() {
						crowded.style.color = "white";
						peaceful.style.color = "white";
						
						if (document.getElementById("tag3").value == "crowded") {
							tag3.setAttribute("value", "");
						} else {
							crowded.style.color = "green";
							tag3.setAttribute("value", "crowded");
						}
					};
					
					peaceful.style.cursor = 'pointer';
					peaceful.onclick = function() {
						crowded.style.color = "white";
						peaceful.style.color = "white";
						
						if (document.getElementById("tag3").value == "peaceful") {
							tag3.setAttribute("value", "");
						} else {
							peaceful.style.color = "green";
							tag3.setAttribute("value", "peaceful");
						}
					};
					
					// set/unset tag4
					noisy.style.cursor = 'pointer';
					noisy.onclick = function() {
						noisy.style.color = "white";
						fine.style.color = "white";
						quiet.style.color = "white";
						
						if (document.getElementById("tag4").value == "noisy") {
							tag4.setAttribute("value", "");
						} else {
							noisy.style.color = "red";
							tag4.setAttribute("value", "noisy");
						}
					};
					
					fine.style.cursor = 'pointer';
					fine.onclick = function() {
						noisy.style.color = "white";
						fine.style.color = "white";
						quiet.style.color = "white";
						
						if (document.getElementById("tag4").value == "fine") {
							tag4.setAttribute("value", "");
						} else {
							fine.style.color = "red";
							tag4.setAttribute("value", "fine");
						}
					};
					
					quiet.style.cursor = 'pointer';
					quiet.onclick = function() {
						noisy.style.color = "white";
						fine.style.color = "white";
						quiet.style.color = "white";
						
						if (document.getElementById("tag4").value == "quiet") {
							tag4.setAttribute("value", "");
						} else {
							quiet.style.color = "red";
							tag4.setAttribute("value", "quiet");
						}
					};
					
					// set/unset tag5
					humid.style.cursor = 'pointer';
					humid.onclick = function() {
						humid.style.color = "white";
						normal.style.color = "white";
						dry.style.color = "white";
						
						if (document.getElementById("tag5").value == "humid") {
							tag5.setAttribute("value", "");
						} else {
							humid.style.color = "blue";
							tag5.setAttribute("value", "humid");
						}
					};
					
					normal.style.cursor = 'pointer';
					normal.onclick = function() {
						humid.style.color = "white";
						normal.style.color = "white";
						dry.style.color = "white";
						
						if (document.getElementById("tag5").value == "normal") {
							tag5.setAttribute("value", "");
						} else {
							normal.style.color = "blue";
							tag5.setAttribute("value", "normal");
						}
					};
					
					dry.style.cursor = 'pointer';
					dry.onclick = function() {
						humid.style.color = "white";
						normal.style.color = "white";
						dry.style.color = "white";
						
						if (document.getElementById("tag5").value == "dry") {
							tag5.setAttribute("value", "");
						} else {
							dry.style.color = "blue";
							tag5.setAttribute("value", "dry");
						}
					};
				</script>
			</div>
		</div>
	</body>
</html>
