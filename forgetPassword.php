
<?php
session_start();
$_SESSION['message']="";
require_once('functions.php');
$mysqli=mysqli_connect('localhost','root','','market');
$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
function generate_string($input, $strength = 16) {
    $input_length = strlen($input);
    $random_string = '';
    for($i = 0; $i < $strength; $i++) {
        $random_character = $input[mt_rand(0, $input_length - 1)];
        $random_string .= $random_character;
    }
    return $random_string;
}
if (isset($_POST['UpdateMyForPass'])){
		$usedSkey = $_GET['auto'];
		$sqlMail="SELECT email,username FROM users WHERE sKey='$usedSkey'";
		$rub_sqlMail=$mysqli->query($sqlMail);
		$Mailresult= mysqli_fetch_array($rub_sqlMail);
		echo $Mailresult['email'];
		$newSkey  = generate_string($permitted_chars,50);
		if(md5($_POST['changeRePassEmail'])== md5($_POST['changePassEmail'])){
                $Password=md5($_POST['changePassEmail']);
					$sqlp="UPDATE users SET password='$Password', sKey='$newSkey' WHERE sKey='$usedSkey'";
						$runp=mysqli_query($mysqli,$sqlp);

								if($runp){
									echo "<div style='background-color:green;width:100%;
									text-align: center;
									font-size:20px;
									box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
									color: #fff;'>Submitted</div>";
									$Reciever =  $Mailresult['email'];
									$Topic  = "Kemon-Change of Password";
									$content  = "
									<section style='background-color:#000;border:2px solid #570e9b; padding:10px 25px; '>
									<img src=\"cid:myImg\" height='70px' width='150px'>
										<div style='border:1px solid #eee;padding:30px;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;'>
										<h2 style='text-align:center;'></h2><br>
										<h4 style='text-align:left; font-size:18px; color:#fff;'>You welcome ".$Mailresult['username']."!</h4>
											<h5 style='font-size:15px;font-weight: normal;'>Congratulations on signing up with Kemon, <br> My name is Oluwasusi Stephen and i will be at your service. <br><br>Whenever you are stuck, I could be of help.<br><br> If
												you have few minutes to spare this week, i will be ecstastic to take you a tour on how to use Kemon-Market. You can as well chat me on<br><br><br> 
												<a style='background-color:#570e9b;color:#fff; padding:12px 18px; border-radius:6px' href='https://api.whatsapp.com/send?phone=+2348147702684&text=Hi,%20from%20Kemon-Market, %20I%20just%20joined%20Kemon%20today.%20my%20name%20is%20__'>Whatsapp </a><br><br><br>or you give me a call
												<br><br><br><a style='background-color:#570e9b;color:#fff; padding:12px 18px; border-radius:6px' href='tel:08147702684'>+2348147702684</a><br><br><br><br> i will be very happy to help you
											</h5>
										</div>
									</section>
										";
									MyMailer($Topic,$Reciever,$content);
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
					echo "<div style='background-color:red;width:100%px;
							text-align: center;
							font-size:20px;
							box-shadow: 0 4px 8px 0 rgba(re), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
							color: #fff;'>Account already exist</div>";

							}
					}
		else{
			
		}
mysqli_close($mysqli);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="forgetPassword.css">
	<link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
	<link href="img/km.png" rel="icon">
        
    <title>Password</title>
</head>
<body>
    <section>
        <div class="UpdatePass">
			<center>
				<div  class="upCenter">
					<h2 class="updateHeader">Update Password</h2>
					<img src="./img/myKemon.png" class="kemonLogPic papaaa" alt="">
					<div class="login">
						<form action="" method="POST">
							<div class="UP">
								<input type="password" placeholder="Password" name="changePassEmail"><br>
								<input type="password" placeholder="Repeat Password" name="changeRePassEmail"><br>
								<div class="login_button">
									<input type="submit" class="UpdateMyForPass papaaa" name="UpdateMyForPass" value="Update">
								</div>
							</div>
						</form>
					</div>
				</div>
			</center>
        </div>
    </section>
</body>
</html>