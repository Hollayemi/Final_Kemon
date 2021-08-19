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
	<link rel="stylesheet" href="login.css">
	<title>Login</title>
</head>
	<body class="centt">
		<section class="login centt">
			<div class="loginContent">
				<?php 
				require_once('functions.php');		
				?>
				<!-- <h1 class="kemonLog">KE<span class="M">M</span>ON</h1><br> -->
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




</script>
<script src="login.js"></script>
</body>

</html>