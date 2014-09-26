<?php
include("servercon.php");
$floor = $_REQUEST["q"];
$category = $_REQUEST["l"];

	  
if($floor == "1"){
	echo '<script>
      	var x = document.getElementById("temp");
      	x.innerHTML= \' 25 &deg \';
      	x.style.color = "white"; 
			   	x.style.font = "bold 16px Helvetica, Sans-Serif"; 
			   	x.style.letterSpacing = " -1px";  
			   	x.style.background = " rgb(0, 0, 0)";
			   	x.style.background = " rgba(0, 0, 0, 0.7)";
			   	x.style.padding = " 10px"; 
			   		x.style.width = "15%";
      	</script>';
} else if($floor == "2"){
	echo '<script>
      	var x = document.getElementById("temp");
      	x.innerHTML= \' 27 &deg \';
      	x.style.color = "white"; 
			   	x.style.font = "bold 16px Helvetica, Sans-Serif"; 
			   	x.style.letterSpacing = " -1px";  
			   	x.style.background = " rgb(0, 0, 0)";
			   	x.style.background = " rgba(0, 0, 0, 0.7)";
			   	x.style.padding = " 10px"; 
			   	x.style.width = "15%";
      	</script>';
} else if($floor == "3"){
	echo '<script>
      	var x = document.getElementById("temp");
      	x.innerHTML= \' 26 &deg \';
      	x.style.color = "white"; 
			   	x.style.font = "bold 16px Helvetica, Sans-Serif"; 
			   	x.style.letterSpacing = " -1px";  
			   	x.style.background = " rgb(0, 0, 0)";
			   	x.style.background = " rgba(0, 0, 0, 0.7)";
			   	x.style.padding = " 10px"; 
			   		x.style.width = "15%";
      	</script>';
}	


