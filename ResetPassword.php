<?php 
	// require "vendor/autoload.php";
	require "config/db.php";
	require "config/actions.php";
	// require "config/controller.php";
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
	<link rel="stylesheet" href="login.css">
	<title>Reset Password</title>
</head>
	<body class="centt">
		<section class="login centt">
			<div class="loginContent">
				<img src="img/kemon.png" class="kemonLogPic" alt="">

				<div >
					<form method="POST">
						<div class="inputs centt">
                            <input type="text" name="forgetPassInput" placeholder="Enter your Email"><br>
						</div>
						
						<div class="inputs centt">
                            <input name="RePassword" type="submit" value="Reset Password">
						</div>
					</form>
					<div class="signUpSide">
						<h3 class="Forpassword"><a href="signin.php">Sign in</a></h3>
						<h3 class="Forpassword"><a href="signup.php">Sign Up</a></h3>
					</div>
					
				</div>
			</div>
		</section>
	<!-- <section>
        <div class="closeForPass">            
            <center>
				<div class="forgetPasswordContent">
					<h2 class="cancelX">X</h2>
					<img src="./img/myKemon.png" alt="">
					<h3 style="text-align:center">Forget your password?</h3> <br><br>
					<form action="" Method="Post">
						<input type="text" name="forgetPassInput" placeholder="Enter your Email"><br>
						<input name="RePassword" type="submit" class="ResetBtn" value="Reset Password">
					</form>
					<h4 class="butttonCancel"><a href="login_form.php">Back to Sign in</a></h4> 
            	</div>
			</center>
		</div>
	 </section> -->
	
			<?php 

			if(isset($_POST['RePassword'])){
				require_once('functions.php');
				$inputEmail=testInput($_POST['forgetPassInput']);
				$Reciever  = $inputEmail;
				
				$Mailresult= loginChk($conn,$Reciever);
				$Topic  = "You requested for Kemon Change of password";
				$content  = "
							<div style='border:2px solid #ddd;padding:30px;font-family:sans-serif'>
							<img src=\"cid:myImg\" height='70px' width='150px'>
							<h4 style='text-align:left; font-size:18px; color:#fff;font-family:Helvetica Neue,sans-serif;'>You welcome back, ".$Mailresult['username']."!</h4>
								<h5 style='font-size:15px;font-weight:400; color:#fff;'>There was a request to change password, <br<br><br> Kindly follow the link below to set up a new password. <br><br><br>
									
									<a style='background-color:#2259a0;color:#fff;text-decoration:none;padding:12px 18px; border-radius:5px' href='https://kemon-market.com/forgetPassword.php?t=".$Mailresult['sKey']."'>Set a New Password </a><br><br><br><br<br>
									If you did not make any request to change your password, please ignore this email. <br><br>
									If you need any follow-up questions or concerns, pls contact us anytime at support@kemon-market.com.<br<br>
								</h5>
								<h3 style=''><br>Regrads <br> from KEMON-MARKET</h2>
							</div>
						
								";
								$token = $Mailresult['token'];
				if(MyMailer($Topic,$Reciever,$content,$token)){
					
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




</script>
<script src="login.js"></script>
</body>

</html>