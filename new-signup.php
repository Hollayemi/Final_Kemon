<?php 
	$_SESSION['message']="";
	require_once('functions.php');	
	include('config/controller.php')
?>
<!DOCTYPE html>
<html lang="en">
		<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="img/km.png" rel="icon">
	<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="login.css">
	<title>Login</title>
</head>
	<body class="centt">
		<section class="login centt signup">
			<div class="loginContent">
				<?php 
				require_once('functions.php');		
				?>
				<!-- <h2 class="signin_signup"><br><span style="">SIGN IN </span><span class="signup"><a href="signup.php">SIGN UP</a></span></h2> -->
				<!-- <h1 class="kemonLog">KE<span class="M">M</span>ON</h1><br> -->
				<img src="img/kemon.png" class="kemonLogPic" alt="">
				<!-- <h3 class="googleLogin">Sign in with Google</h3> -->

				<div >
					<form method="POST">
						<div class="inputs centt">
							<i class="fa fa-envelope Fa"></i><input type="text" name="email" value="" placeholder="Email Address">
						</div>
                        <div class="inputs centt">
							<i class="fa fa-user Fa"></i><input type="text" name="username" value="" placeholder="Username">
						</div>
                        <br>
                        <div class="inputs centt">
							<i class="fa fa-phone Fa"></i><input type="text" name="phone" value="" placeholder="Phone Number">
						</div>
                        <br>
						<div class="inputs centt">
							<i class="fa fa-lock Fa"></i><input type="password" name="password" value="" placeholder="Password">
						</div>
                        <div class="inputs centt">
							<i class="fa fa-lock Fa"></i><input type="password" name="confirmPassword" value="" placeholder="Confirm Password">
						</div>
						<div class="inputs centt">
							<input type="submit" name="action" value="Register">
						</div>
					</form>
					<div class="signUpSide">
						<h3 class="Forpassword"><a href="ResetPassword.php">Forgot Password</a></h3>
						<h3 class="Forpassword"><a href="signin.php">Sign in</a></h3>
					</div>
					
				</div>
			</div>
		</section>
	<script>
		<?php 
			if(isset($knwO)){
				?>
				window.addEventListener('mouseup', function(event){
				if(event.target != document.querySelector('.loginStatus') && event.target.parentNode != document.querySelector('.loginStatus')){
				document.querySelector('.loginStatus').style.marginTop = '-400px';
				}

			})
		<?php
			}
		?>




</script>
<script src="login.js"></script>
</body>

</html>