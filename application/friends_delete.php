<?php
/***************************************************************************
	*	
	*	FRIENDS_DELETE.PHP - Provides auxillary support for friends.php through 
	*   handling database connections and updating tables based on user actions
	*
	*	Functionality:
	*		- Establishes database connections
	*       - Removes data from the Friends table based on user input
	*		
	*/

include('servercon.php');

$u_id=$_REQUEST['u_id'];//current user id

$delete_id=$_REQUEST['delete_id'];//friends who the user wants to delete

//execute sql query, satisfy two conditions to delete, the user and the user's friends  

$sql1="delete from `Friends` where `ID_2`='".$delete_id."' and `ID_1`='".$u_id."'";
$sql2="delete from `Friends` where `ID_2`='".$u_id."' and `ID_1`='".$delete_id."'";


if(mysqli_query($dbconn, $sql1) && mysqli_query($dbconn, $sql2)) echo 'ok';//if execute successfully, echo ok