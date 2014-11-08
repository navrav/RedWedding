<?php
/***********************************************************
 *	MAINTENANCESEBD.PHP - Receives the information from the
 *  form submission in maintenanceredir.php and extracts this 
 *  data to be sent clearly in an email.
 *
 *      Retrieves information from the submitted form
 *      Extracts the data and constrcuts the email (including 
 *      formatting) with this information
 *      This information is transferred to the maintainance 
 *      crew
 *      
 */

  
  ////// DON'T LOOK -- KEVIN'S PASSWORD
  
  																								$mail->Password = 'john.massey';    // SMTP password
  
  //////////////////// CAN LOOK AGAIN
  
  

/////////////////////////////////////////////////////////////////////////////////

$to = 'aebspace@gmail.com';
$from = strip_tags($_POST["email"]);
$name = strip_tags($_POST["FirstName"]) . " " . strip_tags($_POST["LastName"]);
$subject = 'AEB Maintenance Issue';
$issue = strip_tags($_POST["issue"]);


function sendMail($to, $from, $subject, $issue, $name){
include_once("inc/class.phpmailer.php");
include("inc/class.smtp.php");
$mail = new phpmailer();
//echo "Created new class  <br>";
$mail->IsSMTP();
$mail->SMTPDebug=1;
ini_set('display_errors', '1');

//echo "Set SMTP  <br>";
$mail->Host = "mailhub.eait.uq.edu.au";
$mail->Port=25;
//echo "Set Server  <br>";
$mail->SMTPAuth = false;
//$mail->SMTPSecure = 'ssl';
$mail->Username = "s4204765@uq.edu.au";
$mail->Password = "john.massey";
$mail->From = 'aebspace@gmail.com';//$from;
$mail->AddAddress($to);
$mail->Subject = $subject;
$mail ->AddAddress($from);
$mail ->FromName = "AEBSpace Maintenance";



$mail -> IsHTML(true);
$message = '<body>'; // '<html><body>';
$message .="<strong>AEB Maintenance Email Report</strong>";
$message .='<table cellpadding="10">';
$message .="<tr><td><strong>Name:</strong></td><td>" . $name . "</td></tr>";
$message .="<tr><td><strong>Email:</strong></td><td>" . $from . "</td></tr>";
$message .="<tr><td><strong>Issue:</strong></td><td>" . $issue . "</td></tr>";
$message .="</table>";
$message .="</body>"; // "</html></body>";

// Firstname, lastname, email, issue

$mail->Body = $message;
//echo "Set message contents <br> ";
;
if(!$mail->Send()){
echo 'Message not sent.';
echo 'Mailer error: '.$mail->ErrorInfo;
}else{
echo 'Message was sent.';
}  
}

?>

sendMail($to, $from, $subject, $issue, $name);

<script language="javascript" type="text/javascript">        
 alert('Thank you for your feedback!');         window.location = 'feed.php';     </script>





<?php

header( 'Location: feed.php' ) ;


?>