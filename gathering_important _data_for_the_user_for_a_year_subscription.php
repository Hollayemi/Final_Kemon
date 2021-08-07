
<?php
$mysqli=mysqli_connect('sql105.epizy.com','epiz_28257429','BHiMYLgFzV3pjb','epiz_28257429_market');
session_start();


$AgnUser = $_SESSION['AgnUser'];
// echo $AgnUser;
$sql = "SELECT * from agent WHERE agnPic='$AgnUser'";
$run=mysqli_query($mysqli,$sql);
$row = mysqli_fetch_array($run);

$NewCount =  $row['1_year'] + 1;
$Total_reg =  $row['Total_reg'] + 1;
$unq=$_SESSION['paymentNum'];



$sql_agent="UPDATE agent SET 1_year='$NewCount', Total_reg='$Total_reg' WHERE agnPic='$AgnUser'";
$run_agent  = mysqli_query($mysqli,$sql_agent);


$sub_username                =   $_SESSION['username'];
$sub_email                   =   $_SESSION['email'];
$sub_shop                    =   $_SESSION['shop_name'];
$type                        =   "12";

$sub_emai  = explode('.',$sub_email);
$sub_emails = $sub_emai[0];

$preMont=date('m') + 12;
$preDay= date('d');
$preYear = date('y');
$date_subscribed             = date("20".'y/m/d');

if($preMont>12){
    $relMonth = $preMont - 12;
    $reaYear = $preYear + 1;
}else{
$relMonth = $preMont;
$reaYear = $preYear;
}
$date_expired                =   date("20".$reaYear.'/'.$relMonth.'/'.$preDay);


 
$sql = "SELECT id,num_Page,num_Tab,userStorage from users WHERE email='$sub_email'";
$un=mysqli_query($mysqli,$sql);
$ow = mysqli_fetch_array($un);
$myId = $ow['id'];




// =--------------------==========max page==============-----------------------
$newNumPage = ($ow['num_Page']+10);
$newNumTab = ($ow['num_Tab']+105);
$newStorage = ($ow['userStorage']+(1025*10));


$rem_sql0 = "SELECT Subscribed FROM users WHERE email = '$sub_email'";
$rem_run0 = mysqli_query($mysqli,$rem_sql0);
$rems = mysqli_fetch_array($rem_run0);


if($rems['Subscribed'] == 0){
    $n = $rems['Subscribed']+1;
    $sql_sub = "INSERT INTO subscribers(id,username,email,shop,Date_expired,Date_subscribed,type_of_sub) VALUES('$myId','$sub_username','$sub_emails','$sub_shop','$date_expired','$date_subscribed','$type')";
    
    $sql_add = "UPDATE users Set Subscribed='$n',num_Page='$newNumPage',num_Tab='$newNumTab', userStorage='$newStorage' WHERE id ='$myId'";

    if($run_agent){
        if($_GET['Subscription']){
            if(mysqli_query($mysqli,$sql_sub) && mysqli_query($mysqli,$sql_add)){
                $maRef = explode('__',$_GET['Subscription']);
                header('Location:1/'.$username.($suer_id+30).'loader.php?subscription_was_successfulpaid='.$unq.'&rreef='.$maRef[0]);
            }else{
                header('Location:Register.php?err=no payment');
            }
        }else{
            header('Location:Register.php?warning=error in transaction');
        }
    }else{
        header('Location:Register.php?err=error in transaction2');
    }
    
}else{
    header('Location:Register.php?notice=Already subscribed');
}

?>