<?php
	/*********************************************************
	*	MENU.PHP - Contains the html section for the topbanner that is 
	*	included by all pages expect signup.php and index.php.
	* 
	*	This banner allows the user to access the menu and displays 
	*	the user's AEBux and RANK
	*/
	include_once("servercon.php");

	if (!isset($_SESSION['username']))
	{
	  header("location:index.php");
	}

	$user = $_SESSION["username"];

	$stat = mysqli_query($dbconn, "SELECT `AEBux`,`rank` FROM `Users` WHERE `u_ID` = {$user}");

	$row = mysqli_fetch_array($stat, MYSQLI_ASSOC);
	$aebux = $row['AEBux'];
	$rank = $row['rank'];
?>
		    <h1><img src="images/logo1.png" width="101.25px" height="55.5px"/></h1>
		    <a href="#nav"> <span class="glyphicon glyphicon-th-list"> </span></a>
				<span style="position: absolute; right: 10px; top: 10px;font-size:11px">Rank: <?php echo ($rank); ?> </span>
		  		<span style="position: absolute; right: 10px;  top: 26px; font-size:11px">AEBuxs: <?php echo ($aebux); ?> </span>
		  		<span style="position: absolute; right: 10px;  top: 41px; font-size:11px"> <a style="background-color: inherit;

	margin-top:auto; border-radius: 0%; text-shadow: none; border:none; padding:0; margin-left: 10px; color:white; text-decoration: underline;"; href="store.php";>Buy Secrets</a> </span>