<?php
echo("<script>console.log('TESTING PAGE...');</script>");
echo("<script>console.log('Posting form... sID: ');</script>");
echo("<script>console.log('Opening storepost2.php');</script>");
$sID = $_POST["secretid"];
echo $sID;

header( 'Location: store.php' );
?>