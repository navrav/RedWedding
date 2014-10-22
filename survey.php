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
		<title>AEB Space - Survey</title>
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
		
		<script>
			// I am hard coding this but there are way to call from tables
			// in php that would make this a lot easier. 
		
			function setOptions(chosen) {
				console.log(chosen);

				var selbox = document.surveyForm.opttwo;
				
				console.log(selbox);
				
				selbox.options.length = 0;
				
				if (chosen == " ") {
					selbox.options[selbox.options.length] = new Option('Floor',' ');
				} else if (chosen == "1") {
					selbox.options[selbox.options.length] = new Option('101','101');
					selbox.options[selbox.options.length] = new Option('102','102');
					selbox.options[selbox.options.length] = new Option('103','103');
					selbox.options[selbox.options.length] = new Option('104','104');
					selbox.options[selbox.options.length] = new Option('105','105');
					selbox.options[selbox.options.length] = new Option('106','106');
				} else if (chosen == "2") {
					selbox.options[selbox.options.length] = new Option('201','201');
					selbox.options[selbox.options.length] = new Option('202','202');
					selbox.options[selbox.options.length] = new Option('203','203');
					selbox.options[selbox.options.length] = new Option('204','204');
					selbox.options[selbox.options.length] = new Option('205','205');
					selbox.options[selbox.options.length] = new Option('206','206');
				} else if (chosen == "3") {
					selbox.options[selbox.options.length] = new Option('301','301');
					selbox.options[selbox.options.length] = new Option('302','302');
					selbox.options[selbox.options.length] = new Option('316','316');
					selbox.options[selbox.options.length] = new Option('317','317');
					selbox.options[selbox.options.length] = new Option('318','318');
					selbox.options[selbox.options.length] = new Option('319','319');
				} else if (chosen == "4") {
					selbox.options[selbox.options.length] = new Option('401','401');
					selbox.options[selbox.options.length] = new Option('402','402');
					selbox.options[selbox.options.length] = new Option('405','405');
					selbox.options[selbox.options.length] = new Option('406','406');
					selbox.options[selbox.options.length] = new Option('407','407');
					selbox.options[selbox.options.length] = new Option('408','408');
				} else if (chosen == "5") {
					selbox.options[selbox.options.length] = new Option('506','506');
					selbox.options[selbox.options.length] = new Option('507','507');
					selbox.options[selbox.options.length] = new Option('513','513');
					selbox.options[selbox.options.length] = new Option('519','519');
					selbox.options[selbox.options.length] = new Option('520','520');
					selbox.options[selbox.options.length] = new Option('522','522');
				} else if (chosen == "6") {
					selbox.options[selbox.options.length] = new Option('603','603');
					selbox.options[selbox.options.length] = new Option('605','605');
					selbox.options[selbox.options.length] = new Option('606','606');
					selbox.options[selbox.options.length] = new Option('608','608');
					selbox.options[selbox.options.length] = new Option('610','610');
					selbox.options[selbox.options.length] = new Option('612','612');
				}
			}
		</script>
	
		<script>
			// Slider settings
			$(document).ready(function() {
				$("#slider1").ionRangeSlider({
					type: 'single',
					min: 1,
					max: 9,
					step: 1,
					prettify: false,
					hideMinMax: true,
					//values: ["cold", "cool", "mild", "warm", "hot"],
					hasGrid: true,
					
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
					//values: ["dry", "normal", "humid"],
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
					//values: ["quiet", "fine", "noisy"],
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
					//values: ["dark", "comfortable", "bright"],
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
					//values: ["peaceful", "crowded"],
					hasGrid: true,
					
					onChange: function() {
						$("#tag5").val($("#slider5").val());
					}
				});
			});
		</script>
		
		<script>
			// room validation
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
	    	
	    	<div data-role="main" class="ui-content" id="survey-form">
				<span id="survey-title">
					<h2>SURVEY</h2>
				</span>
			
				<form name="surveyForm" method="post" id="surveyForm" action="survey_submit.php">
					<!-- room select -->
					<div id="checkin_location">
						<h2>Where are you?</h2>
						<span id="roomStatus"></span>
						
						<select name="rno" size="1" onchange="setOptions(this.options[this.selectedIndex].value);" id="levelID">
							<option value=" " selected="selected">Level</option>
							<option value="1">Level 1</option>
							<option value="2">Level 2</option>
							<option value="3">Level 3</option>
							<option value="4">Level 4</option>
							<option value="5">Level 5</option>
							<option value="6">Level 6</option>
						</select>
						<select name="opttwo" size="1" id="opttwo" onchange="saveRoom()">
							<option value=" " selected="selected">Change level for room list</option>
						</select>
					</div>
					
					<div id="hash-tag">
						<h4> Room Temperature (1 = cold, 9 = hot)</h4>
						<input type="text" id="slider1" name="slider1" value="" />
					</div>
					
					<div id="checkin_location">
						<h4> Humidity (1 = dry, 9 = humid)</h4>
						<input type="text" id="slider2" name="slider2" value="" />
					</div>
					
					<div id="hash-tag">
						<h4> Noise Level (1 = quiet, 9 = noisy)</h4>
						<input type="text" id="slider3" name="slider3" value="" />
					</div>
					
					<div id="checkin_location">
						<h4> Light Levels (1 = dark, 9 = bright)</h4>
						<input type="text" id="slider4" name="slider4" value="" />
					</div>
					
					<div id="hash-tag">
						<h4> Crowd (1 = peaceful, 9 = crowded)</h4>
						<input type="text" id="slider5" name="slider5" value="" />
					</div>
					
					<div id="checkin_location">
						<h4> Additional comments (Optional) </h4>
						<textarea name="comment" id="comment" rows="1" style="height: 50px; max-height: 100px; resize: none;"></textarea>
					</div>
					
					<div id="submitSection">
						<input type="hidden" name="room" id="room" value="" />
						<input type="hidden" name="tag1" id="tag1" value="" />
						<input type="hidden" name="tag2" id="tag2" value="" />
						<input type="hidden" name="tag3" id="tag3" value="" />
						<input type="hidden" name="tag4" id="tag4" value="" />
						<input type="hidden" name="tag5" id="tag5" value="" />
						<span id="formStatus"></span>
						<button type="button" name="submitButton" id="submitButton" onClick="check();">Submit</button>
					</div>
					
					<script>
						// function to save room choice
						var selectedRoom = document.getElementById("opttwo");
						var room = document.getElementById("room");
						
						function saveRoom() {
							room.setAttribute("value", selectedRoom.value);
						}
					</script>
				</form>
			</div>
		</div>
	</body>
</html>