if($floor == "1" && $category == "8"){
		
      	$warm10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 101 AND tag1 = 'warm'");
      	$hot10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 101  AND tag1 = 'hot'");
      	$cold10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 101  AND tag1 = 'cold'");
		
		$warm22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 102 AND tag1 = 'warm'");
      	$hot22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 102 AND tag1 = 'hot'");
      	$cold22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 102 AND tag1 = 'cold'");
		
		$warm33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 103 AND tag1 = 'warm'");
      	$hot33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 103 AND tag1 = 'hot'");
      	$cold33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 103 AND tag1 = 'cold'");
		
		$warm34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 104 AND tag1 = 'warm'");
      	$hot34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 104 AND tag1 = 'hot'");
      	$cold34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 104 AND tag1 = 'cold'");
		
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
		
		
		echo'

		
		<script>
		
		var tot10 = '.json_encode($tot10).';
		var totwarm10 = '.json_encode($totwarm10).';
		var tothot10 = '.json_encode($tothot10).';
		var totcold10 = '.json_encode($totcold10).';
		
		var tot22 = '.json_encode($tot22).';
		var totwarm22 = '.json_encode($totwarm22).';
		var tothot22 = '.json_encode($tothot22).';
		var totcold22 = '.json_encode($totcold22).';
		
		var tot33 = '.json_encode($tot33).';
		var totwarm33 = '.json_encode($totwarm33).';
		var tothot33 = '.json_encode($tothot33).';
		var totcold33 ='.json_encode($totcold33).';	

		var tot34 = '.json_encode($tot34).';
		var totwarm34 = '.json_encode($totwarm34).';
		var tothot34 = '.json_encode($tothot34).';
		var totcold34 = '.json_encode($totcold34).';	

		
		var color10 = color(tothot10,totwarm10,totcold10);
		var color22 = color(tothot22,totwarm22,totcold22);
		var color33 = color(tothot33,totwarm33,totcold33);
		var color34 = color(tothot34,totwarm34,totcold34);
		
        createHeat("circle",tot10*10,220,80,color10);
		createHeat("circle2",tot22*10,90,340,color22);
		createHeat("circle3",tot33*10,220,170,color33);
		createHeat("circle4",tot34*10,200,300,color34); 
		
		createHeat("legend",10,50,700,color(2,1,1));
		createHeat("legend2",10,50,730,color(2,2,1));
		createHeat("legend3",10,50,760,color(1,1,1));
		createHeat("legend4",10,50,790,color(1,2,2));
		createHeat("legend5",10,50,820,color(1,1,2));
		
		document.getElementById("d1").style.top ="690px";
		document.getElementById("d1").style.color="Red";
		document.getElementById("d1").innerHTML = "Hot";
		
		document.getElementById("d2").style.top ="720px";
		document.getElementById("d2").style.color="Orange";
		document.getElementById("d2").innerHTML = "Warm";
		
		document.getElementById("d3").style.top ="750px";
		document.getElementById("d3").style.color="Green";
		document.getElementById("d3").innerHTML = "Normal";
		
		document.getElementById("d4").style.top ="780px";
		document.getElementById("d4").style.color="Aqua";
		document.getElementById("d4").innerHTML = "Cold";
		
		document.getElementById("d5").style.top ="810px";
		document.getElementById("d5").style.color="Blue";
		document.getElementById("d5").innerHTML = "Freezing";
		</script>
		
		
		';
}
elseif($floor == "1" && $category == "9"){
      	$warm10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 101 AND tag2 = 'comfy'");
      	$hot10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 101  AND tag2 = 'dark'");
      	$cold10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 101  AND tag2 = 'bright'");
		
		$warm22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 102 AND tag2 = 'comfy'");
      	$hot22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 102 AND tag2 = 'dark'");
      	$cold22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 102 AND tag2 = 'bright'");
		
		$warm33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 102 AND tag2 = 'comfy'");
      	$hot33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 102 AND tag2 = 'dark'");
      	$cold33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 102 AND tag2 = 'bright'");
		
		$warm34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 105 AND tag2 = 'comfy'");
      	$hot34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 105 AND tag2 = 'dark'");
      	$cold34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 105 AND tag2 = 'bright'");
		
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
		
		
		echo'
		<script>
		
		var tot10 = '.json_encode($tot10).';
		var totwarm10 = '.json_encode($totwarm10).';
		var tothot10 = '.json_encode($tothot10).';
		var totcold10 = '.json_encode($totcold10).';
		
		var tot22 = '.json_encode($tot22).';
		var totwarm22 = '.json_encode($totwarm22).';
		var tothot22 = '.json_encode($tothot22).';
		var totcold22 = '.json_encode($totcold22).';
		
		var tot33 = '.json_encode($tot33).';
		var totwarm33 = '.json_encode($totwarm33).';
		var tothot33 = '.json_encode($tothot33).';
		var totcold33 ='.json_encode($totcold33).';	

		var tot34 = '.json_encode($tot34).';
		var totwarm34 = '.json_encode($totwarm34).';
		var tothot34 = '.json_encode($tothot34).';
		var totcold34 = '.json_encode($totcold34).';	

		
		var color10 = colorlight(tothot10,totwarm10,totcold10);
		var color22 = colorlight(tothot22,totwarm22,totcold22);
		var color33 = colorlight(tothot33,totwarm33,totcold33);
		var color34 = colorlight(tothot34,totwarm34,totcold34);
		
        createHeat("circle",tot10*10,220,80,color10);
		createHeat("circle2",tot22*10,90,340,color22);
		createHeat("circle3",tot33*10,220,170,color33);
		createHeat("circle4",tot34*10,200,300,color34);   

		createHeat("legend",10,50,700,colorlight(2,1,1));
		createHeat("legend2",10,50,730,colorlight(2,2,1));
		createHeat("legend3",10,50,760,colorlight(1,1,1));
		createHeat("legend4",10,50,790,colorlight(1,2,2));
		createHeat("legend5",10,50,820,colorlight(1,1,2));
		
		document.getElementById("d1").style.top ="690px";
		document.getElementById("d1").style.color="Black";
		document.getElementById("d1").innerHTML = "Very Dark";
		
		document.getElementById("d2").style.top ="720px";
		document.getElementById("d2").style.color="Brown";
		document.getElementById("d2").innerHTML = "Dark";
		
		document.getElementById("d3").style.top ="750px";
		document.getElementById("d3").style.color="Green";
		document.getElementById("d3").innerHTML = "Normal";
		
		document.getElementById("d4").style.top ="780px";
		document.getElementById("d4").style.color="Aqua";
		document.getElementById("d4").innerHTML = "Bright";
		
		document.getElementById("d5").style.top ="810px";
		document.getElementById("d5").style.color="Yellow";
		document.getElementById("d5").innerHTML = "Very Bright";
		</script>
		';
}
elseif($floor == "1" && $category == "10"){
		$hot10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 101  AND tag3 = 'crowded'");
      	$cold10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 101  AND tag3 = 'peaceful'");
		
      	$hot22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 102 AND tag3 = 'crowded'");
      	$cold22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 102 AND tag3 = 'peaceful'");
		
      	$hot33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 103 AND tag3 = 'crowded'");
      	$cold33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 103 AND tag3 = 'peaceful'");
		
      	$hot34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 104 AND tag3 = 'crowded'");
      	$cold34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 104 AND tag3 = 'peaceful'");
		
		$tothot10 = 0;
		$totcold10 = 0;
		
		while($hot10 = mysqli_fetch_array($hot10)) {
        	$tothot10 = $hot10['COUNT(*)'];
      	}
		while($cold10 = mysqli_fetch_array($cold10)) {
        	$totcold10 = $cold10['COUNT(*)'];
      	}
		
		$tothot22 = 0;
		$totcold22 = 0;
		
		while($hot22 = mysqli_fetch_array($hot22)) {
        	$tothot22 = $hot22['COUNT(*)'];
      	}
		while($cold22 = mysqli_fetch_array($cold22)) {
        	$totcold22 = $cold22['COUNT(*)'];
      	}
		

		$tothot33 = 0;
		$totcold33 = 0;
		
		while($hot33 = mysqli_fetch_array($hot33)) {
        	$tothot33 = $hot33['COUNT(*)'];
      	}
		while($cold33 = mysqli_fetch_array($cold33)) {
        	$totcold33 = $cold33['COUNT(*)'];
      	}
		
		$tothot34 = 0;
		$totcold34 = 0;
		
		while($hot34 = mysqli_fetch_array($hot34)) {
        	$tothot34 = $hot34['COUNT(*)'];
      	}
		while($cold34 = mysqli_fetch_array($cold34)) {
        	$totcold34 = $cold34['COUNT(*)'];
      	}
		
		$tot10 = $tothot10+$totcold10;
		$tot22 = $tothot22+$totcold22;
		$tot33 = $tothot33+$totcold33;
		$tot34 = $tothot34+$totcold34;
		mysqli_close($conNew);
		
		
		echo'
		<script>
		
		var tot10 = '.json_encode($tot10).';
		var tothot10 = '.json_encode($tothot10).';
		var totcold10 = '.json_encode($totcold10).';
		
		var tot22 = '.json_encode($tot22).';
		var tothot22 = '.json_encode($tothot22).';
		var totcold22 = '.json_encode($totcold22).';
		
		var tot33 = '.json_encode($tot33).';
		var tothot33 = '.json_encode($tothot33).';
		var totcold33 ='.json_encode($totcold33).';	

		var tot34 = '.json_encode($tot34).';
		var tothot34 = '.json_encode($tothot34).';
		var totcold34 = '.json_encode($totcold34).';	

		
		var color10 = colorpop(tothot10,totcold10);
		var color22 = colorpop(tothot22,totcold22);
		var color33 = colorpop(tothot33,totcold33);
		var color34 = colorpop(tothot34,totcold34);
		
        createHeat("circle",tot10*10,220,80,color10);
		createHeat("circle2",tot22*10,90,340,color22);
		createHeat("circle3",tot33*10,220,170,color33);
		createHeat("circle4",tot34*10,200,300,color34);  
		
		createHeat("legend",10,50,700,colorpop(2,1));
		createHeat("legend2",10,50,730,colorpop(1,1));
		createHeat("legend3",10,50,760,colorpop(1,2));
		createHeat("legend4",0,50,790,color(1,2,2));
		createHeat("legend5",0,50,820,color(1,1,2));
		

		document.getElementById("d1").style.top ="690px";
		document.getElementById("d1").style.color="Red";
		document.getElementById("d1").innerHTML = "Crowded";
		
		document.getElementById("d2").style.top ="720px";
		document.getElementById("d2").style.color="Green";
		document.getElementById("d2").innerHTML = "Normal";
		
		document.getElementById("d3").style.top ="750px";
		document.getElementById("d3").style.color="Aqua";
		document.getElementById("d3").innerHTML = "Peaceful";
		

		document.getElementById("d4").style.width= "0px";
		document.getElementById("d4").style.height="0px";
		document.getElementById("d4").innerHTML = "";
		
		document.getElementById("d5").style.width= "0px";
		document.getElementById("d5").style.height="0px";
		document.getElementById("d5").innerHTML = "";
		
		
		</script>
		';
}
elseif($floor == "2" && $category == "8"){
      	$warm10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 201 AND tag1 = 'warm'");
      	$hot10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 201  AND tag1 = 'hot'");
      	$cold10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 201  AND tag1 = 'cold'");
		
		$warm22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 205 AND tag1 = 'warm'");
      	$hot22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 205 AND tag1 = 'hot'");
      	$cold22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 205 AND tag1 = 'cold'");
		
		$warm33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 203 AND tag1 = 'warm'");
      	$hot33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 203 AND tag1 = 'hot'");
      	$cold33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 203 AND tag1 = 'cold'");
		
		$warm34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 204 AND tag1 = 'warm'");
      	$hot34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 204 AND tag1 = 'hot'");
      	$cold34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 204 AND tag1 = 'cold'");
		
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
		
		
		echo'
		<script>
		
		var tot10 = '.json_encode($tot10).';
		var totwarm10 = '.json_encode($totwarm10).';
		var tothot10 = '.json_encode($tothot10).';
		var totcold10 = '.json_encode($totcold10).';
		
		var tot22 = '.json_encode($tot22).';
		var totwarm22 = '.json_encode($totwarm22).';
		var tothot22 = '.json_encode($tothot22).';
		var totcold22 = '.json_encode($totcold22).';
		
		var tot33 = '.json_encode($tot33).';
		var totwarm33 = '.json_encode($totwarm33).';
		var tothot33 = '.json_encode($tothot33).';
		var totcold33 ='.json_encode($totcold33).';	

		var tot34 = '.json_encode($tot34).';
		var totwarm34 = '.json_encode($totwarm34).';
		var tothot34 = '.json_encode($tothot34).';
		var totcold34 = '.json_encode($totcold34).';	

		
		var color10 = color(tothot10,totwarm10,totcold10);
		var color22 = color(tothot22,totwarm22,totcold22);
		var color33 = color(tothot33,totwarm33,totcold33);
		var color34 = color(tothot34,totwarm34,totcold34);
		
        createHeat("circle",tot10*10,220,80,color10);
		createHeat("circle2",tot22*10,90,340,color22);
		createHeat("circle3",tot33*10,220,170,color33);
		createHeat("circle4",tot34*10,200,300,color34);     
		
		createHeat("legend",10,50,700,color(2,1,1));
		createHeat("legend2",10,50,730,color(2,2,1));
		createHeat("legend3",10,50,760,color(1,1,1));
		createHeat("legend4",10,50,790,color(1,2,2));
		createHeat("legend5",10,50,820,color(1,1,2));
		
		document.getElementById("d1").style.top ="690px";
		document.getElementById("d1").style.color="Red";
		document.getElementById("d1").innerHTML = "Hot";
		
		document.getElementById("d2").style.top ="720px";
		document.getElementById("d2").style.color="Orange";
		document.getElementById("d2").innerHTML = "Warm";
		
		document.getElementById("d3").style.top ="750px";
		document.getElementById("d3").style.color="Green";
		document.getElementById("d3").innerHTML = "Normal";
		
		document.getElementById("d4").style.top ="780px";
		document.getElementById("d4").style.color="Aqua";
		document.getElementById("d4").innerHTML = "Cold";
		
		document.getElementById("d5").style.top ="810px";
		document.getElementById("d5").style.color="Blue";
		document.getElementById("d5").innerHTML = "Freezing";
		</script>
		';
}
elseif($floor == "2" && $category == "9"){
      	$warm10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 201 AND tag2 = 'comfy'");
      	$hot10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 201 AND tag2 = 'dark'");
      	$cold10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 201 AND tag2 = 'bright'");
		
		$warm22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 205 AND tag2 = 'comfy'");
      	$hot22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 205 AND tag2 = 'dark'");
      	$cold22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 205 AND tag2 = 'bright'");
		
		$warm33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 203 AND tag2 = 'comfy'");
      	$hot33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 203 AND tag2 = 'dark'");
      	$cold33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 203 AND tag2 = 'bright'");
		
		$warm34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 204 AND tag2 = 'comfy'");
      	$hot34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 204 AND tag2 = 'dark'");
      	$cold34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 204 AND tag2 = 'bright'");
		
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
		
		
		echo'
		<script>
		
		var tot10 = '.json_encode($tot10).';
		var totwarm10 = '.json_encode($totwarm10).';
		var tothot10 = '.json_encode($tothot10).';
		var totcold10 = '.json_encode($totcold10).';
		
		var tot22 = '.json_encode($tot22).';
		var totwarm22 = '.json_encode($totwarm22).';
		var tothot22 = '.json_encode($tothot22).';
		var totcold22 = '.json_encode($totcold22).';
		
		var tot33 = '.json_encode($tot33).';
		var totwarm33 = '.json_encode($totwarm33).';
		var tothot33 = '.json_encode($tothot33).';
		var totcold33 ='.json_encode($totcold33).';	

		var tot34 = '.json_encode($tot34).';
		var totwarm34 = '.json_encode($totwarm34).';
		var tothot34 = '.json_encode($tothot34).';
		var totcold34 = '.json_encode($totcold34).';	

		
		var color10 = color(tothot10,totwarm10,totcold10);
		var color22 = color(tothot22,totwarm22,totcold22);
		var color33 = color(tothot33,totwarm33,totcold33);
		var color34 = color(tothot34,totwarm34,totcold34);
		
        createHeat("circle",tot10*10,220,80,color10);
		createHeat("circle2",tot22*10,90,340,color22);
		createHeat("circle3",tot33*10,220,170,color33);
		createHeat("circle4",tot34*10,200,300,color34);     
		
		createHeat("legend",10,50,700,colorlight(2,1,1));
		createHeat("legend2",10,50,730,colorlight(2,2,1));
		createHeat("legend3",10,50,760,colorlight(1,1,1));
		createHeat("legend4",10,50,790,colorlight(1,2,2));
		createHeat("legend5",10,50,820,colorlight(1,1,2));
		
		document.getElementById("d1").style.top ="690px";
		document.getElementById("d1").style.color="Black";
		document.getElementById("d1").innerHTML = "Very Dark";
		
		document.getElementById("d2").style.top ="720px";
		document.getElementById("d2").style.color="Brown";
		document.getElementById("d2").innerHTML = "Dark";
		
		document.getElementById("d3").style.top ="750px";
		document.getElementById("d3").style.color="Green";
		document.getElementById("d3").innerHTML = "Normal";
		
		document.getElementById("d4").style.top ="780px";
		document.getElementById("d4").style.color="Aqua";
		document.getElementById("d4").innerHTML = "Bright";
		
		document.getElementById("d5").style.top ="810px";
		document.getElementById("d5").style.color="Yellow";
		document.getElementById("d5").innerHTML = "Very Bright";
		</script>
		';
}
elseif($floor == "2" && $category == "10"){
      	$hot10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 201  AND tag3 = 'crowded'");
      	$cold10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 201  AND tag3 = 'peaceful'");
		
      	$hot22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 205 AND tag3 = 'crowded'");
      	$cold22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 205 AND tag3 = 'peaceful'");
		
      	$hot33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 203 AND tag3 = 'crowded'");
      	$cold33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 203 AND tag3 = 'peaceful'");
		
      	$hot34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 204 AND tag3 = 'crowded'");
      	$cold34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 204 AND tag3 = 'peaceful'");
		
		$tothot10 = 0;
		$totcold10 = 0;
		
		while($hot10 = mysqli_fetch_array($hot10)) {
        	$tothot10 = $hot10['COUNT(*)'];
      	}
		while($cold10 = mysqli_fetch_array($cold10)) {
        	$totcold10 = $cold10['COUNT(*)'];
      	}
		
		$tothot22 = 0;
		$totcold22 = 0;
		
		while($hot22 = mysqli_fetch_array($hot22)) {
        	$tothot22 = $hot22['COUNT(*)'];
      	}
		while($cold22 = mysqli_fetch_array($cold22)) {
        	$totcold22 = $cold22['COUNT(*)'];
      	}
		

		$tothot33 = 0;
		$totcold33 = 0;
		
		while($hot33 = mysqli_fetch_array($hot33)) {
        	$tothot33 = $hot33['COUNT(*)'];
      	}
		while($cold33 = mysqli_fetch_array($cold33)) {
        	$totcold33 = $cold33['COUNT(*)'];
      	}
		
		$tothot34 = 0;
		$totcold34 = 0;
		
		while($hot34 = mysqli_fetch_array($hot34)) {
        	$tothot34 = $hot34['COUNT(*)'];
      	}
		while($cold34 = mysqli_fetch_array($cold34)) {
        	$totcold34 = $cold34['COUNT(*)'];
      	}
		
		$tot10 = $tothot10+$totcold10;
		$tot22 = $tothot22+$totcold22;
		$tot33 = $tothot33+$totcold33;
		$tot34 = $tothot34+$totcold34;
		mysqli_close($conNew);
		
		
		echo'
		<script>
		
		var tot10 = '.json_encode($tot10).';
		var tothot10 = '.json_encode($tothot10).';
		var totcold10 = '.json_encode($totcold10).';
		
		var tot22 = '.json_encode($tot22).';
		var tothot22 = '.json_encode($tothot22).';
		var totcold22 = '.json_encode($totcold22).';
		
		var tot33 = '.json_encode($tot33).';
		var tothot33 = '.json_encode($tothot33).';
		var totcold33 ='.json_encode($totcold33).';	

		var tot34 = '.json_encode($tot34).';
		var tothot34 = '.json_encode($tothot34).';
		var totcold34 = '.json_encode($totcold34).';	

		
		var color10 = colorpop(tothot10,totcold10);
		var color22 = colorpop(tothot22,totcold22);
		var color33 = colorpop(tothot33,totcold33);
		var color34 = colorpop(tothot34,totcold34);
		
        createHeat("circle",tot10*10,220,80,color10);
		createHeat("circle2",tot22*10,90,340,color22);
		createHeat("circle3",tot33*10,220,170,color33);
		createHeat("circle4",tot34*10,200,300,color34);     
		
		createHeat("legend",10,50,700,colorpop(2,1));
		createHeat("legend2",10,50,730,colorpop(1,1));
		createHeat("legend3",10,50,760,colorpop(1,2));
		createHeat("legend4",0,50,790,color(1,2,2));
		createHeat("legend5",0,50,820,color(1,1,2));
		

		document.getElementById("d1").style.top ="690px";
		document.getElementById("d1").style.color="Red";
		document.getElementById("d1").innerHTML = "Crowded";
		
		document.getElementById("d2").style.top ="720px";
		document.getElementById("d2").style.color="Green";
		document.getElementById("d2").innerHTML = "Normal";
		
		document.getElementById("d3").style.top ="750px";
		document.getElementById("d3").style.color="Aqua";
		document.getElementById("d3").innerHTML = "Peaceful";
		

		document.getElementById("d4").style.width= "0px";
		document.getElementById("d4").style.height="0px";
		document.getElementById("d4").innerHTML = "";
		
		document.getElementById("d5").style.width= "0px";
		document.getElementById("d5").style.height="0px";
		document.getElementById("d5").innerHTML = "";
		</script>
		';
}
elseif($floor == "3" && $category == "8"){
      	$warm10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 301 AND tag1 = 'warm'");
      	$hot10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 301  AND tag1 = 'hot'");
      	$cold10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 301  AND tag1 = 'cold'");
		
		$warm22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 305 AND tag1 = 'warm'");
      	$hot22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 305 AND tag1 = 'hot'");
      	$cold22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 305 AND tag1 = 'cold'");
		
		$warm33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 307 AND tag1 = 'warm'");
      	$hot33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 307 AND tag1 = 'hot'");
      	$cold33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 307 AND tag1 = 'cold'");
		
		$warm34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 316 AND tag1 = 'warm'");
      	$hot34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 316 AND tag1 = 'hot'");
      	$cold34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 316 AND tag1 = 'cold'");
		
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
		
		
		echo'
		<script>
		
		var tot10 = '.json_encode($tot10).';
		var totwarm10 = '.json_encode($totwarm10).';
		var tothot10 = '.json_encode($tothot10).';
		var totcold10 = '.json_encode($totcold10).';
		
		var tot22 = '.json_encode($tot22).';
		var totwarm22 = '.json_encode($totwarm22).';
		var tothot22 = '.json_encode($tothot22).';
		var totcold22 = '.json_encode($totcold22).';
		
		var tot33 = '.json_encode($tot33).';
		var totwarm33 = '.json_encode($totwarm33).';
		var tothot33 = '.json_encode($tothot33).';
		var totcold33 ='.json_encode($totcold33).';	

		var tot34 = '.json_encode($tot34).';
		var totwarm34 = '.json_encode($totwarm34).';
		var tothot34 = '.json_encode($tothot34).';
		var totcold34 = '.json_encode($totcold34).';	

		
		var color10 = color(tothot10,totwarm10,totcold10);
		var color22 = color(tothot22,totwarm22,totcold22);
		var color33 = color(tothot33,totwarm33,totcold33);
		var color34 = color(tothot34,totwarm34,totcold34);
		
        createHeat("circle",tot10*10,220,80,color10);
		createHeat("circle2",tot22*10,90,340,color22);
		createHeat("circle3",tot33*10,220,170,color33);
		createHeat("circle4",tot34*10,200,300,color34);     
		
		createHeat("legend",10,50,700,color(2,1,1));
		createHeat("legend2",10,50,730,color(2,2,1));
		createHeat("legend3",10,50,760,color(1,1,1));
		createHeat("legend4",10,50,790,color(1,2,2));
		createHeat("legend5",10,50,820,color(1,1,2));
		
		document.getElementById("d1").style.top ="690px";
		document.getElementById("d1").style.color="Red";
		document.getElementById("d1").innerHTML = "Hot";
		
		document.getElementById("d2").style.top ="720px";
		document.getElementById("d2").style.color="Orange";
		document.getElementById("d2").innerHTML = "Warm";
		
		document.getElementById("d3").style.top ="750px";
		document.getElementById("d3").style.color="Green";
		document.getElementById("d3").innerHTML = "Normal";
		
		document.getElementById("d4").style.top ="780px";
		document.getElementById("d4").style.color="Aqua";
		document.getElementById("d4").innerHTML = "Cold";
		
		document.getElementById("d5").style.top ="810px";
		document.getElementById("d5").style.color="Blue";
		document.getElementById("d5").innerHTML = "Freezing";
		</script>
		';
}
elseif($floor == "3" && $category == "9"){
		$warm10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 301 AND tag2 = 'comfy'");
      	$hot10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 301  AND tag2 = 'dark'");
      	$cold10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 301  AND tag2 = 'bright'");
		
		$warm22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 305 AND tag2 = 'comfy'");
      	$hot22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 305 AND tag2 = 'dark'");
      	$cold22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 305 AND tag2 = 'bright'");
		
		$warm33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 307 AND tag2 = 'comfy'");
      	$hot33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 307 AND tag2 = 'dark'");
      	$cold33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 307 AND tag2 = 'bright'");
		
		$warm34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 316 AND tag2 = 'comfy'");
      	$hot34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 316 AND tag2 = 'dark'");
      	$cold34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 316 AND tag2 = 'bright'");
		
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
		
		
		echo'
		<script>
		
		var tot10 = '.json_encode($tot10).';
		var totwarm10 = '.json_encode($totwarm10).';
		var tothot10 = '.json_encode($tothot10).';
		var totcold10 = '.json_encode($totcold10).';
		
		var tot22 = '.json_encode($tot22).';
		var totwarm22 = '.json_encode($totwarm22).';
		var tothot22 = '.json_encode($tothot22).';
		var totcold22 = '.json_encode($totcold22).';
		
		var tot33 = '.json_encode($tot33).';
		var totwarm33 = '.json_encode($totwarm33).';
		var tothot33 = '.json_encode($tothot33).';
		var totcold33 ='.json_encode($totcold33).';	

		var tot34 = '.json_encode($tot34).';
		var totwarm34 = '.json_encode($totwarm34).';
		var tothot34 = '.json_encode($tothot34).';
		var totcold34 = '.json_encode($totcold34).';	

		
		var color10 = colorlight(tothot10,totwarm10,totcold10);
		var color22 = colorlight(tothot22,totwarm22,totcold22);
		var color33 = colorlight(tothot33,totwarm33,totcold33);
		var color34 = colorlight(tothot34,totwarm34,totcold34);
		
        createHeat("circle",tot10*10,220,80,color10);
		createHeat("circle2",tot22*10,90,340,color22);
		createHeat("circle3",tot33*10,220,170,color33);
		createHeat("circle4",tot34*10,200,300,color34);   

		createHeat("legend",10,50,700,colorlight(2,1,1));
		createHeat("legend2",10,50,730,colorlight(2,2,1));
		createHeat("legend3",10,50,760,colorlight(1,1,1));
		createHeat("legend4",10,50,790,colorlight(1,2,2));
		createHeat("legend5",10,50,820,colorlight(1,1,2));
		
		document.getElementById("d1").style.top ="690px";
		document.getElementById("d1").style.color="Black";
		document.getElementById("d1").innerHTML = "Very Dark";
		
		document.getElementById("d2").style.top ="720px";
		document.getElementById("d2").style.color="Brown";
		document.getElementById("d2").innerHTML = "Dark";
		
		document.getElementById("d3").style.top ="750px";
		document.getElementById("d3").style.color="Green";
		document.getElementById("d3").innerHTML = "Normal";
		
		document.getElementById("d4").style.top ="780px";
		document.getElementById("d4").style.color="Aqua";
		document.getElementById("d4").innerHTML = "Bright";
		
		document.getElementById("d5").style.top ="810px";
		document.getElementById("d5").style.color="Yellow";
		document.getElementById("d5").innerHTML = "Very Bright";		
		</script>
		';
}
elseif($floor == "3" && $category == "10"){
      	$hot10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 301  AND tag3 = 'crowded'");
      	$cold10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 301  AND tag3 = 'peaceful'");
		
      	$hot22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 305 AND tag3 = 'crowded'");
      	$cold22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 305 AND tag3 = 'peaceful'");
		
      	$hot33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 307 AND tag3 = 'crowded'");
      	$cold33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 307 AND tag3 = 'peaceful'");
		
      	$hot34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 316 AND tag3 = 'crowded'");
      	$cold34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 316 AND tag3 = 'peaceful'");
		
		$tothot10 = 0;
		$totcold10 = 0;
		
		while($hot10 = mysqli_fetch_array($hot10)) {
        	$tothot10 = $hot10['COUNT(*)'];
      	}
		while($cold10 = mysqli_fetch_array($cold10)) {
        	$totcold10 = $cold10['COUNT(*)'];
      	}
		
		$tothot22 = 0;
		$totcold22 = 0;
		
		while($hot22 = mysqli_fetch_array($hot22)) {
        	$tothot22 = $hot22['COUNT(*)'];
      	}
		while($cold22 = mysqli_fetch_array($cold22)) {
        	$totcold22 = $cold22['COUNT(*)'];
      	}
		

		$tothot33 = 0;
		$totcold33 = 0;
		
		while($hot33 = mysqli_fetch_array($hot33)) {
        	$tothot33 = $hot33['COUNT(*)'];
      	}
		while($cold33 = mysqli_fetch_array($cold33)) {
        	$totcold33 = $cold33['COUNT(*)'];
      	}
		
		$tothot34 = 0;
		$totcold34 = 0;
		
		while($hot34 = mysqli_fetch_array($hot34)) {
        	$tothot34 = $hot34['COUNT(*)'];
      	}
		while($cold34 = mysqli_fetch_array($cold34)) {
        	$totcold34 = $cold34['COUNT(*)'];
      	}
		
		$tot10 = $tothot10+$totcold10;
		$tot22 = $tothot22+$totcold22;
		$tot33 = $tothot33+$totcold33;
		$tot34 = $tothot34+$totcold34;
		mysqli_close($conNew);
		
		
		echo'
		<script>
		
		var tot10 = '.json_encode($tot10).';
		var tothot10 = '.json_encode($tothot10).';
		var totcold10 = '.json_encode($totcold10).';
		
		var tot22 = '.json_encode($tot22).';
		var tothot22 = '.json_encode($tothot22).';
		var totcold22 = '.json_encode($totcold22).';
		
		var tot33 = '.json_encode($tot33).';
		var tothot33 = '.json_encode($tothot33).';
		var totcold33 ='.json_encode($totcold33).';	

		var tot34 = '.json_encode($tot34).';
		var tothot34 = '.json_encode($tothot34).';
		var totcold34 = '.json_encode($totcold34).';	

		
		var color10 = colorpop(tothot10,totcold10);
		var color22 = colorpop(tothot22,totcold22);
		var color33 = colorpop(tothot33,totcold33);
		var color34 = colorpop(tothot34,totcold34);
		
        createHeat("circle",tot10*10,220,80,color10);
		createHeat("circle2",tot22*10,90,340,color22);
		createHeat("circle3",tot33*10,220,170,color33);
		createHeat("circle4",tot34*10,200,300,color34);   

		createHeat("legend",10,50,700,colorpop(2,1));
		createHeat("legend2",10,50,730,colorpop(1,1));
		createHeat("legend3",10,50,760,colorpop(1,2));
		createHeat("legend4",0,50,790,color(1,2,2));
		createHeat("legend5",0,50,820,color(1,1,2));
		

		document.getElementById("d1").style.top ="690px";
		document.getElementById("d1").style.color="Red";
		document.getElementById("d1").innerHTML = "Crowded";
		
		document.getElementById("d2").style.top ="720px";
		document.getElementById("d2").style.color="Green";
		document.getElementById("d2").innerHTML = "Normal";
		
		document.getElementById("d3").style.top ="750px";
		document.getElementById("d3").style.color="Aqua";
		document.getElementById("d3").innerHTML = "Peaceful";
		
		

		document.getElementById("d4").style.width= "0px";
		document.getElementById("d4").style.height="0px";
		document.getElementById("d4").innerHTML = "";
		
		document.getElementById("d5").style.width= "0px";
		document.getElementById("d5").style.height="0px";
		document.getElementById("d5").innerHTML = "";
		</script>
		';
}

?>