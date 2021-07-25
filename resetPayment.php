<?php

include('config.php');
session_start();
$user_id = $_SESSION['user_info_id'];
$collectSql     =    "SELECT pendingCash,agnUsername FROM  agent WHERE regID = '$user_id'";
$collectRun     =     mysqli_query($mysqli,$collectSql);
$collectquerry  =     mysqli_fetch_array($collectRun);


if(isset($_POST['withdraw'])){
    if($collectquerry['pendingCash'] > 0 ){
        require_once('./functions.php');
        $myPending = $collectquerry['pendingCash']+ $collectquerry['withdrawableCashFlow'];
        $myNewPending = $collectquerry['pendingCash'] - $collectquerry['pendingCash'];
        $sql4="UPDATE agent SET withdrawableCashFlow = '$myPending', pendingCash='$myNewPending' WHERE regID='$user_id'";
        mysqli_query($mysqli,$sql4);
        $Topic  = "Kemon Request for Payment";
				$content  = "
						<img src=\"cid:myImg\" height='70px' width='150px'>
						<section style='background-color:#000;border:2px solid #570e9b; padding:10px 25px; '>
						
							<div style='border:1px solid #eee;padding:30px;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;'>
							<h2 style='text-align:center;'></h2><br>
							<h4 style='text-align:left; font-size:18px; color:#fff;'>Hello, stephanyemmitty!</h4>
								<h5 style='font-size:15px;font-weight: normal;'>".$collectquerry['agnUsername']." made a request to cash out. ".$myPending."<br><br><br><br>
									<br><br><br><br>
                                    Kindly verify and make the payment now.
                                    <br><br>
                                    Thanks.<br><br>
								</h5>
								<h3 style='border-bottom:3px solid #fff;width:100px'><br>Regrads from KEMON-MARKET</h2>
							</div>
						</section>
								";
				if(MyMailer($Topic,'stephanyemmitty@gmail.com',$content)){
					echo "love";
				}

        header('Location:Agent.php?notice='.uniqid().'&amt='.$myPending);



        
    }else{
        header('Location:Agent.php?err=amount lesser than 0');
    }

}


?>