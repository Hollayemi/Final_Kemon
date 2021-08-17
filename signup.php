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
		<link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
		<link href="img/km.png" rel="icon">
		<link rel="stylesheet" href="forgetPassword.css"> 
		<title>Sign Up with Kemon </title>
	</head>
	<body class="loginSignup">
		<div class="loginBody">
			<section class="svg">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319"><path fill="#fff" fill-opacity="1" d="M0,160L80,176C160,192,320,224,480,234.7C640,245,800,235,960,208C1120,181,1280,139,1360,117.3L1440,96L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>
			</section>
			<section id="createSec">
				<div class="info-left">
					<h2 class="SignUp-kemon">KEMON-MARKET</h2> 
					<h5 class="About-kemon">We make it easy for you to purchase any product from any where in Nigeria you desire to buy from</h5>
				</div>
				<div class="createDiv">
					<?php
						if(isset($headerErrorInfo)){
							echo $headerErrorInfo;
						}
					?>
					<div class="keLogo">
						<h2 class="signin_signup"><br><br><span><a href="signin.php">SIGN IN</a></span><span class="signup" style="color:#19568f">SIGN UP</span></h2>
						<!-- <h1 class="kemonLog">KE<span class="M">M</span>ON</h1> -->
						<img src="./img/myKemon.png" class="kemonLogPic" alt="">
					</div>

					<form method="POST" autocomplete="off">
						<!-- <input type="button" value="login with google" onclick="window.location='<?php echo $loginURL ?>'"> -->
						<div class="Crateinputs">
							<div class="no1 slide1">
								<br>
							<h3 class="googleLogin signGo">Sign Up with Google</h3>

							<h3 class="googleLogin signGo Next-1">Sign Up with Email</h3>
							</div>
							<div class="no2 slide2">
								<input type="email" name="email" onKeyUp="checkPass()" id="email" value="" placeholder="Email" style="padding:10px;"><br>
								<input type="text" name="username" onKeyUp="checkName()" id="uName" value="" placeholder="Username" style="padding:10px;" > <br>
								<input type="text" name="phone" id="phone" onKeyUp="checkName()" value="" placeholder="Phone" style="padding:10px;"><br>
								<div class="scr">
									<h3 class="Next Next-2">Next</h3>
								</div>
								<div class="scrP">
									<h3 class="Next prev-1">Previous</h3>
								</div>
							</div>
							<div class="createBtn" >
								<input type="password" name="password" onKeyUp="checkPass()" id="passw" value="" placeholder="Password" style="padding:10px;" >
								<input type="password" name="confirmPassword" id="c_passw" value="" placeholder="Confirm Password" style="padding:10px;"><br>
								<h3 class="lastInfo">
								</h3><br>
								<center>
									<input type="submit" class="Next" style="margin-left:-5%" name="action" value="Register">
								</center>
							</div>
						</div>
					</form>
				</div>
			</section>
	</div>
	
		
<script src="form.js"></script>


</body>
</html>