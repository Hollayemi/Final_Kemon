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
							<i class="fa fa-envelope Fa"></i><input type="text" name="Email" value="" placeholder="Email Address">
						</div>
						<div class="inputs centt">
							<i class="fa fa-lock Fa"></i><input type="password" name="Password" value="" placeholder="Password">
						</div>
						<div class="inputs centt">
							<input type="submit" name="loginBtn" value="Login">
						</div>
					</form>
					<div class="signUpSide">
						<h3 class="Forpassword"><a href="ResetPassword.php">Forgot password</a></h3>
						<h3 class="Forpassword"><a href="new-signup.php">Sign Up</a></h3>
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