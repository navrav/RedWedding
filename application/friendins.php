<!DOCTYPE html>
/***************************************************************************
	*	
	*	FRIENDINS.PHP - Provides auxillary support for friends.php through 
	*   handling database connections and updating tables based on user actions
	*
	*	Functionality:
	*		- Establishes database connections
	*       - Inserts data into the Friends table based on user input
	*		
	*/
<?php
	session_start();
	
  	include_once("servercon.php");
  	if (!isset($_SESSION['username']))
  	{
    	  header("location:index.php");
  	}

  	$user = $_SESSION['username'];

// If the form has been posted (from friendsadd.php) then the new friendship is entered 
// into the Friends table
if (isset($_POST['friend'])){
    $friend = $_POST['friend'];
    mysqli_query($dbconn, "INSERT INTO `Friends`(`ID_1`, `ID_2`) VALUES (".$user.", ".$friend.")");
     
}


?>