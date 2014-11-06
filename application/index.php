<!DOCTYPE html>
<?php
	/****************************************************************
	*	INDEX.PHP - This page is the which user first interact with. 
	*	This page allows users to login or can access the sign up 
	*	page to create an account. 
	*
	*
	*/
	include_once("servercon.php");
?>

<html class="ui-mobile">

<head>
	
	<title>AEB Space - Home</title>
	<link rel="icon" href="/icons/favicon.ico">
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	
	<!-- Import libraries -->
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/main.css" type="text/css" />
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" />
		
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	
	<!-- Check submitted data -->
	<script>
		/**
		 *The function check goes through the html form elements checking whether the inputted values are not null and appropriate to submit 
		 */
		function check(){

			var email = document.getElementById("user").value;
			var atpos = email.indexOf("@");
		    var dotpos = email.lastIndexOf(".");
			var pass = document.getElementById("pass").value;
			var form = document.getElementById("login");

			/**
	 		 *Checks whether the email is invalid if
			 *there is less than 1 character before the @ symbol
			 *and the final dot is at less 2 characters awhile from the @ symbol
			 *and has characters after the final dot
			 */
		    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=email.length) {
		        document.getElementById("status").innerHTML = "Please enter a valid email";
		    }

			else if (pass == null || pass == ""){
				document.getElementById("status").innerHTML = "Please enter a password";
			}

			else {
				form.submit();
			}
		}
	
		function signup() {
			window.location.href = '/signup.php';
		}
		
	</script>

</head>

<body>
	 <section class="intro">
			<div class="intro-body">
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-md-offset-2">
							<!-- logo image -->
							<div id="logo"><center><img src="images/logo2.png" class="img-responsive" /></center></div>
							 
							<!-- status message -->
							<div style="color:red;margin:0 auto;" id="status">&nbsp;</div>
							<form id="login" method='POST' action='/check.php'> 	
							
							<!-- email field for login -->
							<div class="form-group col-lg-12">
								<input type="text" class="form-control input-control" id="user" placeholder="Email" name="user" value="">
							</div>
							
							<!-- password field for login -->
							<div class="form-group col-lg-12">
								<input type="password" class="form-control" id="pass" placeholder="Password" name="pass" value="">
							</div>
							
							<!-- login button -->
							<div class="form-group col-md-6 col-md-offset-3"> 
								<button type="button" class="btn btn-success btn_login" id="login" onClick="check();">Login</button>
							</div>
							
							<!-- sign up button -->
							<div class="form-group col-md-6 col-md-offset-3">
								<button type="button" class="btn btn-primary btn_reg" value="Register" onClick="signup();" >Sign Up</button>
							</div>
							</form>
						</div>
					</div>
				</div>
			</div>
	</section>		
</body>
<script>
	//Checks whether the $_GET['log_out'] has been set, if so then the variable log_out is set to 1, which means logout successfully and display 'Logout Successfully'.
	//Other log_out will be set to 0
	var log_out = "<?=isset($_GET['log_out']) ? $_GET['log_out'] : '0'?>";
			
	if (log_out == 1) {
		document.getElementById('status').innerHTML = 'Logout Successful';
		document.getElementById('status').style.color="white"
	}

	//Checks whether the $_GET['logfailed'] has been set, if so then the variable log_failed is set to 1, otherwise it will be set to 0.
	var log_failed = "<?=isset($_GET['logfailed']) ? $_GET['logfailed'] : '0'?>";

	if (log_failed == 1) {
		document.getElementById('status').innerHTML = 'Wrong email or password';
	}//assign the failed login as 1 which means login unsuccessfully and display 'Wrong email or password'

	//Checks whether the $_GET['signsuccess'] has been set, if so then the variable sign_success is set to 1, otherwise it will be set to 0.
	var sign_success = "<?=isset($_GET['signsuccess']) ? $_GET['signsuccess'] : '0'?>";

	if (sign_success == 1) {
		document.getElementById('status').innerHTML = 'Successfully registered! Please log in with your new details';
		document.getElementById('status').style.color="white";
	}

</script>
</html>
