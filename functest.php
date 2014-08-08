<?php
$conNew=mysqli_connect("deco3800-12.zones.eait.uq.edu.au","root","Hebrew*Read+dire","aeb");
if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }
      	$warm10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 10 AND tag = 'warm'");
      	$hot10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 10 AND tag = 'hot'");
      	$cold10 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 10 AND tag = 'cold'");
		
		$warm22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 22 AND tag = 'warm'");
      	$hot22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 22 AND tag = 'hot'");
      	$cold22 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 22 AND tag = 'cold'");
		
		$warm33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 33 AND tag = 'warm'");
      	$hot33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 33 AND tag = 'hot'");
      	$cold33 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 33 AND tag = 'cold'");
		
		$warm34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 34 AND tag = 'warm'");
      	$hot34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 34 AND tag = 'hot'");
      	$cold34 = mysqli_query($conNew,"SELECT COUNT(*) from CheckIn where room = 34 AND tag = 'cold'");
		
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
		
?>