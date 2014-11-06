<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
/*********************************************************
 *	LOGOUT.PHP - Logs the User out
 *
 *		Empties the $_SESSION Array which prevents 
 *		users from accessing pages that require a login
 */

session_start();
$_SESSION = array();
session_destroy(); //distroy the session variable

echo '<script>location.href="index.php?log_out=1"</script>';//clear the dialogue session and logout
?>
