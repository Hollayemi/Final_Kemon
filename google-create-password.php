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
<body>
<?php
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
session_start();

$_SESSION['message']="";
$mysqli=mysqli_connect('localhost','root','','market');
if (isset($_POST['createAcc'])){
	if($_POST['Password']==$_POST['ConfirmPassword']){
		$Username=$_SESSION['googleUsername'];
		$Email=$_SESSION['email'];
		$Password=md5($_POST['Password']);
        $picture=$_SESSION['googlePicture'];
		
		$pas = $_POST['Password'];
		$sql2="SELECT username,password  FROM users WHERE username='$Username' and password='$Password' or email='$Email'";
		$run2=mysqli_query($mysqli,$sql2);
		$num_of_rows=mysqli_num_rows($run2);
		if(strlen($pas)>8){
		if(preg_match('([A-Z0-9])',"$pas")){
		if($num_of_rows < 1){
            require_once('functions.php');
			$sKey = generate_string($permitted_chars, 50);
			$sql="INSERT INTO users (id,username,password, email,sKey,my_pic) VALUES ('NULL','$Username','$Password','$Email','$sKey','$picture')";
				$run=mysqli_query($mysqli,$sql);
						if($run){
							$headerErrorInfo = "<div class='headerErrorInfo' style='color:green'>Submitted</div>";
							$Reciever =  $Email;
							$Topic  = "You are welcome to Kemon-Market";
							$content  = "
									<section style='background-color:#000;border:2px solid #570e9b; padding:10px 25px; '>
									<img src=\"cid:myImg\" height='70px' width='150px'>
										<div style='border:1px solid #eee;padding:30px;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;'>
										<h2 style='text-align:center;'></h2><br>
										<h4 style='text-align:left; font-size:18px; color:#fff;'>Hello ".$Username."!</h4>
											<h5 style='font-size:15px;font-weight: normal;'>Congratulations for signing up with Kemon, <br> My name is Oluwasusi Stephen and i will be at your service. <br><br>Whenever you are stuck, Kindly reach out to me.<br><br> If
												you have few minutes to spare this week, i will be ecstastic to give you a tour on how to use Kemon-Market. You can as well chat me on<br><br><br> 
												<a style='background-color:#570e9b;color:#fff; padding:12px 18px; border-radius:6px' href='https://api.whatsapp.com/send?phone=+2348147702684&text=Hi,%20from%20Kemon-Market, %20I%20just%20joined%20Kemon%20today.%20my%20name%20is%20__'>Whatsapp </a><br><br><br>or you give me a call
												<br><br><br><a style='background-color:#570e9b;color:#fff; padding:12px 18px; border-radius:6px' href='tel:08147702684'>+2348147702684</a><br><br><br><br> i will be very happy to help you
											</h5>
										</div>
									</section>
								";
							if(MyMailer($Topic,$Reciever,$content)){
								$alertEmail = "An email is on its way to you. <br>Follow the instructions for better knowledge";
							}else{
								
							}
						}else{
							$headerErrorInfo =  "<div class='headerErrorInfo'>Not Submitted</div>";
						}
		}

		else
		{
			$headerErrorInfo = "<div Class='headerErrorInfo'>Account already exist or email has previously been used</div>";

					}
			}else{
		$headerErrorInfo = "<div class='headerErrorInfo'>Upper Case(A-Z) of Number(0-9) must be in your Password</div>";
		}
	}else{
		$headerErrorInfo = "<div class='headerErrorInfo'>Password Less than 8 character</div>";
}
	}else{
		$headerErrorInfo = "<div class='headerErrorInfo'>Password doesn't match</div>";
	}

}
else{
		
}
mysqli_close($mysqli)
?>

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
					<h2 class="signin_signup"><br><br><span><a href="login_form.php">SIGN IN</a></span><span class="signup" style="color:#19568f">SIGN UP</span></h2>
					<!-- <h1 class="kemonLog">KE<span class="M">M</span>ON</h1> -->
					<img src="./img/myKemon.png" class="kemonLogPic" alt="">
					
				</div>
				

				<form method="POST" autocomplete="off">
					<div class="Crateinputs" style=" height:300px">
						<div class="no1 slide1">
                            <h3 style="text-align:center">Hello <?php echo $_SESSION['googleUsername'] ?>, Create password to continue with Kemon-market</h3>
                            <input type="text" name="Password" onKeyUp="checkPass()" id="passw" value="<?php echo $_SESSION['email'] ?>" placeholder="Password" style="padding:10px;" ><br>
                            <input type="text" name="ConfirmPassword" id="c_passw" value="<?php echo $_SESSION['googleUsername']; ?>" placeholder="Confirm Password" style="padding:10px;"><br>
                            <center>
                                <input  type="submit" class="Next" name="createAcc" value="Sign Up" style="margin-left:-5%">
                            </center>
						</div>
					</div>
				</form>
		</div>
	</section>
	
	
		
<script src="form.js"></script>
<script>
document.querySelector('.googleLogin').addEventListener('click',function(){
			window.location='<?php echo $loginURL.'&my_type=createAccount' ?>'
		})
</script>
</body>
</html>