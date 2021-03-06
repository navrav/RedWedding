<!DOCTYPE html>
<?php

/**************************************
 *	SURVEY.PHP - Form page for surveys
 *
 *		Visual elements
 *			- Room selection
 *			- Sliders
 *			- Comment box
 *			- Submit button
 *		
 *		Functional elements
 *			- Slider settings
 *			- Room validation
 *			- Room list retrieval
 *			- Save room choice
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
		<title>AEB Space - Survey</title>
		<link rel="icon" href="/icons/favicon.ico">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="css/jquery.mobile-1.4.2.css" />
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/main.css" type="text/css" />
		
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="js/jquery.mobile-1.4.2.js"></script>
		<script src="js/jquery-1.11.0.min.js"></script>
		<script src="js/ion.rangeSlider.min.js"></script>

		<link rel="stylesheet" href="css/normalize.min.css" />
   		<link rel="stylesheet" href="css/ion.rangeSlider.css" />
    	<link rel="stylesheet" href="css/ion.rangeSlider.skinNice.css" />
	
		<!-- slider settings -->
		<script>
			$(document).ready(function() {
				$("#slider1").ionRangeSlider({
					// slider attributes
					type: 'single',
					min: 1,
					max: 9,
					step: 1,
					prettify: false,
					hideMinMax: true,
					hasGrid: true,
					
					// save slider value
					onChange: function() {
						$("#tag1").val($("#slider1").val());
					}
				});
			});
		
			$(document).ready(function() {
				$("#slider2").ionRangeSlider({
					type: 'single',
					min: 1,
					max: 9,
					step: 1,
					prettify: false,
					hideMinMax: true,
					hasGrid: true,
					
					onChange: function() {
						$("#tag2").val($("#slider2").val());
					}
				});
			});
		
			$(document).ready(function() {
				$("#slider3").ionRangeSlider({
					type: 'single',
					min: 1,
					max: 9,
					step: 1,
					prettify: false,
					hideMinMax: true,
					hasGrid: true,
					
					onChange: function() {
						$("#tag3").val($("#slider3").val());
					}
				});
			});
		
			$(document).ready(function() {
				$("#slider4").ionRangeSlider({
					type: 'single',
					min: 1,
					max: 9,
					step: 1,
					prettify: false,
					hideMinMax: true,
					hasGrid: true,
					
					onChange: function() {
						$("#tag4").val($("#slider4").val());
					}
				});
			});
		
			$(document).ready(function() {
				$("#slider5").ionRangeSlider({
					type: 'single',
					min: 1,
					max: 9,
					step: 1,
					prettify: false,
					hideMinMax: true,
					hasGrid: true,
					
					onChange: function() {
						$("#tag5").val($("#slider5").val());
					}
				});
			});
		</script>
		
		<!-- room validation -->
		<script>
			function check() {
				var selectedRoom = document.getElementById("room").value;
				var form = document.getElementById("surveyForm");
			
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
	</head>
	<body>
		<!-- top bar -->
		<div data-role="page" data-theme="b">
			<div data-role="header" id="header_yellow">
			    <?php require("topbanner.php"); ?>
			</div>
			
			<!-- nav bar -->
	   	 	<?php require("menu.php"); ?>
			
			<section class="survey">
				<div class="survey-body">
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
	    	
	    	<div data-role="main" class="ui-content" id="survey-form-section">
				<span id="survey-title">
					<h2>SURVEY</h2>
				</span>
			
				<form name="surveyForm" method="post" id="surveyForm" action="survey_submit.php">
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
					
					<!-- sliders -->
					<div id="survey-dark">
						<h4> Room Temperature (1 = cold, 9 = hot)</h4>
						<input type="text" id="slider1" name="slider1" value="" />
					</div>
					
					<div id="survey-light">
						<h4> Humidity (1 = dry, 9 = humid)</h4>
						<input type="text" id="slider2" name="slider2" value="" />
					</div>
					
					<div id="survey-dark">
						<h4> Noise Level (1 = quiet, 9 = noisy)</h4>
						<input type="text" id="slider3" name="slider3" value="" />
					</div>
					
					<div id="survey-light">
						<h4> Light Levels (1 = dark, 9 = bright)</h4>
						<input type="text" id="slider4" name="slider4" value="" />
					</div>
					
					<div id="survey-dark">
						<h4> Crowd (1 = peaceful, 9 = crowded)</h4>
						<input type="text" id="slider5" name="slider5" value="" />
					</div>
					
					<!-- comments -->
					<div id="survey-light">
						<h4> Additional comments (Optional) </h4>
						<textarea name="comment" id="comment" rows="1" style="height: 50px; max-height: 100px; resize: none;"></textarea>
					</div>
					
					<div id="submitSection">
						<!-- temporary storage for room and tag choices -->
						<input type="hidden" name="room" id="room" value="" />
						<input type="hidden" name="tag1" id="tag1" value="" />
						<input type="hidden" name="tag2" id="tag2" value="" />
						<input type="hidden" name="tag3" id="tag3" value="" />
						<input type="hidden" name="tag4" id="tag4" value="" />
						<input type="hidden" name="tag5" id="tag5" value="" />
						
						<!-- submit button -->
						<span id="formStatus"></span>
						<button type="button" name="submitButton" id="submitButton" onclick="check();">Submit</button>
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
			</div>
		</div>
	</body>
</html>


