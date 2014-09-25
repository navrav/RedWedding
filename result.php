<?php 
 include_once("servercon.php");
?>
<!DOCTYPE html>
<html>
	<head>
		<title>AEB Space - Map</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="css/jquery.mobile-1.4.2.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css" type="text/css">
		
		
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="js/jquery.mobile-1.4.2.js"></script>
			
		<style>
			#choosing{
				margin-top:0px;
				padding: 15px;
				
				font-family: "HelveticaNeueUltraLight", "HelveticaNeue-Ultra-Light", "Helvetica Neue Ultra Light", "HelveticaNeue", "Helvetica Neue", 'TeXGyreHerosRegular', "Arial", sans-serif;
				
				color:black;
			}
			#choosing h5{
				font-size: 16px;
				color: #3d8cea;
				text-shadow: none;
				font-weight: bold;
			}
			
			#h2 { 
			   position: absolute; 
			   top: 4px; 
			   left:17px;
			   width: 100%; 
			   font-size:10px;
			}
			
			.desc{
				position: absolute;
				left: 70px;
			}

			
		</style>
	</head>

	<body>
		
		<!--top bar-->
		<div data-role="page" data-theme="b" style="background-color:white;">
		  <div data-role="header" id="header_blue">
		    <?php require("topbanner.php"); ?>
		</div>
		<!--end top bar-->
  
  
		<!--nav bar-->

   	 	<?php require("menu.php"); ?>
	
		<!--end nav bar-->
    
  
  <div data-role="main" class="ui-content" >
		
		<div id="choosing">	<h5>Floor Level</h5>
		<div width: 100%; padding-right:10px ">
		<select name="flo" id="flo" onChange="showHeat(document.getElementById('flo').value,document.getElementById('categ').value)">
						<option value="1">1</option> 
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option> 
						<option value="5">5</option>
						<option value="6">6</option>
		</select>
		</div>
		</br>
		<h5>Sort By?</h5>
		
		<select name="flo" id="categ" onChange="showHeat(document.getElementById('flo').value,document.getElementById('categ').value)">
						<option value="8">Temperature</option>
						<option value="9">Light</option>
						<option value="10">Noise</option>
						<option value="9">Light</option>
						<option value="10">Noise</option> 
						<option value="11">Friend Checkins</option>
						<option value="12">Services</option> 
		</select>
		</div>
		<div id="heatmapArea" style="position:relative; width:300px; height:450px; background-image:url('images/testmap.JPG');"> 
			
			
			<h2 id="temp"><span style ="color: white; 
			   font: bold 16px Helvetica, Sans-Serif; 
			   letter-spacing: -1px;  
			   background: rgb(0, 0, 0); /* fallback color */
			   background: rgba(0, 0, 0, 0.7);
			   padding: 10px; ">25 &deg</span></h2>
			
			<div id="circle"></div>
			<div id="circle2"></div>
			<div id="circle3"></div>
			<div id="circle4"></div>
		</div>
		
		<div id="legend" class="leg"></div><div class="desc" id="d1"></div>
		<div id="legend2" class="leg"></div><div class="desc" id="d2"></div>
		<div id="legend3" class="leg"></div><div class="desc" id="d3"></div>
		<div id="legend4" class="leg"></div><div class="desc" id="d4"></div>
		<div id="legend5" class="leg"></div><div class="desc" id="d5"></div>
		
		<div id="test">		

		</div>

<?php 
$conNew=mysqli_connect("deco3801-01.zones.eait.uq.edu.au","root","Viking8Chief+latch","aeb");
if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      	$warm10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 101 AND tag = 'warm'");
      	$hot10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 101  AND tag = 'hot'");
      	$cold10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 101  AND tag = 'cold'");
		
		$warm22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 102 AND tag = 'warm'");
      	$hot22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 102 AND tag = 'hot'");
      	$cold22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 102 AND tag = 'cold'");
		
		$warm33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 103 AND tag = 'warm'");
      	$hot33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 103 AND tag = 'hot'");
      	$cold33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 103 AND tag = 'cold'");
		
		$warm34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 104 AND tag = 'warm'");
      	$hot34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 104 AND tag = 'hot'");
      	$cold34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 104 AND tag = 'cold'");
		
		$totwarm10 = 0;
		$tothot10 = 0;
		$totcold10 = 0;
		
		while($warm10 = mysqli_fetch_array($warm10)) {
        	$totwarm10 = $warm10['COUNT(*)'];
      	}
		while($hot10 = mysqli_fetch_array($hot10)) {
        	$tothot10 = $hot10['COUNT(*)'];
      	}
		while($cold10 = mysqli_fetch_array($cold10)) {
        	$totcold10 = $cold10['COUNT(*)'];
      	}
		
		$totwarm22 = 0;
		$tothot22 = 0;
		$totcold22 = 0;
		
		while($warm22 = mysqli_fetch_array($warm22)) {
        	$totwarm22 = $warm22['COUNT(*)'];
      	}
		while($hot22 = mysqli_fetch_array($hot22)) {
        	$tothot22 = $hot22['COUNT(*)'];
      	}
		while($cold22 = mysqli_fetch_array($cold22)) {
        	$totcold22 = $cold22['COUNT(*)'];
      	}
		
		$totwarm33 = 0;
		$tothot33 = 0;
		$totcold33 = 0;
		
		while($warm33 = mysqli_fetch_array($warm33)) {
        	$totwarm33 = $warm33['COUNT(*)'];
      	}
		while($hot33 = mysqli_fetch_array($hot33)) {
        	$tothot33 = $hot33['COUNT(*)'];
      	}
		while($cold33 = mysqli_fetch_array($cold33)) {
        	$totcold33 = $cold33['COUNT(*)'];
      	}
		
		$totwarm34 = 0;
		$tothot34 = 0;
		$totcold34 = 0;
		
		while($warm34 = mysqli_fetch_array($warm34)) {
        	$totwarm34 = $warm34['COUNT(*)'];
      	}
		while($hot34 = mysqli_fetch_array($hot34)) {
        	$tothot34 = $hot34['COUNT(*)'];
      	}
		while($cold34 = mysqli_fetch_array($cold34)) {
        	$totcold34 = $cold34['COUNT(*)'];
      	}
		
		$tot10 = $totwarm10+$tothot10+$totcold10;
		$tot22 = $totwarm22+$tothot22+$totcold22;
		$tot33 = $totwarm33+$tothot33+$totcold33;
		$tot34 = $totwarm34+$tothot34+$totcold34;
		mysqli_close($conNew);
		
		
