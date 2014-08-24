<!DOCTYPE html>

<?php
$conNew=mysqli_connect("deco3801-01.zones.eait.uq.edu.au","root","Viking8Chief+latch","aeb");
if (mysqli_connect_errno()) {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
      }

mysqli_close($conNew);
?>

<html class="ui-mobile">

<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	
	<link rel="stylesheet" href="jquery.mobile-1.4.2.css" />
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/main.css" type="text/css" />
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" />
		
	
	<script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
	
	<script src="jquery.mobile-1.4.2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- <script src="fb.js"></script> -->
	<!-- script src="//connect.facebook.net/en_US/all.js"></script -->
	
	<!--checking submit-->
	<script>
	
		function Submit() {
		
			document.getElementById("seeThru").style.display = "block";
			document.getElementById("submitconfirm").style.display = "block";
			
		}
		
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
							<div id="logo"><img src="logo2.png"/></div>
							<span id="check"></span>
							<form id="logins" method='POST' action='check.php' data-ajax=false> 
								<!--input type="text" name="u" id="u" placeholder="Email"-->
								<div class="form-group col-lg-12">
								<input type="text" class="form-control input-control" id="user" placeholder="Email" name="user" value=""></div>
								<!--input type="password" name="p" id="p" placeholder="Password"-->	
								<div class="form-group col-lg-12">
								<input type="password" class="form-control" id="pass" placeholder="Password" name="pass" value="">
								</div>                   
								<div class="form-group col-md-6 col-md-offset-3"> 
								<button type="submit" class="btn btn-success btn_login" value="Login" id="log">Login</button>
								</div>
								
								<div class="form-group col-md-6 col-md-offset-3">
								<button type="button" class="btn btn-danger btn_reg" value="Register" onclick="signup();" >Sign Up</button>
								</div>
					 
					
								<div class="form-group" col-md-6 col-md-offset-3 id="fb_login">
								<button type="button" class="btn btn-primary btn_fb">Login using Facebook</button>
								</div>
							</form>
					  
						</div>
					</div>
				</div>
			</div>
	</section>		
    

<!-- <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button> >

<div id="status">
</div-->

</body>
</html>
