<!DOCTYPE html>
<html>
	<head>
		<title>AEB Space - Survey</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="css/jquery.mobile-1.4.2.css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css" type="text/css">
		
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="js/jquery.mobile-1.4.2.js"></script>
		<script src="js/jquery-1.11.0.min.js"></script>
		<script src="js/ion.rangeSlider.min.js"></script>

		<link rel="stylesheet" href="css/normalize.min.css" />
   		<link rel="stylesheet" href="css/ion.rangeSlider.css" />
    	<link rel="stylesheet" href="css/ion.rangeSlider.skinNice.css" />
		
		<script>
			function Submit() {
				var Level = document.getElementById("levelID").value;
				var Room = document.getElementById("roomID").value;
				
				if (Level == " " || Room == " ") {
  					console.log("level is null");
  					alert("Please enter the level and room you are in");
  				} else {
  					console.log(Level);
  					setTimeout(function() {window.location.href = "feed.php"}, 3000);
					document.getElementById('layover').style.display = "block";
					document.getElementById('confirmpop').style.display = "block";
  				}

				/*
					var Level = $('#rno option:selected').val();
					var Room = $('#opttwo option:selected').val();
					var comment = $('#comment').val();
					
					console.log(Level + Room + comment);
				
					if (Level == " " || Room == " ") {
						alert("Please enter the Level and room you are in");
					} else {
						setTimeout(function() {window.location.href = "feed.php"}, 3000);
						document.getElementById('layover').style.display = "block";
						document.getElementById('confirmpop').style.display = "block";
					}
				*/
			
			}
		</script>
		
		<script>
			// I am hard coding this but there are way to call from tables
			// in php that would make this a lot easier. 
		
			function setOptions(chosen) {
				console.log(chosen);

				var selbox = document.submit.opttwo;
				
				console.log(selbox);
				
				selbox.options.length = 0;
				
				if (chosen == " ") {
					selbox.options[selbox.options.length] = new Option('Floor',' ');
				} else if (chosen == "1") {
					selbox.options[selbox.options.length] = new Option('101','oneone');
					selbox.options[selbox.options.length] = new Option('102','onetwo');
					selbox.options[selbox.options.length] = new Option('103','onethree');
					selbox.options[selbox.options.length] = new Option('104','onefour');
					selbox.options[selbox.options.length] = new Option('105','onefive');
					selbox.options[selbox.options.length] = new Option('106','onesix');
				} else if (chosen == "2") {
					selbox.options[selbox.options.length] = new Option('201','twoone');
					selbox.options[selbox.options.length] = new Option('202','twotwo');
					selbox.options[selbox.options.length] = new Option('203','twothree');
					selbox.options[selbox.options.length] = new Option('204','twofour');
					selbox.options[selbox.options.length] = new Option('205','twofive');
					selbox.options[selbox.options.length] = new Option('206','twosix');
				} else if (chosen == "3") {
					selbox.options[selbox.options.length] = new Option('301','threeone');
					selbox.options[selbox.options.length] = new Option('302','threetwo');
					selbox.options[selbox.options.length] = new Option('316','threethree');
					selbox.options[selbox.options.length] = new Option('317','threefour');
					selbox.options[selbox.options.length] = new Option('318','threefive');
					selbox.options[selbox.options.length] = new Option('319','threesix');
				} else if (chosen == "4") {
					selbox.options[selbox.options.length] = new Option('401','foureone');
					selbox.options[selbox.options.length] = new Option('402','fourtwo');
					selbox.options[selbox.options.length] = new Option('405','fourthree');
					selbox.options[selbox.options.length] = new Option('406','fourfour');
					selbox.options[selbox.options.length] = new Option('407','fourfive');
					selbox.options[selbox.options.length] = new Option('408','foursix');
				} else if (chosen == "5") {
					selbox.options[selbox.options.length] = new Option('506','fiveone');
					selbox.options[selbox.options.length] = new Option('507','fivetwo');
					selbox.options[selbox.options.length] = new Option('513','fivethree');
					selbox.options[selbox.options.length] = new Option('519','fivefour');
					selbox.options[selbox.options.length] = new Option('520','fivefive');
					selbox.options[selbox.options.length] = new Option('522','fivesix');
				} else if (chosen == "6") {
					selbox.options[selbox.options.length] = new Option('603','sixone');
					selbox.options[selbox.options.length] = new Option('605','sixtwo');
					selbox.options[selbox.options.length] = new Option('606','sixthree');
					selbox.options[selbox.options.length] = new Option('608','sixfour');
					selbox.options[selbox.options.length] = new Option('610','sixfive');
					selbox.options[selbox.options.length] = new Option('612','sixsix');
				}
			}
		</script>
	
		<script>
			$(document).ready(function(){
				$("#slider").ionRangeSlider({
					min: 0,
					max: 10,
					type: 'single',
					step: 1,
					prettify: false,
					hideMinMax: true,
					hasGrid: true,
					values: ["cold", "cool", "good", "warm", "hot"],
				});
			});
		</script>
		
		<script>
			$(document).ready(function(){
				$("#slider2").ionRangeSlider({
					min: 0,
					max: 10,
					type: 'single',
					step: 1,
					prettify: false,
					hideMinMax: true,
					hasGrid: true,
					values: ["good", "little humid", "very humid"],
				});
			});
		</script>
		
		<script>
			$(document).ready(function(){
				$("#slider3").ionRangeSlider({
					min: 0,
					max: 10,
					type: 'single',
					step: 1,
					prettify: false,
					hideMinMax: true,
					hasGrid: true,
					values: ["good", "little noise", "loud"],
				});
			});
		</script>
		
		<script>
			$(document).ready(function(){
				$("#slider4").ionRangeSlider({
					min: 0,
					max: 10,
					type: 'single',
					step: 1,
					prettify: false,
					hideMinMax: true,
					hasGrid: true,
					values: ["too dark", "good light", "very bright"],
				});
			});
		</script>
		
		<style>
			#header_yellow {
				background-color: #fdd017;
			}
			
			#header_yellow a {
				color: #fdd017;
			}
			
			#header_yellow a {
				background-color: #fff;
				margin-top:20px;
				border-radius: 50%;
				text-shadow:none;
				border:none;
				padding:0.8em 1em;
				margin-left: 10px;
			}
			
			#extendedsurvey h2, h4 {
				color: #f1e75a;
			}		
		</style>
	</head>
	
	<body>
		<div data-role="page" data-theme="b">
			<div data-role="header" id="header_yellow">
			    <?php require("topbanner.php"); ?>
			</div>
			<!--end top bar-->
	  
	  
			<!--nav bar-->

	   	 	<?php require("menu.php"); ?>
		
			<!--end nav bar-->
	    	
	    	
	    	<div data-role="main" class="ui-content" id="extendedsurvey">
	    	
				<h2>Give Some More Feedback?</h2>
			
				<form name="submit">
					<div id="checkin_location">
						<h4>Where are you?</h4>
						
						<select name="rno" size="1" onchange="setOptions(this.options[this.selectedIndex].value);" id="levelID">
							<option value=" " selected="selected">Level</option>
							<option value="1">Level 1</option>
							<option value="2">Level 2</option>
							<option value="3">Level 3</option>
							<option value="4">Level 4</option>
							<option value="5">Level 5</option>
							<option value="6">Level 6</option>
						</select>
						<select name="opttwo" size="1" id="roomID">
							<option value=" " selected="selected">Room</option>
						</select>
					</div>
					
					<div id="hash-tag">
						<h4> Room Temperature </h4>
						<input type="text" id ="slider" name ="slider" value = "" />
					</div>
					
					<div id="checkin_location">
						<h4> Humidity </h4>
						<input type="text" id ="slider2" name ="slider" value = "" />
					</div>
					
					<div id="hash-tag">
						<h4> Noise Level </h4>
						<input type="text" id ="slider3" name ="slider" value = "" />
					</div>
					
					<div id="checkin_location">
						<h4> Light Levels </h4>
						<input type="text" id ="slider4" name ="slider" value = "" />
					</div>
					
					<div id="select2">
						<input type="button" name="submit" id="submit" value="Submit" onclick="Submit();"/> 
					</div>
				</form>

				<div id="layover" style="display:none; position:fixed; top:0%; left:0%; width:100%; height:100%; background-color:black; opacity: .50;" > </div>
				
				<div id="confirmpop" style="display:none; position:fixed; left:30%; right:30%; top:40%; "> 
					<div class="modal-content">
						<div  id="checkin_location">
							<p>Thank you for your submission, 10 AEBuxs have been added to your account </p>
						</div>
					</div>
				</div>
				
				<div id="errorpop" style="display:none; position:fixed; left:30%; right:30%; top:40%; "> 
					<div class="modal-content">
						<div  id="checkin_location">
							<p>Please select a level and floor</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>


