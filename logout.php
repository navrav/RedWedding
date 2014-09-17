<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
session_start();
$_SESSION = array();
session_destroy();
//if($_SESSION['loggedIn'] ==""){echo "destroy";}
//print and return 

echo '<script>location.href="index.php?log_out=1"</script>';
?>
