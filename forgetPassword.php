<?php
	$_SESSION['message']="";
	require_once('config/db.php');
	require_once('config/actions.php');
	require_once('functions.php');

	if (isset($_POST['RePassword'])){
		$usedToken 		= 	 $_GET['t'];
		$Mailresult		=	 resetPassword($conn,$usedToken);

		$newToken = bin2hex(random_bytes(50));

		if($_POST['newPassword']	=== 	$_POST['conf_newPassword']){

			$Password	= 	password_hash($_POST['newPassword'],PASSWORD_DEFAULT);

			$runp= updatePassword($conn,$newToken,$password);
			if($runp){
				echo "<div style='background-color:green;width:100%;
				text-align: center;
				font-size:20px;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
				color: #fff;'>Submitted</div>";
				$Reciever =  $Mailresult['email'];
				$Topic  = "Password Changed";
				$content  = "
				<section style='background-color:rgb(31, 31, 31);display:flex;align-items:center;justify-content:center;font-family:Tahoma, Geneva, Verdana, sans-serif; height:auto;position:relative;'>
					<div style='border:1px solid rgba(165, 165, 165, 0.534);width:85%;background-color:#000;padding:20px 10px;'>
					<img src='img/kemon.png' height='60px' width='120px'>
					<h4 style='font-size:18px;font-weight:normal; color:#fff;'>Hi there, ".$Mailresult['username']."!</h4><br>
					<h5 style='font-size:15px;color:rgb(199, 199, 199);font-weight:normal;line-height:28px;x'>Thanks on signing up with Kemon-Market, <br> My name is Oluwasusi Stephen and i will be at your service. <br><br>Whenever you are stuck, I could be of help.<br> If
						you have few minutes to spare this week, i will be ecstastic to take you a tour on how to use Kemon-Market. You can as well chat me on 
						<a style='background-color:rgb(28, 99, 230);color:#fff; padding:10px 15px; border-radius:4px;text-decoration:none;' href='https://api.whatsapp.com/send?phone=+2348147702684&text=Hi,%20from%20Kemon-Market, %20I%20just%20joined%20Kemon%20today.%20my%20name%20is%20__'>Whatsapp </a><br><br> or you give me a call
						<a style='background-color:rgb(28, 99, 230);color:#fff; padding:12px 18px; border-radius:4px;text-decoration:none;' href='tel:08147702684'>+2348147702684</a><br><br>
					</h5>
					<h4 style='font-size:18px;font-weight:normal; color:#fff;'>Cheers, <br><span style='display:flex;align-items:center;justify-left:center;'>Oluwasusi stephen <img src='img/amb1.png' style='width:30px;height:30px;border-radius:50%;margin-left:10px'></h4>
					<h5 style='font-size:13px;color:rgba(165, 165, 165, 0.534);'><i>Manager</i></h5>
					</span>
					</div>
				</section>
					";
				MyMailer($Topic,$Reciever,$content,$newToken);
				echo $content;
			}else{
				echo "<div style='background-color:red;width:100%px;
				text-align: center;
				font-size:20px;
				box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
				color: #fff;'>Not Submitted</div>";
			}
		}
		else
		{
			echo "<div text-align: center;font-size:20px;
			color: #fff;'>Password does not match</div>";
		}
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
		<section class="login centt" style="border:1px solid rgb(223, 223, 223);">
			<div class="loginContent">
				<img src="img/kemon.png" class="kemonLogPic" alt="">

				<div >
					<form method="POST">
						<div class="inputs centt">
                            <input type="password" name="newPassword" placeholder="New Password"><br>
						</div>

						<div class="inputs centt">
                            <input type="password" name="conf_newPassword" placeholder="Confirm Password"><br>
						</div>
						
						<div class="inputs centt">
                            <input name="RePassword" type="submit" value="Reset Password">
						</div>
					</form>
					<div class="signUpSide">
						<h3 class="Forpassword"><a href="https://kemon-market.com/signin">Sign in</a></h3>
					</div>
					
				</div>
			</div>
		</section>
	
		<script src="login.js"></script>

	</body>

</html>

<!-- 

<section style='background-color:#000;border:2px solid #570e9b; padding:10px 25px; '>
	<img src=\"cid:myImg\" height='70px' width='150px'>
		<div style='border:1px solid #eee;padding:30px;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;'>
		<h2 style='text-align:center;'></h2><br>
		<h4 style='text-align:left; font-size:18px; color:#fff;'>You welcome ".$Mailresult['username']."!</h4>
		<h5 style='font-size:15px;font-weight: normal;'>Congratulations on signing up with Kemon, 
			<br> My name is Oluwasusi Stephen and i will be at your service. <br><br>Whenever you are stuck, I could be of help.<br><br> If
			you have few minutes to spare this week, i will be ecstastic to take you a tour on how to use Kemon-Market. You can as well chat me on<br><br><br> 
			<a style='background-color:#570e9b;color:#fff; padding:12px 18px; border-radius:6px'
			href='https://api.whatsapp.com/send?phone=+2348147702684&text=Hi,%20from%20Kemon-Market, %20I%20just%20joined%20Kemon%20today.%20my%20name%20is%20__'>Whatsapp </a><br><br><br>or you give me a call
			<br><br><br><a style='background-color:#570e9b;color:#fff; padding:12px 18px; border-radius:6px' href='tel:08147702684'>+2348147702684</a><br><br><br><br> i will be very happy to help you
		</h5>
	</div>
</section> -->