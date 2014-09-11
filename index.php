<!DOCTYPE html>
<?php
	// Database access - set variables and connect
	include("servercon.php");
?>

<html class="ui-mobile">

<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	
	<!-- Import libraries -->
	<link rel="stylesheet" href="css/jquery.mobile-1.4.2.css" />
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
	<link rel="stylesheet" href="css/main.css" type="text/css" />
	<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" />
		
	
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="js/jquery.mobile-1.4.2.js"></script>
	<script src="js/bootstrap.min.js"></script>
		<!-- <script src="js/fb.js"></script> -->
		<!-- script src="//connect.facebook.net/en_US/all.js"></script -->
	
	<!-- Check submitted data -->
	<script>
	$(document).ready(function(){

	$("*").keyup(function(){
	if($("#user").val()!="" && $("#pass").val()!="")
	{
	document.getElementById('log').disabled=false;
	}else {
	
	document.getElementById('log').disabled=true;
	}
	});
var ll="<?=isset($_GET['ll']) ? $_GET['ll'] : '0'?>";
if(ll==1){$("#status").text('logout successful').show();}
	$("#log").click(function(){

$.get('ajax_check.php?t='+Math.random(),{pass:$("#pass").val(),user:$("#user").val()},function(j){
if(j=="ok"){window.location.href='/feed.php';} //callback function, math.random here to wipe cache of IE explorer
else{
$("#status").text('Wrong Username or Password').show();
//setTimeout(function(){$("#status").html('&nbsp;')},1500);
}

});
		
	});
	
	
	});
	

	
		function signup(){
			window.location.href='/signup.php';
		}

		function checkForm(){
			if(document.getElementById("user").value == ""){
				document.getElementById("check").innerHTML = "Please enter Email";
				return false;
			} else if(document.getElementById("pass").value == "" ){
				document.getElementById("check").innerHTML = "Please enter Password";
				return false;
			}
			else {
				window.location.href='/check.php'
			}
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
							<div id="logo"><img src="images/logo2.png" class="img-responsive" /></div>
							 
							<!-- status message -->
							<div style="color:red;margin:0 auto;" id="status">&nbsp;</div>
							
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
								<button type="submit" class="btn btn-success btn_login" value="Login" id="log" disabled>Login</button>
							</div>
							
							<!-- sign up button -->
							<div class="form-group col-md-6 col-md-offset-3">
								<button type="button" class="btn btn-danger btn_reg" value="Register" onClick="signup();" >Sign Up</button>
							</div>
				
							<!-- facebook login button (disabled for now) -->
								<!--
								<div class="form-group" col-md-6 col-md-offset-3 id="fb_login">
									<button type="button" class="btn btn-primary btn_fb">Login using Facebook</button>
								</div>
								-->
						</div>
					</div>
				</div>
			</div>
	</section>		
    

<!-- <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button> -->



</body>
</html>
