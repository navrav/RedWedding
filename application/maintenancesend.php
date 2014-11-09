<?php

/***************************************************************************
	*	
	*	MAINTENANCESEND.PHP - Provides auxillary support for maintenance.php through 
	*   handling server connections and creating and sending an email about the 
	*   maintenance issue submitted by a user
	*
	*	Functionality:
	*		- Establishes server connections
	*       - Creates email content based on the information entered by the user 
	*       - Formats the content of the email using HTML for readability
	*       - Sends the email
	*		
	*/

  ////// DON'T LOOK -- PASSWORD
  
  																								$mail->Password = 'john.massey';    // SMTP password
  
  //////////////////// CAN LOOK AGAIN

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
// Establishes connections to the server
$mail->Host = "mailhub.eait.uq.edu.au";
$mail->Port=25;
//echo "Set Server  <br>";
$mail->SMTPAuth = false;
//$mail->SMTPSecure = 'ssl';
$mail->Username = "s4204765@uq.edu.au";
$mail->Password = "john.massey";
$mail->From = 's4204765@uq.edu.au';//$from;
$mail->AddAddress($to);
$mail->Subject = $subject;

// Creates the content of the email using the data entered in the form by the user
if ($_POST['emailmeornot']=='emailmeval'){
$mail ->AddAddress($from);
}
$mail ->FromName = "AEBSpace Maintenance";
$mail -> IsHTML(true);
$message = '<body>'; // '<html><body>';
$message .="<strong>AEB Maintenance Email Report</strong>";
$message .='<table cellpadding="10">';
$message .="<tr><td><strong>Name:</strong></td><td>" . $name . "</td></tr>";
$message .="<tr><td><strong>Email:</strong></td><td>" . $from . "</td></tr>";
$message .="<tr><td><strong>Issue:</strong></td><td>" . $issue . "</td></tr>";
$message .="</table>";
$message .="</body>"; 



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

// Sends the email
sendMail($to, $from, $subject, $issue, $name);

// Redirects user back to the maintenance page
header( 'Location: maintenanceredir.php' ) ;


?>