<!DOCTYPE html>
<html class="ui-mobile">
<script>function back(){location.href='index.php';}</script>
<head>
	<title>AEB Space - Sign Up</title>
	<meta name="viewport" content="width=device-width, initial-scale=1" >
	
	<link rel="stylesheet" href="css/jquery.mobile-1.4.2.css" />
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" />
		<link rel="stylesheet" href="css/main.css" type="text/css" />
		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap-theme.min.css" />
		
	
	<script src="http://code.jquery.com/jquery-1.10.2.min.js" </script>
	
	<script src="js/jquery.mobile-1.4.2.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<!-- <script src="fb.js"></script> -->
	<!-- script src="//connect.facebook.net/en_US/all.js"></script -->
<script>
function check(){
	var pass = document.getElementById("pass").value;
	var cpass = document.getElementById("cpass").value;
	var form = document.getElementById("signup");
	
	if (pass == cpass) {
		// results sent to register.php
		form.submit();
	} else {
		document.getElementById("check").innerHTML = "Passwords do not match.";
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
							<span id="check"></span>
							<form id="signup" method='POST' action='register.php'> 							
								<div class="form-group col-lg-12">
								<label for="fname">First Name</label>
								<input type="text" class="form-control input-control" placeholder="First Name" name="fname" id="fname">
								</div>
								<div class="form-group col-lg-12">
								<label for="laname">Last Name</label>
								<input type="text" class="form-control input-control" placeholder="Last Name" name="lname" id="lname">
								</div>        
								<div class="form-group col-lg-12">
								<label for="pass">Password</label>
								<input type="password" class="form-control input-control" placeholder="Password" name="pass" id="pass">
								</div>                    
								<div class="form-group col-lg-12">
								<label for="cpass">Confirm Password</label>
								<input type="password" class="form-control input-control" placeholder="Confirm Password" name="cpass" id="cpass">
								</div>                    
								<div class="form-group col-lg-12">
								<label for="email">Email</label>
								<input type="email" class="form-control input-control" placeholder="Email" name="email" id="email">
								</div>                    								
								<table style="width:100%;margin:0 auto"><tr><td width="50%">
								
								<button type="button" class="btn btn-danger btn_reg" style="width:80%" onClick="check();">Sign Up</button></td><td>
							
					
									
								<button type="button" class="btn btn-danger btn_reg" style="width:80%"  onClick="back();">Back</button></td></tr></table>
								
							</form>
					  
						</div>
					</div>
				</div>
			</div>
	</section>
</body>
</html>