?>
<script src="js/heat.js"></script>
<script src="js/color.js"></script>
<script src="js/colorlight.js"></script>
<script src="js/colorpop.js"></script>
<script type="text/javascript">
		var tot10 = <?php echo json_encode($tot10); ?>;
		var totwarm10 = <?php echo json_encode($totwarm10); ?>;
		var tothot10 = <?php echo json_encode($tothot10); ?>;
		var totcold10 = <?php echo json_encode($totcold10); ?>;
		
		var tot22 = <?php echo json_encode($tot22); ?>;
		var totwarm22 = <?php echo json_encode($totwarm22); ?>;
		var tothot22 = <?php echo json_encode($tothot22); ?>;
		var totcold22 = <?php echo json_encode($totcold22); ?>;
		
		var tot33 = <?php echo json_encode($tot33); ?>;
		var totwarm33 = <?php echo json_encode($totwarm33); ?>;
		var tothot33 = <?php echo json_encode($tothot33); ?>;
		var totcold33 = <?php echo json_encode($totcold33); ?>;	

		var tot34 = <?php echo json_encode($tot34); ?>;
		var totwarm34 = <?php echo json_encode($totwarm34); ?>;
		var tothot34 = <?php echo json_encode($tothot34); ?>;
		var totcold34 = <?php echo json_encode($totcold34); ?>;
		
		var color10 = color(tothot10,totwarm10,totcold10);
		var color22 = color(tothot22,totwarm22,totcold22);
		var color33 = color(tothot33,totwarm33,totcold33);
		var color34 = color(tothot34,totwarm34,totcold34);
		
		$(document).ready(function() {     
        createHeat("circle",tot10*10,220,80,color10);
		createHeat("circle2",tot22*10,90,340,color22);
		createHeat("circle3",tot33*10,220,170,color33);
		createHeat("circle4",tot34*10,200,300,color34); 
		
		createHeat("legend",10,50,800,color(2,1,1));
		createHeat("legend2",10,50,830,color(2,2,1));
		createHeat("legend3",10,50,860,color(1,1,1));
		createHeat("legend4",10,50,890,color(1,2,2));
		createHeat("legend5",10,50,920,color(1,1,2));
		
		document.getElementById("d1").style.top ="790px";
		document.getElementById("d1").style.color="Red";
		document.getElementById("d1").innerHTML = "Hot";
		
		document.getElementById("d2").style.top ="820px";
		document.getElementById("d2").style.color="Orange";
		document.getElementById("d2").innerHTML = "Warm";
		
		document.getElementById("d3").style.top ="850px";
		document.getElementById("d3").style.color="Green";
		document.getElementById("d3").innerHTML = "Normal";
		
		document.getElementById("d4").style.top ="880px";
		document.getElementById("d4").style.color="Aqua";
		document.getElementById("d4").innerHTML = "Cold";
		
		document.getElementById("d5").style.top ="910px";
		document.getElementById("d5").style.color="Blue";
		document.getElementById("d5").innerHTML = "Freezing";


        });    
		</script>

	
	
  </div>

</div> 
<script>

		function parseScript(_source) {
			var source = _source;
			var scripts = new Array();

			// Strip out tags
			while(source.indexOf("<script") > -1 || source.indexOf("</script") > -1) {
				var s = source.indexOf("<script");
				var s_e = source.indexOf(">", s);
				var e = source.indexOf("</script", s);
				var e_e = source.indexOf(">", e);

				// Add to scripts array
				scripts.push(source.substring(s_e+1, e));
				// Strip from source
				source = source.substring(0, s) + source.substring(e_e+1);
			}

			// Loop through every script collected and eval it
			for(var i=0; i<scripts.length; i++) {
				try {
					eval(scripts[i]);
				}
				catch(ex) {
				}
			}

			// Return the cleaned source
			return source;
		}
		
function showHeat(floor,category){
	var xmlhttp;    
	if (window.XMLHttpRequest)
	  {// code for IE7+, Firefox, Chrome, Opera, Safari
	  xmlhttp=new XMLHttpRequest();
	  }
	else
	  {// code for IE6, IE5
	  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	  }
	xmlhttp.onreadystatechange=function()
	  {
	  if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		document.getElementById("test").innerHTML=xmlhttp.responseText;
		var content = xmlhttp.responseText;
		parseScript(content);
		
		}
	  }
	  
	xmlhttp.open("GET","serverheat.php?q="+floor+"&l="+category,true);
	xmlhttp.send();

}


</script>
</body>
</html>
