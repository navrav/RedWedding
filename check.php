<?php
$id = $_POST["u"];
$pass = $_POST["p"];

if($id == "deco" && $pass == "3800"){
header("location: feed.php");
}
else{
	header("location: index.php");
	
}
?>