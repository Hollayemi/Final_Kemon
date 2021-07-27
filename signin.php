<?php 
	require "config/controller.php";
	function loginChk($conn,$email)
	{
		$sql = "SELECT * FROM users WHERE email = :email";
		$stmt = $conn->prepare($sql);
		$stmt->execute(['email'=>$email]);
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		return $row;
	}
?>
<!DOCTYPE html>
<html lang="en">
		<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="img/km.png" rel="icon">
	<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="forgetPassword.css">
	<title>Login</title>
</head>
	<body class="loginBody">
	<section id="loginSec">
		<?php 
		require_once('functions.php');
		// require_once('GoogleApi/vendor/autoload.php');
		// require_once('GoogleApi/Gconfig.php');
		// $loginURL = $gClient->createAuthUrl();
		
		?>
		<div class="login">
			<h2 class="signin_signup"><br><span style="color:#19568f">SIGN IN </span><span class="signup"><a href="create_acc.php">SIGN UP</a></span></h2>
			<!-- <h1 class="kemonLog">KE<span class="M">M</span>ON</h1> -->
			<img src="./img/myKemon.png" class="kemonLogPic" alt="">
			<h3 class="googleLogin">Sign in with Google</h3>

			<div >
				<form method="POST">
					<div class="inputs">
						<i class="fa fa-user Fa"></i><input type="text" name="Email" value="" placeholder="Email" style="padding:10px;">
					</div>
					<div class="inputs">
					<i class="fa fa-lock Fa"></i><input type="password" name="Password" value="" placeholder="Password" style="padding:10px;">
					</div>
					<div class="login_button">
						<input type="submit" name="loginBtn" value="Login">
					</div>
				</form>
				<h3 class="Forpassword"><a href="#">Forgot password </a></h3>
			</div>
			
			</h5>
		</div>
	</section>
	<section>
        <div class="closeForPass">            
            <center>
				<div class="forgetPasswordContent">
					<h2 class="cancelX">X</h2>
					<img src="./img/myKemon.png" alt="">
					<h3 style="text-align:center">Forget your password?</h3> <br><br>
					<form action="" Method="Post">
						<input type="text" name="forgetPassInput" class="forgetPassInput" placeholder="Enter your Email"><br>
						<input name="RePassword" type="submit" class="ResetBtn" value="Reset Password">
					</form>
					<!-- <h4 class="butttonCancel"><a href="login_form.php">Back to Sign in</a></h4>  -->
            	</div>
			</center>
		</div>
	 </section>
	<footer>
	</footer>
			<?php 

			if(isset($_POST['RePassword'])){
				require_once('functions.php');
				$inputEmail=$mysqli->real_escape_string($_POST['forgetPassInput']);
				$Reciever  = $inputEmail;
				$sqlMail="SELECT id,username,password,email,sKey FROM users Where email='$inputEmail'";
				$rub_sqlMail=$mysqli->query($sqlMail);
				$Mailresult= mysqli_fetch_array($rub_sqlMail);
				echo $Mailresult['id'];
				$Topic  = "You requested for Kemon Change of password";
				$content  = "
						<img src=\"cid:myImg\" height='70px' width='150px'>
						<section style='background-color:#000;border:2px solid #570e9b; padding:10px 25px; '>
						
							<div style='border:1px solid #eee;padding:30px;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;'>
							<h2 style='text-align:center;'></h2><br>
							<h4 style='text-align:left; font-size:18px; color:#fff;'>You welcome back, ".$Mailresult['username']."!</h4>
								<h5 style='font-size:15px;font-weight: normal;'>There was a request to change password, <br<br><br> Kindly follow the link below to set up a new password. <br><br><br><br>
									
									<a style='background-color:#570e9b;color:#fff; padding:12px 18px; border-radius:6px' href='http://localhost/dashboard/Kemon_market/forgetPassword.php?auto=".$Mailresult['sKey']."'>Set a New Password </a><br><br><br><br<br>
									If you didnt make any request to change your password, please ignore this email.</h5><br<br>
								</h5>
								<h3 style='border-bottom:3px solid #fff;width:100px'><br>Regrads from KEMON-MARKET</h2>
							</div>
						</section>
								";
				if(MyMailer($Topic,$Reciever,$content)){
					echo "love";
				}
			}
			
			?>
		
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


document.querySelector('.googleLogin').addEventListener('click',function(){
    window.location='<?php echo $loginURL ?>'
})

</script>
<script src="login.js"></script>
</body>

</html>