<?php
    /****************************************************************
	*	CHANGE_PIC.PHP - This page is the which user change their hats 
	*   for avatars  
	*	This page connects with profile.php and allows users to change their avatars 
	*   based on the database
	*
	*/
include_once("servercon.php");
$tbl_name="Users"; // Table name
$pic=isset($_GET['pic']) ? $_GET['pic'] : "";
$u_id=isset($_GET['user']) ? $_GET['user'] : "";


if($u_id!=""){

$sql="UPDATE $tbl_name  set pic='".$pic."' WHERE u_ID='".$u_id."'";
$resultNew = mysqli_query($dbconn, $sql);

if($result = $dbconn->query($sql)){
echo $pic;
}
} //change the database based on the data transmitted from ajax

?>