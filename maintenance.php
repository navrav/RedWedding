
<?php
//include('maintenance2.php');

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


   
	   

 // COMMENTED SAVED HERE
// $from = 'nakedphatbear@gmail.com';
// $to = 'aebspace@gmail.com';
// $subject = 'AEBSpace Maintenance Issue Report';
// $msg = 'issue';
// 
// 
// 
// function sendmail($from,$to,$subject,$msg) {
//     echo("<script>console.log('launching sendmail function...');</script>");
// // Downloaded from https://github.com/PHPMailer/PHPMailer
//   require('inc/class.phpmailer.php');
//   echo("<script>console.log('included phpmailer...');</script>");
//   require_once('inc/class.smtp.php');
//   echo("<script>console.log('included smtp...');</script>");
// 
//   $mail = new phpmailer();
//   echo("<script>console.log('new email started...');</script>");
//   $mail->SMTPDebug = false;                            // debugging: 1 = errors and messages, 2 = messages only, 0 = off
//   $mail->IsSMTP();                                 // Set mailer to use SMTP
//   $mail->Host = "mailhub.eait.uq.edu.au";                  // Specify server
//   $mail->Port = 587;                               // Server port: 465 ssl OR  587 tls   //25
//   $mail->SMTPSecure = 'tls';                       // Enable encryption, 'ssl' also accepted // commented
//   $mail->SMTPAuth = true;                          // Enable SMTP authentication // false
//   $mail->Username = 's4204765@student.uq.edu.au';             // SMTP username
//   echo("<script>console.log('connected to host...');</script>");
  
  ////// DON'T LOOK -- KEVIN'S PASSWORD
  
  																								$mail->Password = 'john.massey';    // SMTP password
  
  //////////////////// CAN LOOK AGAIN
  
  //$mail->SetFrom($from,'MyApp');                   // Sender
  //$mail->AddReplyTo($from,'Support');              // Set an alternative reply-to address
  
  //$mail->AddAddress($to,'User');                   // Set who the message is to be sent to
  
  //$mail->Subject = $subject;                       // Set the subject lin// Prepares message for html (see doc for details http://phpmailer.worxware.com/?pg=tutorial)
  //$mail->MsgHTML($msg);// Send the message, check for errors 
  
  // $mail->From = "nakedphatbear@gmail.com";
//   $mail->AddAddress("aebspace@gmail.com");
//   $mail->Subject = "Testing Email Functions";
//   $mail->Body = "Check out my email!";
//   
//   if(!$mail->Send()){
//   echo $mail->ErrorInfo;
//   echo("<script>console.log('Message was not sent.');</script>");
//   }else{
//   echo("<script>console.log('Message was sent.');</script>");
//   }
//   
  // echo("<script>console.log('About to send...');</script>");
//     $ok = $mail->Send();  // Error is happening here
// 	return $ok;
	//$mail->Send(); // COMMENTED END HERE
	  
	  
	  
	  
	  /*
	if(!$ok) {
    //echo ("<script>console.log('Message could not be sent.');</script>");
    echo 'Mailer Error: ' . $mail->ErrorInfo;
	} else {
    //echo ("<script>console.log('Message has been sent');</script>";
	}*/

//echo("<script>console.log('Send happened2');</script>");  
//  return $ok;
  
 //} isset ENDS HERE
 
//echo("<script>console.log('Loaded finenew');</script>");
//sendmail($from2,$to2,$subject2,$msg2);
//echo("<script>console.log('Send happenednew');</script>");

// Took out sendmail function

/*
if (sendmail($from,$to, $subject, $msg)){
	echo 'Your message has been sent.';
	echo("<script>console.log('Your message has been sent');</script>");
} else {
	echo'There was a problem sending the email.';
	echo("<script>console.log('Houston we have a problem');</script>");
}*/



?>

<!DOCTYPE html>

<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		
		<link rel="stylesheet" href="css/jquery.mobile-1.4.2.css">
		<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/main.css" type="text/css">
		
		
		<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
		<script src="js/jquery.mobile-1.4.2.js"></script>
		<!-- 
<script>
			function Submit() {
				console.log('Called');
				$.get("maintenance2.php");
				console.log('After call');
				//setTimeout(function() {window.location.href = "feed.php"}, 3000);
				//document.getElementById('layover').style.display= "block";
				//document.getElementById('confirmpop').style.display= "block";
			}
 -->
		

		
		
		<style>
		
		#header_brown {
			background-color: #CD4F39;
		}
		
		#header_brown a {
			color: #CD4F39;
		}
		
		#header_brown a{
			background-color: #fff;
			margin-top:20px;
			border-radius: 50%;
			text-shadow:none;
			border:none;
			padding:0.8em 1em;
			margin-left: 10px;
		}
		
		#maint_text{
			margin-top:20px;
			padding: 15px;
			border-top-right-radius: 8px;
			border-top-left-radius: 8px;
			background-color:#252525;
			font-family: "HelveticaNeueUltraLight", "HelveticaNeue-Ultra-Light", "Helvetica Neue Ultra Light", "HelveticaNeue", "Helvetica Neue", 'TeXGyreHerosRegular', "Arial", sans-serif;
			font-weight: 100;
			color: #CD4F39;
		}
		
		
		#maint_text p{
			font-size: 14px;
			color:#fff;
		}
		
		#maint_text h4{
			font-size: 20px;
			color: #CD4F39;
		
		}
		#maint_text h5{
			font-size: 13px;
			color: #CD4F39;
		}
		
		
		</style>
	</head>
	<body>
		
		<!--top bar-->
		<div data-role="page" data-theme="b" style="background-color:white;">
		  <div data-role="header" id="header_brown">
		    <?php require("topbanner.php"); ?>
		</div>
		<!--end top bar-->
  
  
		<!--nav bar-->

   	 	<?php require("menu.php"); ?>
	
		<!--end nav bar-->
  
		   <section class="info">
		        <div class="info-body">
		            <div class="container">
		                <div class="row">
		                    <div class="col-md-8 col-md-offset-2">
		                        <div class="">
		                        	<div id="maint_text">
		                        	<h4>MAINTENANCE CONTACT PAGE</h4>
		                        	
		                        	<p>
		                        		If you have any issue regarding the maintenance of the building
		                        		fill out the form below and an email will be send to the appropriate
		                        		person.
		                        	</p>
		                        	<br><br>
		                        	<p>
		                        		<form id="maintform" method="POST" action="maintenance2.php" name="email">
		                        		
		                        			First name: <input type="text" name="FirstName" ><br>
											Last name: <input type="text" name="LastName" ><br>
		                        			Email (for reference) <input type="text" name="email" ><br>
		                        			
		                        			Issue: <textarea placeholder="Input a description of your issue here" name="issue" ></textarea>
		                        			
		                        			<br>
		                        			<input type="submit" value="Submit"> 
		                        			
		                        		</form>
		                        		
										<div id="layover" style="display:none; position:fixed; top:0%; left:0%; width:100%; height:100%; background-color:black; opacity: .50;" > </div>
			
			
										<div id="confirmpop" style="display:none; position:fixed; left:30%; right:30%; top:40%; "> 
											<div class="modal-content">
													
									
													
													<div  id="checkin_location">
														<p>Thank you for your feedback, an email has been sent to the appropriate person </p>
													</div>
													
												</div>
										</div> 
		                        	</p>
		                        	
		                        		
		                        	</div>
		                         </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </section>
  		</div> 
  		<!--
<?php

echo("<script>console.log('Sending email...');</script>");
sendmail($from, $to, $subject, $msg);
echo("<script>console.log('Email sent...');</script>");
?>-->
	</body>
</html>
