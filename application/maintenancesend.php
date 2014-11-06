<?php


/*
$to = 'corkisland@gmail.com';
$subject = 'AEBSpace Maintenance Issue Report';

$message = '<html><body>';
//$message = 'Hello. This is a test message to see if this works.'


$message = 'issue';
$message = wordwrap($message, 70, "\r\n");
//mail($to, $subject, $message);

/*$smtp = Mail::factory('smtp', array(
	'host' => 'ssl://smtp.gmail.com',
	'port' => '465',
	'auth' => true,
	'username' => 'corkisland@gmail.com',
	'password' => 'naveenkumar2014'
));*/
/*
if (mail($to, $subject, $message)){
	echo 'Your message has been sent.';
	echo("<script>console.log('Your message has been sent');</script>");
} else {
	echo'There was a problem sending the email.';
	echo("<script>console.log('Houston we have a problem');</script>");
}*/
// These were changed in sendmail
// $from = 'email';
// $to = 'aebspace@gmail.com';
// $subject = 'AEBSpace Maintenance Issue Report';
// $msg = 'issue';
// 
// 
// 
// //function sendmail($from,$to,$subject,$msg) {
// 
// // Downloaded from https://github.com/PHPMailer/PHPMailer
//   include_once('inc/class.phpmailer.php');
//   require_once('inc/class.smtp.php');
// 
//   $mail = new phpmailer();
//   $mail->SMTPDebug = false;                            // debugging: 1 = errors and messages, 2 = messages only, 0 = off
//   $mail->IsSMTP();                                 // Set mailer to use SMTP
//   $mail->Host = 'mailhub.eait.uq.edu.au';                  // Specify server
//   $mail->Port = 587;                               // Server port: 465 ssl OR  587 tls   //25
//   $mail->SMTPSecure = 'tls';                       // Enable encryption, 'ssl' also accepted // commented
//   $mail->SMTPAuth = true;                          // Enable SMTP authentication // false
//   $mail->Username = 's4204765@student.uq.edu.au';             // SMTP username
//   
  
  ////// DON'T LOOK -- KEVIN'S PASSWORD
  
  																								$mail->Password = 'john.massey';    // SMTP password
  
  //////////////////// CAN LOOK AGAIN
  
  //$mail->SetFrom($from,'MyApp');                   // Sender
  //$mail->AddReplyTo($from,'Support');              // Set an alternative reply-to address
  
  //$mail->AddAddress($to,'User');                   // Set who the message is to be sent to
  
  //$mail->Subject = $subject;                       // Set the subject lin// Prepares message for html (see doc for details http://phpmailer.worxware.com/?pg=tutorial)
  //$mail->MsgHTML($msg);// Send the message, check for errors 
  
	//$ok = $mail->Send();  // Error is happening here
	
	//$mail->Send();
	  /*
	if(!$ok) {
    //echo ("<script>console.log('Message could not be sent.');</script>");
    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
    //echo ("<script>console.log('Message has been sent');</script>";
	}*/

//echo("<script>console.log('Send happened2');</script>");  
//  return $ok;
  
 // }
//echo("<script>console.log('Loaded fine2nd');</script>");
//sendmail($from2,$to2,$subject2,$msg2);
//echo("<script>console.log('Send happened2nd');</script>");

// Took out sendmail function

/*
if (sendmail($from,$to, $subject, $msg)){
	echo 'Your message has been sent.';
	echo("<script>console.log('Your message has been sent');</script>");
} else {
	echo'There was a problem sending the email.';
	echo("<script>console.log('Houston we have a problem');</script>");
}*/



/////////////////////////////////////////////////////////////////////////////////

$to = 'aebspace@gmail.com';
$from = strip_tags($_POST["email"]);
$name = strip_tags($_POST["FirstName"]) . " " . strip_tags($_POST["LastName"]);
$subject = 'AEB Maintenance Issue';
$issue = strip_tags($_POST["issue"]);
//echo("<script>console.log('Sending to: '".$to.");</script>");
//echo("<script>console.log('Sent from: '".$from.");</script>");
//echo("<script>console.log('Subject: '".$subject.");</script>");
//echo("<script>console.log('Message: '".$message.");</script>");


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



/**
$message = '<html><body>';
			$message .= '<img src="http://css-tricks.com/examples/WebsiteChangeRequestForm/images/wcrf-header.png" alt="Website Change Request" />';
			$message .= '<table rules="all" style="border-color: #666;" cellpadding="10">';
			$message .= "<tr style='background: #eee;'><td><strong>Name:</strong> </td><td>" . strip_tags($_POST['req-name']) . "</td></tr>";
			$message .= "<tr><td><strong>Email:</strong> </td><td>" . strip_tags($_POST['req-email']) . "</td></tr>";
			$message .= "<tr><td><strong>Type of Change:</strong> </td><td>" . strip_tags($_POST['typeOfChange']) . "</td></tr>";
			$message .= "<tr><td><strong>Urgency:</strong> </td><td>" . strip_tags($_POST['urgency']) . "</td></tr>";
			$message .= "<tr><td><strong>URL To Change (main):</strong> </td><td>" . $_POST['URL-main'] . "</td></tr>";
			$addURLS = $_POST['addURLS'];
			if (($addURLS) != '') {
			    $message .= "<tr><td><strong>URL To Change (additional):</strong> </td><td>" . strip_tags($addURLS) . "</td></tr>";
			}
			$curText = htmlentities($_POST['curText']);           
			if (($curText) != '') {
			    $message .= "<tr><td><strong>CURRENT Content:</strong> </td><td>" . $curText . "</td></tr>";
			}
			$message .= "<tr><td><strong>NEW Content:</strong> </td><td>" . htmlentities($_POST['newText']) . "</td></tr>";
			$message .= "</table>";
			$message .= "</body></html>";**/



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